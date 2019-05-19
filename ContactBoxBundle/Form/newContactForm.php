<?php

namespace ContactBoxBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use ContactBoxBundle\Entity\Contact;

class newContactForm extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->setMethod('POST')
            ->add('firstName', TextType::class,['label' => 'Imię'])
            ->add('lastName', TextType::class,['label' => 'Nazwisko'])
            ->add('description', TextareaType::class,['label' => 'Opis ....'])
            ->add('save', SubmitType::class, ['label' => 'Dodaj']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            ['data_class' => Contact::class]
        );
    }


}