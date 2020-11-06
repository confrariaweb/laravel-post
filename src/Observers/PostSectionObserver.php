<?php

namespace ConfrariaWeb\Post\Observers;

use ConfrariaWeb\Post\Models\PostSection;
use Illuminate\Support\Facades\Auth;

class PostSectionObserver
{

    /**
     * Handle the post section "creating" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function creating(PostSection $postSection)
    {
        $user_id = Auth::id();
        $postSection->setAttribute('user_id', $user_id);
    }

    /**
     * Handle the post section "created" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function created(PostSection $postSection)
    {
        //
    }

    /**
     * Handle the post section "updated" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function updated(PostSection $postSection)
    {
        //
    }

    /**
     * Handle the post section "deleted" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function deleted(PostSection $postSection)
    {
        //
    }

    /**
     * Handle the post section "restored" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function restored(PostSection $postSection)
    {
        //
    }

    /**
     * Handle the post section "force deleted" event.
     *
     * @param  \ConfrariaWeb\Post\Models\PostSection  $postSection
     * @return void
     */
    public function forceDeleted(PostSection $postSection)
    {
        //
    }
}
