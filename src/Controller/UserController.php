<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use App\Form\PasswordFormType;
use App\Repository\UserRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class UserController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @Route("/", name="default", methods="GET")
     */
    function default(): Response
    {
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/user/ajax", name="user_roles_edit")
     */
    public function roles_edit(UserRepository $userRepository, Request $request, AuthorizationCheckerInterface $authChecker): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest() && true === $authChecker->isGranted('ROLE_ADMIN')) {
            $email = $request->request->get('email');
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $roles = $request->request->get('roles');

            $user = $userRepository->findOneBy(['email' => $email]);
            if ($user) {
                if ($roles == "Invité")
                    $user->setRoles(["ROLE_GUEST"]);
                else if ($roles == "Utilisateur")
                    $user->setRoles(["ROLE_USER"]);
                else if ($roles == "Administrateur")
                    $user->setRoles(["ROLE_ADMIN"]);
                $user->setNom($nom);
                $user->setPrenom($prenom);
                $em->flush();
            }
            return new JsonResponse();
        }
    }

    /**
     * @Route("/user/list", name="user_list")
     */
    public function list(UserRepository $UserRepository, Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $current = $request->request->get('current');
            $rowCount = $request->request->get('rowCount');
            $searchPhrase = $request->request->get('searchPhrase');
            $sort = $request->request->get('sort');
            $roles = $request->request->get('roles');

            $Users = $UserRepository->findByFilter($sort, $searchPhrase, $roles);
            if ($searchPhrase != "" || !empty($roles))
                $count = count($Users->getQuery()->getResult());
            else
                $count = $UserRepository->getCount();
            if ($rowCount != -1) {
                $min = ($current - 1) * $rowCount;
                $max = $rowCount;
                $Users->setMaxResults($max)->setFirstResult($min);
            }
            $Users = $Users->getQuery()->getResult();
            $rows = array();
            foreach ($Users as $User) {
                $status = $this->getUser()->getId() == $User->getId() ? 1 : 0;
                $row = array(
                    "id" => $User->getId(),
                    "nom" => $User->getNom(),
                    "prenom" => $User->getPrenom(),
                    "email" => $User->getEmail(),
                    "roles" => $User->getRoles(),
                    "status" => $status,
                );
                array_push($rows, $row);
            }

            $data = array(
                "current" => intval($current),
                "rowCount" => intval($rowCount),
                "rows" => $rows,
                "total" => intval($count)
            );
            return new JsonResponse($data);
        }

        return $this->render('user/list.html.twig', [
            'controller_name' => 'ListController',
            'id' => $this->getUser()->getId(),
        ]);
    }

    /**
     * @Route("/user/edit", name="user_edit")
     */
    public function edit(Request $request): Response
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $errorsForm = [];
        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('save')->isClicked()) {
                $user = $form->getData();
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('user_edit');
            } else {
                $errorsForm[] = 'Erreur :';
                foreach ($form->getErrors(true) as $error) {
                    $errorsForm[] = $error->getMessage();
                }
            }
        }

        $errorsPsw = [];
        $psw = $this->createForm(PasswordFormType::class, $user);
        $psw->handleRequest($request);
        if ($psw->isSubmitted() && $psw->isValid()) {
            $oldPassword = $request->request->get('password_form')['oldPassword'];
            if ($psw->get('edit')->isClicked() && $this->passwordHasher->isPasswordValid($user, $oldPassword)) {
                $user = $form->getData();
                $password = $this->passwordHasher->hashPassword($user, $user->get('plainPassword')->getData());
                $user->setPassword($password);
                $user->setRoles($roles);

                $em->persist($user);
                $em->flush();

                $this->addFlash('notice', 'Votre mot de passe à bien été changé !');

                return $this->redirectToRoute('user_edit');
            } else {
                $errorsPsw[] = 'Ancien mot de passe incorrect.';
                foreach ($form->getErrors(true) as $error) {
                    $errorsPsw[] = $error->getMessage();
                }
            }
        }

        return $this->render('user/edit.html.twig', [
            'controller_name' => 'EditController',
            'user' => $user,
            'form' => $form->createView(),
            'psw' => $psw->createView(),
            'errorsForm' => $errorsForm,
            'errorsPsw' => $errorsPsw,
        ]);
    }

    /**
     * @Route("/user/view/{id}", name="user_view")
     */
    public function view(User $User): Response
    {
        return $this->render('user/view.html.twig', [
            'controller_name' => 'ViewController',
            'user' => $User,
        ]);
    }

    /**
     * @Route("/user/getByEmail", name="user_getByEmail")
     */
    public function getByEmail(Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $email = $request->request->get('email');
            $user = $em->getRepository(User::class)->findOneBy(['email' => $email]);
            return new JsonResponse($user->getId());
        }
    }
}
