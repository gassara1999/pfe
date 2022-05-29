<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Activity;
use App\Entity\Planning;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

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
                'required' => true,
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'UserName',
                'placeholder' => '',
                'label' => 'Coach',
                'required' => true,
                ])
            ->add('roomNumber',IntegerType::class,[
                "required" => true
                ])
            ->add('BeginHour',TextType::class,[
                "required" => true
                ])
            ->add('EndHour',TextType::class,[
                "required" => true
                ])
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
