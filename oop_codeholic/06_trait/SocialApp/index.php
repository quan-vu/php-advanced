<?php

namespace Socialapp;

trait ShareableTrait
{
    public function share()
    {
        echo self::class . "Shared with ID " . $this->id . PHP_EOL;
    }
}

class Post
{
    use ShareableTrait;

    public $id = 1;
}

class Photo
{
    use ShareableTrait;

    public $id = 1;
}

class Comment
{
    use ShareableTrait;

    public $id = 1;
}

$post = new Post();
$post->share();

$photo = new Photo();
$photo->share();

$comment = new Comment();
$comment->share();