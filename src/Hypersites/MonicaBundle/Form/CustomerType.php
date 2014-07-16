<?php

namespace Hypersites\MonicaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('kindOfCustomer')
            ->add('fiscalDocument')
            ->add('indetityDocument')
            ->add('telephone')
            ->add('cellphone')
            ->add('birthdate')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('address')
            ->add('referredBy')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hypersites\MonicaBundle\Entity\Customer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hypersites_monicabundle_customer';
    }
}
