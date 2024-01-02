<?php

namespace App\Entity;

use App\ORM\TenantAwareInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\GeneratedValue;
use JsonSerializable;

#[ORM\Entity]
final class BlogPost implements JsonSerializable, TenantAwareInterface
{
  use TenantAware;

  #[ORM\Id]
  #[ORM\Column]
  #[GeneratedValue()]
  private int $id;

  #[ORM\Column]
  private string $title;

  public function jsonSerialize(): mixed
  {
    return [
      'id' => $this->id,
      'title' => $this->title,
    ];
  }
}
