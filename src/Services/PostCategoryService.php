<?php

namespace ConfrariaWeb\Post\Services;

use ConfrariaWeb\Post\Contracts\PostCategoryContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;
use Illuminate\Support\Str;

class PostCategoryService
{
    use ServiceTrait;

    public function __construct(PostCategoryContract $category)
    {
        $this->obj = $category;
    }

    public function prepareData(array $data)
    {
        if(isset($data['slug'])){
            $data['slug'] = Str::slug($data['slug']);
        }
        return $data;
    }

}
