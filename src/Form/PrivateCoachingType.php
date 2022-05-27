<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Client;
use App\Entity\PrivateCoaching;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PrivateCoachingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'UserName',
                'placeholder' => '',
                'label' => 'Coach',
                'required' => false,
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'Client Name',
                'placeholder' => '',
                'label' => 'Client',
                'required' => false,
            ])
            ->add('DateSession',DateType::class,
            ["label" => "Session date",
                "required" => false,
                'empty_data' => '',
                'widget' => 'single_text',
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('BeginHour')
            ->add('EndHour')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PrivateCoaching::class,
        ]);
    }
}
