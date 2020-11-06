<?php

namespace ConfrariaWeb\Post\Observers;

use ConfrariaWeb\Post\Models\PostCategory;
use Illuminate\Support\Facades\Auth;

class PostCategoryObserver
{

    /**
     * Handle the post section "creating" event.
     *
     * @param \ConfrariaWeb\Post\Models\PostCategory $postCategory
     * @return void
     */
    public function creating(PostCategory $postCategory)
    {
        $user_id = Auth::id();
        $postCategory->setAttribute('user_id', $user_id);
    }

    /**
     * Handle the post category "created" event.
     *
     * @param \ConfrariaWeb\Post\Models\PostCategory $postCategory
     * @return void
     */
    public function created(PostCategory $postCategory)
    {
        //
    }

    /**
     * Handle the post category "updated" event.
     *
     * @param \ConfrariaWeb\Post\Models\PostCategory $postCategory
     * @return void
     */
    public function updated(PostCategory $postCategory)
    {
        //
    }

    /**
     * Handle the post category "deleted" event.
     *
     * @param \ConfrariaWeb\Post\Models\PostCategory $postCategory
     * @return void
     */
    public function deleted(PostCategory $postCategory)
    {
        //
    }

    /**
     * Handle the post category "restored" event.
     *
     * @param \ConfrariaWeb\Post\Models\PostCategory $postCategory
     * @return void
     */
    public function restored(PostCategory $postCategory)
    {
        //
    }

    /**
     * Handle the post category "force deleted" event.
     *
     * @param \ConfrariaWeb\Post\Models\PostCategory $postCategory
     * @return void
     */
    public function forceDeleted(PostCategory $postCategory)
    {
        //
    }
}
