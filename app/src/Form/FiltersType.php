<?php

namespace App\Form;

use App\Provider\ChoicesProvider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltersType extends AbstractType
{

    private ChoicesProvider $choicesProvider;

    public function __construct(ChoicesProvider $choicesProvider)
    {
        $this->choicesProvider = $choicesProvider;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $choices = $this->choicesProvider->get();

        $builder
            ->add('search', null, [
                'label' => 'form.search',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Nazwa wydarzenia',
                ],
            ])
            ->add('associations', ChoiceType::class, [
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'label' => 'form.association',
                'choices' => $choices['associations'],
                'attr' => [
                    'class' => 'choices'
                ]
            ])
            ->add('bowTypes', ChoiceType::class, [
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'label' => 'form.bowTypes',
                'choices' => $choices['bowTypes'],
                'attr' => [
                    'class' => 'choices'
                ]
            ])
            ->add('rounds', ChoiceType::class, [
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'label' => 'form.rounds',
                'choices' => $choices['rounds'],
                'attr' => [
                    'class' => 'choices'
                ]
            ])
            ->add('ages', ChoiceType::class, [
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'label' => 'form.ages',
                'choices' => $choices['ages'],
                'attr' => [
                    'class' => 'choices'
                ]
            ])
            ->add('organizers', ChoiceType::class, [
                'expanded' => true,
                'required' => false,
                'multiple' => true,
                'label' => 'form.organizer',
                'choices' => $choices['organizers'],
                'attr' => [
                    'class' => 'choices'
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
