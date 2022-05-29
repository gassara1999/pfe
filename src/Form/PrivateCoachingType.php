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
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
                'required' => true,
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'Client Name',
                'placeholder' => '',
                'label' => 'Client',
                'required' => true,
            ])
            ->add('DateSession',DateType::class,
            ["label" => "Session date",
                "required" => true,
                'empty_data' => '',
                'widget' => 'single_text',
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('BeginHour',TextType::class,[
                "required" => true
                ])
            ->add('EndHour',TextType::class,[
                "required" => true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PrivateCoaching::class,
        ]);
    }
}
