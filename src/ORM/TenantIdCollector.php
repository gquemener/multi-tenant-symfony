<?php

namespace App\ORM;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class TenantIdCollector implements EventSubscriberInterface
{
  public function __construct(private readonly EntityManagerInterface $em) {
  }

  public static function getSubscribedEvents(): array
  {
    return [
      KernelEvents::REQUEST => 'onKernelRequest',
    ];
  }

  public function onKernelRequest(RequestEvent $event): void
  {
    $id = $event->getRequest()->query->get('tenant_id', null);
    if (!is_null($id)) {
      $this->em->getFilters()->getFilter('tenant')->setParameter('tenant_id', (int) $id);
    }
  }

  public function getCurrentTenant(): int
  {
    return $this->currentTenant;
  }
}
