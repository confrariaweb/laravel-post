<?php

namespace ConfrariaWeb\Post\Services;

use ConfrariaWeb\Post\Contracts\PostSectionContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;
use Illuminate\Support\Str;

class PostSectionService
{
    use ServiceTrait;

    public function __construct(PostSectionContract $section)
    {
        $this->obj = $section;
    }

    public function prepareData(array $data)
    {
        if(isset($data['slug'])){
            $data['slug'] = Str::slug($data['slug']);
        }
        return $data;
    }

}
