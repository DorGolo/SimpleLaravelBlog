<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;

/**
* Interface BlogPostRepositoryInterface
* @package App\Repositories\Interfaces
*/
interface BlogPostRepositoryInterface
{
    /**
     * @param array $blogPost
     * 
     * @return BlogPost
     */
    public function save(array $blogPost): BlogPost;

    /**
     * @param int $page
     * @param int $limit
     * 
     * @return Collection
     */
    public function getBlogsOnPage(int $page = 20): JsonResponse;
}