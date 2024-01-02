<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;

trait TenantAware
{
  #[Column]
  private int $tenantId;
}
