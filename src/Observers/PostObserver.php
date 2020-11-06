<?php

namespace ConfrariaWeb\Post\Observers;

use ConfrariaWeb\Post\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostObserver
{

    /**
     * Handle the post section "retrieved" event.
     *
     * @param \ConfrariaWeb\Post\Models\Post $post
     * @return void
     */
    public function retrieved(Post $post)
    {
        //
    }

    /**
     * Handle the post section "creating" event.
     *
     * @param \ConfrariaWeb\Post\Models\Post $post
     * @return void
     */
    public function creating(Post $post)
    {
        $user_id = Auth::id();
        $post->setAttribute('user_id', $user_id);
    }

    /**
     * Handle the post "created" event.
     *
     * @param \ConfrariaWeb\Post\Models\Post $post
     * @return void
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Handle the post "updated" event.
     *
     * @param \ConfrariaWeb\Post\Models\Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param \ConfrariaWeb\Post\Models\Post $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param \ConfrariaWeb\Post\Models\Post $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param \ConfrariaWeb\Post\Models\Post $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
