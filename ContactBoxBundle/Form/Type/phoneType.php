<?php

namespace ContactBoxBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use ContactBoxBundle\Entity\Phone;



class phoneType extends AbstractType{

public function buildForm(FormBuilderInterface $builder, array $options){
    $builder
        ->add('businessPhone', TelType::class,['label' => 'Telefon służbowy', 'required' => false])
        ->add('privatePhone', TelType::class,['label' => 'Telefon prywatny', 'required' => false])
        ->add('otherPhone', TelType::class,['label' => 'Telefon dodatkowy (opcjonalnie)', 'required' => false]);
}

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(
        ['data_class' => 'ContactBoxBundle\Entity\Phone']
    );
}




}
