<?php

namespace App\Repositories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use App\Repositories\Interfaces\BlogPostRepositoryInterface;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface
{

    /**
     * BlogPostRepository constructor.
     *
     * @param BlogPost $model
     */
    public function __construct(BlogPost $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $onPage
     * 
     * @return JsonResponse
     */
    public function getBlogsOnPage(int $onPage = 5): JsonResponse
    {
        $data = $this->model::paginate($onPage);
        return response()->json($data);
    }

    /**
     * @param array $details
     * @param int|null $id
     * 
     * @return BlogPost
     */
    public function save(array $details, int $id = null): BlogPost
    {
        if ($blogPost = $this->find($id)) {
            $blogPost->update($details);
        } else {
            $blogPost = new BlogPost($details);
            $blogPost->save();
        }
        return $blogPost;
    }
}