<?php

namespace ConfrariaWeb\Post\Services;

use ConfrariaWeb\Post\Contracts\PostContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;
use Illuminate\Support\Str;

class PostService
{
    use ServiceTrait;

    public function __construct(PostContract $post)
    {
        $this->obj = $post;
    }

    public function executeAfter(array $data, $obj = NULL)
    {
        if (isset($data['files'])) {
            $path = (existsAccount()) ? 'accounts/' . account()->id . '/posts/' . $obj->id : 'posts/' . $obj->id;
            resolve('FileService')->uploadAttach($obj, $data['files'], $path);
        }
    }

    public function prepareData(array $data)
    {
        if(isset($data['slug'])){
            $data['slug'] = Str::slug($data['slug']);
        }

        $data['options'] = resolve('OptionService')->encode($data['options']?? []);

        $data['sync']['sections'] = $data['sections'] ?? [];
        $data['sync']['categories'] = $data['categories'] ?? [];

        return $data;
    }

}
