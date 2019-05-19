<?php

namespace ContactBoxBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use ContactBoxBundle\Entity\Contact;




class contactType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class,['label' => 'Imię'])
            ->add('lastName', TextType::class,['label' => 'Nazwisko'])
            ->add('description', TextareaType::class,['label' => 'Opis ....l'])
            ->add('address',CollectionType::class,
                ['entry_type'=>addressType::class,
                    'entry_options' => [
                        'label' => false
                    ],
                    'by_reference' => false,
                    'allow_add' => true,
                    'allow_delete' => true
                ])
            ->add('email',CollectionType::class,
                ['entry_type'=>emailsType::class,
                    'entry_options' => [
                        'label' => false
                    ],
                    'by_reference' => false,
                    'allow_add' => true,
                    'allow_delete' => true
                ])
            ->add('phone',CollectionType::class,
                ['entry_type'=>phoneType::class,
                    'entry_options' => [
                        'label' => false
                    ],
                    'by_reference' => false,
                    'allow_add' => true,
                    'allow_delete' => true
                ])
            ->add('save', SubmitType::class, ['label' => 'Dodaj']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            ['data_class' => 'ContactBoxBundle\Entity\Contact']
        );
    }

}
