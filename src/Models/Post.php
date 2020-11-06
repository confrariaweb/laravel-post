<?php

namespace ConfrariaWeb\Post\Models;

use ConfrariaWeb\Account\Traits\AccountTrait;
use ConfrariaWeb\File\Traits\FileTrait;
use ConfrariaWeb\Post\Scopes\AccountPostScope;
use ConfrariaWeb\Post\Scopes\CategoryPostScope;
use ConfrariaWeb\Post\Scopes\SectionPostScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use AccountTrait;
    use FileTrait;

    protected $fillable = [
        'user_id', 'title', 'content', 'status', 'slug', 'options'
    ];

    protected $casts = [
        'options' => 'collection'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new AccountPostScope());
        static::addGlobalScope(new CategoryPostScope());
        static::addGlobalScope(new SectionPostScope());
    }

    public function categories()
    {
        return $this->belongsToMany(
            'ConfrariaWeb\Post\Models\PostCategory',
            'post_category',
            'post_id',
            'category_id'
        );
    }

    public function sections()
    {
        return $this->belongsToMany(
            'ConfrariaWeb\Post\Models\PostSection',
            'post_section',
            'post_id',
            'section_id'
        );
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
