<?php

namespace App\Form;

use App\Entity\Chambre;
use App\Entity\Reservation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResaClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_arrivee', DateType::class, [
                "widget" => "single_text",
                "label" => "arrivée",
            ])
            ->add('date_depart',  DateType::class, [
                "widget" => "single_text",
                "label" => "depart",
            ])
            ->add('nombre_animaux')
            ->add('type_animaux', ChoiceType::class, [
                'choices' => [
                    'Aucun'=> 'Aucun','Chien'=> 'Chien','Chat' => 'Chat', 'les deux' => 'Les deux',
                ],
                "expanded" => false,
                "multiple" => false,

            ])
            ->add('nombre_personnes')
            ->add('chambre', EntityType::class, [
                "class" => Chambre::class,
                "choice_label" => function(Chambre $chambre){
                    return $chambre->getTypeChambre();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            

        ]);
    }
}
