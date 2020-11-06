<?php

namespace ConfrariaWeb\Post\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class AccountPostCategoryScope implements Scope
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
        $builder->when((Auth::check() && existsAccount()), function ($query) {
            return $query
                ->whereHas('accounts', function (Builder $query) {
                    $query->where('id', account()->id);
                })
                ->orDoesntHave('accounts');
        }, function ($query) {
            return $query->whereNotNull('user_id');
        });
    }
}