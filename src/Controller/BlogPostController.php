<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\BlogPost;
use App\Repository\BlogPostRepository;
use Symfony\Component\Routing\Annotation\Route;

final class BlogPostController
{
    #[Route('/blog-posts', defaults: ['serialization_groups' => ['blog-post:list']])]
    public function list(BlogPostRepository $repository): array
    {
        $blogPosts = $repository->findAll();

        return $blogPosts;
    }

    #[Route('/blog-posts/{id}', defaults: ['serialization_groups' => ['blog-post:item']])]
    public function show(BlogPost $blogPost): BlogPost
    {
        return $blogPost;
    }
}
