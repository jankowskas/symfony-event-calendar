<?php

declare(strict_types=1);

namespace App\EventSubscriber\Form;

use App\Entity\Organizer;
use App\Form\Type\OrganizerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\RequestStack;

class OrganizerSubscriber implements EventSubscriberInterface
{

    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            FormEvents::POST_SET_DATA => 'postSetData',
        ];
    }

    public function postSetData(FormEvent $event): void
    {
        $form = $event->getForm();

        $requestEventData = $this->requestStack->getCurrentRequest()->get('event');

        if ($requestEventData && isset($requestEventData['addOrganizer']) && $requestEventData['addOrganizer'] == 1) {
            $form
                ->add('organizer', OrganizerType::class, [
                    'priority' => 1
                ])
            ;
        } else {

            $form
                ->add('organizer', EntityType::class, [
                    'class' => Organizer::class,
                    'label' => 'form.organizer',
                    'choice_label' => 'name',
                    'priority' => 1,
                ])
                ->add('addOrganizer', SubmitType::class, [
                    'label' => 'form.add_organizer',
                    'priority' => 1,
                    'validate' => false,
                    'attr' => [
                        'value' => 1
                    ]
                ])
            ;
        }
    }
}