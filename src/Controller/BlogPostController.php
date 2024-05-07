<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\BlogPostRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BlogPostController
{
    #[Route('/blog-posts')]
    public function list(BlogPostRepository $repository): Response
    {
        $blogPosts = $repository->findAll();

        return new JsonResponse($blogPosts);
    }
}
