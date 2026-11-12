<?php
namespace App\Models;
use Framework\Core\Model;
class Comment extends Model
{
    protected static ?array $fillable = [
        'post_id',
        'user_id',
        'content'
    ];

    protected ?int $id = null;
    protected int $post_id;
    protected int $user_id;
    protected string $content;


    public function post()
    {
       return Post::getOne($this->post_id);
    }
    // --- ID ---
    public function getId(): ?int
    {
        return $this->id;
    }

    // --- Post ID ---
    public function getPostId(): int
    {
        return $this->post_id;
    }

    public function setPostId(int $post_id): void
    {
        $this->post_id = $post_id;
    }

    // --- User ID ---
    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    // --- Content ---
    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}