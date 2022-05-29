<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Membership;
use App\Entity\MembershipType as Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\GreaterThan;




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
            'required' => true,
        ])
        ->add('type', EntityType::class, [
            'class' => Type::class,
            'choice_label' => 'Membership type',
            'placeholder' => '',
            'label' => 'Type',
            'required' => true,
        ])
            ->add('DateBegin',DateType::class,
            ["label" => "begin date",
                "required" => true,
                'empty_data' => '',
                'widget' => 'single_text',
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('EndDate',DateType::class,
            ["label" => "end date",
                "required" => true,
                'constraints' => [
                    new GreaterThan([
                        'propertyPath' => 'parent.all[DateBegin].data'
                    ]),
                ],
                'empty_data' => '',
                'widget' => 'single_text',
                'attr' => ['autocomplete' => 'off']
            ])
            ->add('price', TextType::class, [
                "label" => "Price",
                "required" => true,
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
