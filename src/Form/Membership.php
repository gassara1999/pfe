<?php

namespace App\Form;

use App\Entity\Membership;
use App\Entity\Client;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembershipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Client',EntityType::class,[
                'mapped' =>false,
                'class' => Client::class,
                'label' => 'client name',
                'placeholder' => 'client',
            ])
            ->add('MembershipType',EntityType::class,[
                'mapped' =>false,
                'class' => \App\Entity\MembershipType::class,
                'label' => 'membership type',
                'placeholder' => 'type',
            ])
            ->add('DateBegin')
            ->add('EndDate')
            ->add('price')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Membership::class,
        ]);
    }
}
