<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'lastname',
                TextType::class,
                [
                    'label' => 'Nom',
                ]
            )
            ->add(
                'firstname',
                TextType::class,
                [
                    'label' => 'Prénom',
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Email',
                ]
            )
            ->add(
                'plainPassword',
                // 2 champs qui doivent avoir la meme valeure..
                RepeatedType::class,
                [
                    // ..de type password
                    'type' => PasswordType::class,
                    // Options du premier des deux champs
                    'first_options' => [
                        'label' => 'Mot de passe',
                    ],
                    // Options du second des deux champs
                    'second_options' => [
                        'label' => 'Confirmation du mot de passe',
                    ],
                    'invalid_message' => 'la confirmation ne correspond pas au mot de passe du Q'
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
