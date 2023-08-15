<?php

namespace App\Form;

use App\Entity\Age;
use App\Entity\Association;
use App\Entity\BowType;
use App\Entity\Event;
use App\Entity\Round;
use App\EventSubscriber\Form\OrganizerSubscriber;
use App\Form\Type\ContactType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

class EventType extends AbstractType
{
    private OrganizerSubscriber $organizerSubscriber;
    private TranslatorInterface $translator;

    public function __construct(OrganizerSubscriber $organizerSubscriber, TranslatorInterface $translator)
    {
        $this->organizerSubscriber = $organizerSubscriber;
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'form.title',
                'help' => '',
                'priority' => 1,
                'required' => true,
            ])
            ->add('startDate', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'form.startDate',
                'priority' => 1,
                'required' => true,
            ])
            ->add('endDate', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'form.endDate',
                'priority' => 1,
                'required' => false,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'form.description',
                'priority' => 1,
                'required' => false,
            ])
            ->add('published', CheckboxType::class, [
                'label' => 'form.published',
                'priority' => 1,
                'required' => false,
            ])
            ->add('anchors', TextAreaType::class, [
                'label' => 'form.anchorsList',
                'priority' => 1,
                'required' => false,
            ])
            ->add('contact', ContactType::class, [
                'label' => 'form.eventContact',
                'priority' => 1,
                'required' => false,
            ])
            ->add('rounds', EntityType::class, [
                'class' => Round::class,
                'label' => 'form.rounds',
                'choice_label' => function(Round $round) {
                    return $this->translator->trans($round->getName());
                },
                'priority' => 1,
                'multiple' => true,
                'required' => true,
                'expanded' => true,
            ])
            ->add('bowTypes', EntityType::class, [
                'class' => BowType::class,
                'label' => 'form.bowTypes',
                'choice_label' => function(BowType $bowType) {
                    return $this->translator->trans($bowType->getName());
                },
                'priority' => 1,
                'multiple' => true,
                'required' => true,
                'expanded' => true,
            ])
            ->add('association', EntityType::class, [
                'class' => Association::class,
                'label' => 'form.association',
                'choice_label' => function(Association $association) {
                    return $this->translator->trans($association->getName());
                },
                'priority' => 1,
                'required' => true,
            ])
            ->add('ages', EntityType::class, [
                'class' => Age::class,
                'label' => 'form.ages',
                'choice_label' => function(Age $age) {
                    return $this->translator->trans($age->getName());
                },
                'priority' => 1,
                'multiple' => true,
                'required' => true,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class, [
                'priority' => 0,
            ])
        ;

        $builder->addEventSubscriber($this->organizerSubscriber);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
