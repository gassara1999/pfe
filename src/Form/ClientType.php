<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ClientName',TextType::class,["required" => false,])
            ->add('mail',TextType::class,["required" => false,])
            ->add('phone',TextType::class,['attr' => ["maxlength"=>8,"minlength"=>8]])
            ->add('birthday',DateType::class,
            ["label" => "birthday",
                "required" => false,
                'empty_data' => '',
                'widget' => 'single_text',
                'attr' => ['autocomplete' => 'off']])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
