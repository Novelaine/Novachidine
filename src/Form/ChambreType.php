<?php

namespace App\Form;

use App\Entity\Chambre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChambreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('type_chambre')
            ->add('num_chambre')
            ->add('photo', FileType::class, [
                "mapped"=> false,
            ])
            ->add('disponibilite', ChoiceType::class, [
                'choices' => [
                    'oui'=> 'oui','non' => 'non', 
                ],
                "expanded" => false,
                "multiple" => false,

            ])
            ->add('accepte_animaux', ChoiceType::class, [
                'choices' => [
                    'oui'=> 'oui','non' => 'non', 
                ],
                "expanded" => false,
                "multiple" => false,

            ])
            ->add('prix')
            ->add('detail')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chambre::class,
        ]);
    }
}
