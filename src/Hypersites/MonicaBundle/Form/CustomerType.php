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
            ->add('kindOfCustomer')
            ->add('fiscalDocument')
            ->add('indetityDocument')
            ->add('telephone')
            ->add('cellphone')
            ->add('birthdate','date',array('widget'=>'single_text','format'=>'yyyy-MM-dd',))
            ->add('createdAt', 'hidden', array('data'=>$this->getFormattedDate()))
            ->add('updatedAt','hidden', array('data'=>$this->getFormattedDate()) )
            ->add('address', new AddressType())
            ->add('referredBy', 'search')
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

	/**
	 *
	 * @param \Datetime $date
	 * @return string
	 */
    public function getFormattedDate( \Datetime $date = null) {
    	if ($date === null) {
    		$date = new \Datetime();
    	}
    	return $date->format('Y-m-d H:i:s');
    }
}
