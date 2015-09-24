<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customer_id', 'integer', array(
                'description' => 'Customer ID for this pizza Order.',
            ))
            ->add('pizza_variety', 'text', array(
                'description' => 'Pizza Variety to base the additional toppings upon.',
            ))
            ->add('toppings', 'array', array(
                'description' => 'Toppings that will go on top of the pizza.',
            ))
            ->add('status', 'text', array(
                'description' => 'Status of the pizza Order.',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'         => 'AppBundle\Entity\Order',
            'intention'          => 'pizza_order',
            'translation_domain' => 'AppBundle'
        ));
    }

    public function getName()
    {
        return 'pizza_order';
    }
}
