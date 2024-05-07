<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;

trait TenantAware
{
    #[Column]
    private int $tenantId;
}
