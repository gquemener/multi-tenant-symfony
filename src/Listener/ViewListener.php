<?php

declare(strict_types=1);

namespace App\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Serializer\SerializerInterface;

final readonly class ViewListener implements EventSubscriberInterface
{
    public function __construct(
        private SerializerInterface $serializer,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
          KernelEvents::VIEW => 'onKernelView',
        ];
    }

    public function onKernelView(ViewEvent $event): void
    {
        $controllerResult = $event->getControllerResult();

        $groups = $event->getRequest()->attributes->get('serialization_groups');

        $event->setResponse(new JsonResponse(
            data: $this->serializer->serialize($controllerResult, 'json', ['groups' => $groups]),
            json: true,
        ));
    }
}
