<?php

namespace App\Form;

use App\Entity\MembershipType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembershipTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Membershiptype', TextType::class, [
            "label" => "Membership Type",
            "required" => false,
            'attr' => [
                'autocomplete' => 'off',
                'placeholder' => 'Membership Type']
        ])
        ->add('description', TextareaType::class, [
            "label" => "Description",
            "required" => false,
            'attr' => [
                'autocomplete' => 'off',
                'placeholder' => 'Description'],
        ])
        ;  
            
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MembershipType::class,
        ]);
    }
}