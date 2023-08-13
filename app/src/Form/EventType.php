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

class EventType extends AbstractType
{
    private OrganizerSubscriber $organizerSubscriber;

    public function __construct(OrganizerSubscriber $organizerSubscriber)
    {
        $this->organizerSubscriber = $organizerSubscriber;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'form.title',
                'priority' => 1,
            ])
            ->add('startDate', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'form.startDate',
                'priority' => 1,
            ])
            ->add('endDate', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'form.endDate',
                'priority' => 1,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'form.description',
                'priority' => 1,
            ])
            ->add('published', CheckboxType::class, [
                'label' => 'form.published',
                'priority' => 1,
            ])
            ->add('anchors', TextAreaType::class, [
                'label' => 'form.anchorsList',
                'priority' => 1,
            ])
            ->add('contact', ContactType::class, [
                'label' => 'form.contact',
                'priority' => 1,
            ])
            ->add('rounds', EntityType::class, [
                'class' => Round::class,
                'label' => 'form.rounds',
                'choice_label' => 'name',
                'priority' => 1,
            ])
            ->add('bowTypes', EntityType::class, [
                'class' => BowType::class,
                'label' => 'form.bowTypes',
                'choice_label' => 'name',
                'priority' => 1,
            ])
            ->add('association', EntityType::class, [
                'class' => Association::class,
                'label' => 'form.association',
                'choice_label' => 'name',
                'priority' => 1,
            ])
            ->add('ages', EntityType::class, [
                'class' => Age::class,
                'label' => 'form.ages',
                'choice_label' => 'name',
                'priority' => 1,
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
