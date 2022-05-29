<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                "label" => "Email",
                "required" => true,
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Email']
            ])
            ->add('roles', ChoiceType::class, [
                "label" => false,
                "required" => true,
                'placeholder'=>'Roles',
                'choices'  => array_flip(User::listRoles()),
                'multiple' => true,
                "expanded" => true

            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password should be the same.',
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'confirm Password'],
            ])
           
            ->add('UserName')
            ->add('phone',TextType::class,['attr' => ["maxlength"=>8,"minlength"=>8]])
            ->add('speciality')
            ->add('salary')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
