<?php

namespace ztn\TodoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Form type for representing a UserInterface instance by its username string.
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 */
class CreateEventFormType extends AbstractType {


    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array(
                    'required' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ztn\TodoBundle\Entity\Event'
        ));
    }

    public function getName() {
        return 'ztn_todobundle_createeventtype';
    }

}
