<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                "label" => "Email",
                "required" => false,
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Email']
            ])
            ->add('roles', ChoiceType::class, [
                "label" => false,
                "required" => false,
                'placeholder'=>'Roles',
                'choices'  => array_flip(User::listRoles()),
                'multiple' => true,
                "expanded" => true

            ])
            ->add('password')
            ->add('UserName')
            ->add('phone')
            ->add('ModifiedAt')
            ->add('createdAt')
            ->add('blocked')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
