<?php

declare(strict_types=1);

namespace App\EventSubscriber\Form;

use App\Entity\Organizer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class OrganizerSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return [
            FormEvents::POST_SET_DATA => 'postSetData',
        ];
    }

    public function postSetData(FormEvent $event): void
    {
        $form = $event->getForm();

        $form
            ->add('organizer', EntityType::class, [
                'class' => Organizer::class,
                'label' => 'form.organizer',
                'choice_label' => 'name',
                'priority' => 1,
            ])
        ;
    }
}