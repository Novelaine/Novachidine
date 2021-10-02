<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $client = $options["data"];
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                "choices" => [
                    "Visiteur" => "ROLE_VISITEUR",
                    "Admin" => "ROLE_ADMIN",
                    "Client" => "ROLE_USER",
                    "Developpeur" => "ROLE_DEV",
                ],
                "multiple" => true,
                "expanded" => true,
                "label" => "autorisations",
            ])
            ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('code_postal')
            ->add('ville')
            ->add('pays')
            ->add('telephone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
