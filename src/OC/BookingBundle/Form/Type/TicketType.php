<?php

namespace OC\BookingBundle\Form\Type;
use OC\BookingBundle\Entity\Ticket;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TicketType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('visit', DateType::class,array(
                        'attr' => array('class' => 'form-control'),
                        'widget' => 'single_text',
                        'html5' => true
                    )
                )
                ->add('duration', ChoiceType::class,array(
                        'label' => '',
                        'choices' => array(
                            'label_day' => Ticket::DAY,
                            'label_halfday' => Ticket::HALFDAY
                        ),
                        'choice_translation_domain' => 'messages',
                        'multiple' => false,
                        'expanded' => true
                    )
                )
                ->add('nbticket',   TextType::class,array(
                        'attr' => array('class' => 'form-control')
                    )
                )
                ->add('save', SubmitType::class,array(
                        'attr' => array('class' => 'btn btn-primary btn-lg'),
                        'label' => 'save_label',
                        'translation_domain' => 'messages',
                    )
                )
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OC\BookingBundle\Entity\Ticket',
            'page' => 1
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oc_bookingbundle_ticket';
    }


}
