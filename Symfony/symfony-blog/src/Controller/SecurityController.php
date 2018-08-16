<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription")
     */
     public function register(
         Request $request,
        UserPasswordEncoderInterface $passwordEncoder
     )
     {

         $user = new User();
         $form = $this->createForm(UserType::class, $user);

         $form->handleRequest($request);

         if($form->isSubmitted()){
             if($form->isValid()){
                 // Encode le mdp à partir de la config encoders
                 // pour l'objet User à partir de son mot de pass en clair reçu dan sle formualire
                 $password = $passwordEncoder->encodePassword(
                     $user,
                     $user->getPlainPassword()
                 );

                 $user->setPassword($password);

                 $em = $this->getDoctrine()->getManager();
                 $em->persist($user);
                 $em->flush();

                 $this->addFlash(
                     'success',
                     'Votre Q a bien été créé'
                 );
                 return $this->redirectToRoute('app_index_index');
             }else{
                 $this->addFlash(
                     'error',
                     'Le formulaire contient des erreurs du Q'
                 );
             }
         }

        return $this->render(
            'security/register.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
     }

    /**
     * @Route("/connexion")
     */
     public function login(AuthenticationUtils $authenticationUtils)
     {
         // Traitement du formulaire par Security
         $error = $authenticationUtils->getLastAuthenticationError();
         $lastUsername = $authenticationUtils->getLastUsername();

         dump($error);

         if(!empty($error)){
            $this->addFlash('error', "Indentifiants incorrect du Q");
         }

         return $this->render(
             'security/login.html.twig',
             [
                'last_username' => $lastUsername,
             ]
         );
     }
}
