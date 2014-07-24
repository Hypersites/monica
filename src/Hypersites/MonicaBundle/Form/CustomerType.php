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
            ->add('email', 'email', array(
            	'invalid_message' => 'You entered a invalid e-mail',
            ))
            ->add('kindOfCustomer','choice', array(
            	'choices'=>array('1'=>'Company', '2'=>'Person'),
            		'expanded' => true,
            		'multiple' => false,
            ))
            ->add('fiscalDocument')
            ->add('indetityDocument')
            ->add('telephone')
            ->add('cellphone')
            ->add('birthdate','date',array('widget'=>'single_text','format'=>'yyyy-MM-dd',))
            ->add('address', new AddressType())
            ->add('referredBy', 'search', array('required' => false,'empty_data'=>'Digite o nome ou email de quem te indicou'))
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
