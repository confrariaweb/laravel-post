<?php

namespace ConfrariaWeb\Post\Models;

use ConfrariaWeb\Post\Scopes\AccountPostCategoryScope;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'user_id', 'name', 'slug', 'status'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new AccountPostCategoryScope());
    }

    public function accounts()
    {
        return $this->belongsToMany(
            'ConfrariaWeb\Account\Models\Account',
            'account_post_category',
            'category_id',
            'account_id'
        );
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function sections()
    {
        return $this->belongsToMany(
            'ConfrariaWeb\Post\Models\PostSection',
            'post_category_section',
            'category_id',
            'section_id'
        );
    }

    public function posts()
    {
        return $this->belongsToMany(
            'ConfrariaWeb\Post\Models\Post',
            'post_category',
            'category_id',
            'post_id'
        );
    }
}
