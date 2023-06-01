<?php

namespace App\Form;

use App\Entity\Node;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NodeManipulationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('node1', TextType::class, ['mapped' => false])
            ->add('node2', TextType::class, ['mapped' => false])
            ->add('node3', TextType::class, ['mapped' => false])
            ->add('node4', TextType::class, ['mapped' => false])
            ->add('node5', TextType::class, ['mapped' => false])
            ->add('node6', TextType::class, ['mapped' => false])

            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Node::class,
        ]);
    }
}
