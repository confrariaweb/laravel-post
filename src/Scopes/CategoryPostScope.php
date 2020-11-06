<?php

namespace ConfrariaWeb\Post\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CategoryPostScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->when(request()->has('category'), function ($query) {
            return $query
                ->whereHas('categories', function (Builder $query) {
                    $query->where('post_categories.slug', request()->input('category'));
                });
        });
    }
}