<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{


    /**
     * Handle the Post "saving" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function saving(Post $post)
    {
        // Create slug from title
        $post->slug = Str::slug($post->title, '-');

        // Strip quotations from quill js submission
        $post->body = substr($post->body, 1, -1);

        // Create excerpt from truncated text
        $post->excerpt = substr(strip_tags($post->body), 0, 55) . "...";

        // Set to true if visible has been toggled on
        $post->visible = is_null($post->visible) ? 0 : 1;
    }
}
