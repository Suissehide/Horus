<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    // /**
    //  * @Route("/onAuthenticationSuccess", name="onAuthenticationSuccess")
    //  */
    // public function onAuthenticationSuccess(UrlGeneratorInterface $router, AuthorizationCheckerInterface $authChecker)
    // {
    //     if (true === $authChecker->isGranted('ROLE_GUEST')) {
    //         // c'est un aministrateur : on le rediriger vers l'espace admin
    //         $redirection = new RedirectResponse($router->generate('guest'));
    //     } else {
    //         // c'est un utilisaeur lambda : on le rediriger vers l'accueil
    //         $redirection = new RedirectResponse($router->generate('index_participant'));
    //     }
    //     return $redirection;
    // }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/register", name="app_register", methods="GET|POST")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $errors = [];

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setRoles(['ROLE_GUEST']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('notice', 'Félicitations ! Votre compte a été créé avec succès !');
            return $this->redirectToRoute('index');
        } else {
            foreach ($form->getErrors(true) as $error) {
                $errors[] = $error->getMessage();
            }
            if (strcmp($form->get('plainPassword')->get('first')->getData(), $form->get('plainPassword')->get('second')->getData()))
                $errors[] = 'Les deux mots de passe ne sont pas identiques.';
            if (($key = array_search('This value is not valid.', $errors)) !== false)
                unset($errors[$key]);
        }

        return $this->render('user/register.html.twig', [
            'controller_name' => 'RegisterController',
            'form' => $form->createView(),
            'errors' => $errors,
        ]);
    }

    /** 
     * @Route("/guest", name="guest")
     */
    public function guest()
    {
        return $this->render('user/guest.html.twig', [
            'controller_name' => 'GuestController',
        ]);
    }

    /*
    public function accountInfo()
    {
        // allow any authenticated user - we don't care if they just
        // logged in, or are logged in via a remember me cookie
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

    }
    */

    /*
    public function resetPassword()
    {
        // require the user to log in during *this* session
        // if they were only logged in via a remember me cookie, they
        // will be redirected to the login page
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

    }
    */
}
