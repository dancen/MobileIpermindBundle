<?php

namespace Mobile\IpermindBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nickname','text')
            //->add('score')
            //->add('time_game')
            //->add('difficulty_level')
            //->add('created_at')
        ;
    }

    public function getName()
    {
        return 'mobile_ipermindbundle_playertype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array( 
            'data_class' => 'Mobile\IpermindBundle\Entity\Player',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'player_item', ); 
    }
    
}
