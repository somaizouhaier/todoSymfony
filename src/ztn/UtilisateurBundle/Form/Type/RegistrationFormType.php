<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ztn\UtilisateurBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as baseType;

class RegistrationFormType extends baseType
{
    private $container;

    /**
     * @param string $class The User class name
     */
    public function __construct($container)
    {
         
       parent::__construct('ztn\UtilisateurBundle\Entity\User');
       
       $this->container = $container;
       
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder
            ->add('utilisateurNom', 'text', array(
                'label' => 'nom'))
            ->add('utilisateurPrenom', 'text', array(
                'label' => 'prenom'))
           /* ->add('civilite', 'choice', array(
                'choices' => array('m' => 'Homme', 'f' => 'Femme')))*/
            ->add('email', 'email', array('label' => 'email'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'mot de passe', 'label_attr' => array('class' => 'control-label')),
                'second_options' => array('label' => 'Nouveau mot de passe', 'label_attr' => array('class' => 'control-label')),
                'invalid_message' => 'Les 2 mots de passes saisis sont diffÃ©rents',
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ztn\UtilisateurBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'ztn_utilisateur_registration';
    }
}
