<?php

namespace App\Repositories;

use App\Model\BlogPost;
use App\Repositories\Interfaces\BlogPostRepositoryInterface;

class UserRepository extends BaseRepository implements BlogPostRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(BlogPost $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function getFeatured(): Collection
   {
       return $this->model->all();    
   }

   public function getBlogsOnPage(): Collection
   {
       return $this->model->all();
   }
}