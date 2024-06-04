<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\GeneratedValue;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity]
final class Comment
{
    #[ORM\Id]
    #[ORM\Column]
    #[GeneratedValue()]
    private int $id;

    #[ORM\Column]
    #[Groups('Default')]
    private string $content;

    #[ORM\ManyToOne]
    private BlogPost $blogPost;

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
