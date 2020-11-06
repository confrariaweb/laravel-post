<?php

namespace ConfrariaWeb\Post\Models;

use ConfrariaWeb\Post\Scopes\AccountPostSectionScope;
use Illuminate\Database\Eloquent\Model;

class PostSection extends Model
{

    protected $fillable = [
        'user_id', 'name', 'slug', 'status'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new AccountPostSectionScope());
    }

    public function accounts()
    {
        return $this->belongsToMany(
            'ConfrariaWeb\Account\Models\Account',
            'account_post_section',
            'section_id',
            'account_id'
        );
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function categories()
    {
        return $this->belongsToMany(
            'ConfrariaWeb\Post\Models\PostCategory',
            'post_category_section',
            'category_id',
            'section_id'
        );
    }

    public function posts()
    {
        return $this->belongsToMany(
            'ConfrariaWeb\Post\Models\Post',
            'post_section',
            'post_id',
            'section_id'
        );
    }
}
