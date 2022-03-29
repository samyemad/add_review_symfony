<?php
namespace App\Event;
use Symfony\Contracts\EventDispatcher\Event;
use App\Entity\Blog\Comment;
class CommentInsertedEvent extends Event
{
    public const NAME = 'app.comment.inserted';

    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function getComment(): Comment
    {
        return $this->comment;
    }
}

