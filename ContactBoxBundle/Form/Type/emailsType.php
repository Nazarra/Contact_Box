<?php

namespace ContactBoxBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use ContactBoxBundle\Entity\Email;



class emailsType extends AbstractType{

public function buildForm(FormBuilderInterface $builder, array $options){
    $builder
        ->add('businessEmail', EmailType::class,['label' => 'Email służbowy', 'required' => false])
        ->add('privateEmail', EmailType::class,['label' => 'Email prywatny', 'required' => false])
        ->add('otherEmail', EmailType::class,['label' => 'Email dodatkowy (opcjonalnie)', 'required' => false]);
}

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(
        ['data_class' => 'ContactBoxBundle\Entity\Email']
    );
}




}
