<?php

namespace ContactBoxBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use ContactBoxBundle\Entity\Address;



class addressType extends AbstractType{

public function buildForm(FormBuilderInterface $builder, array $options){
    $builder
        ->add('city', TextType::class,['label' => 'Miasto', 'required' => false])
        ->add('street', TextType::class,['label' => 'Ulica', 'required' => false])
        ->add('hauseNumber', TextType::class,['label' => 'Numer budynku', 'required' => false])
        ->add('apartmentNumber', TextType::class,['label' => 'Numer mieszkania', 'required' => false]);
}

public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(
        ['data_class' => 'ContactBoxBundle\Entity\Address']
    );
}




}
