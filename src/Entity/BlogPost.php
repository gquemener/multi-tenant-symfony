<?php

declare(strict_types=1);

namespace App\Entity;

use App\ORM\TenantAwareInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\GeneratedValue;
use Ds\Collection as DsCollection;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity]
final class BlogPost implements TenantAwareInterface
{
    use TenantAware;

    #[ORM\Id]
    #[ORM\Column]
    #[GeneratedValue()]
    #[Groups('Default')]
    private int $id;

    #[ORM\Column]
    #[Groups('Default')]
    private string $title;

    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'blogPost')]
    #[Groups('blog-post:item')]
    private Collection $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }
}
