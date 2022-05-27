<?php

namespace App\Form;

use App\Entity\Activity;
use App\Entity\Planning;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PlanningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('activity', EntityType::class, [
                'class' => Activity::class,
                'choice_label' => 'Activity Name',
                'placeholder' => '',
                'label' => 'Activity',
                'required' => false,
            ])
            ->add('roomNumber')
            ->add('BeginHour')
            ->add('EndHour')
            ->add('date',DateType::class,
            ["label" => "date",
                "required" => false,
                'empty_data' => '',
                'widget' => 'single_text',
                'attr' => ['autocomplete' => 'off']
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Planning::class,
        ]);
    }
}
