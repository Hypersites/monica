<?php

namespace Hypersites\MonicaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street')
            ->add('number')
            ->add('apartament')
            ->add('postalCode')
            ->add('city')
            ->add('state')
            ->add('country')
            ->add('obs')
            ->add('createdAt', 'hidden', array('data'=>date('Y-m-d H:i:s')))
            ->add('updatedAt', 'hidden', array('data'=>date('Y-m-d H:i:s')))
            ->add('alias')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hypersites\MonicaBundle\Entity\Address'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hypersites_monicabundle_address';
    }
}
