<?php
// src/Form/Type/ContactType.php

namespace BOUTIQUE\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            -> add('prenom', TextType::class, array(/* condition */))
            -> add('nom', TextType::class, array(/* condition */))
            -> add('email', EmailType::class, array(/* condition */))
            -> add('sujet', ChoiceType::class, array(
                'choices' => array(
                    'client' => 'Service Client',
                    'tech' => 'Problème Technique',
                    'press' => 'Service Presse'
                )
            ))
            -> add('message', TextareaType::class, array());

    }

}
