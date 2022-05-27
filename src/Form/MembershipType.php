<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Membership;
use App\Entity\MembershipType as Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;




class MembershipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('client', EntityType::class, [
            'class' => Client::class,
            'choice_label' => 'Client Name',
            'placeholder' => '',
            'label' => 'Client',
            'required' => false,
        ])
        ->add('type', EntityType::class, [
            'class' => Type::class,
            'choice_label' => 'Membership type',
            'placeholder' => '',
            'label' => 'Type',
            'required' => false,
        ])
            ->add('DateBegin',DateType::class,
            ["label" => "begin date",
                "required" => false,
                'empty_data' => '',
                'widget' => 'single_text',
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('EndDate',DateType::class,
            ["label" => "end date",
                "required" => false,
                'empty_data' => '',
                'widget' => 'single_text',
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('price', TextType::class, [
                "label" => "Price",
                "required" => false,
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Price']
            ])
           

            
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Membership::class,
        ]);
    }
}
