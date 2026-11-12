<?php

namespace App\Models;

use Framework\Core\Model;

/**
 * Class Post
 * Represents a post consisting of multiple attributes for our application.
 *
 * @package App\Models
 */
class Post extends Model
{
    /**
     * Properties that can be set from a request by setFromRequest().
     *
     * @var string[]|null
     */
    protected static ?array $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'photo_path',
        'location',
        'date_planned',
        'status',
        'capacity',
        'price'
    ];

    protected ?int $id = null;
    protected int $user_id = 1; // Default user ID, should be set to the actual user ID when creating a post
    protected int $category_id = 1; // Default category ID
    protected string $title = '';
    protected string $description = '';
    protected ?string $photo_path = '';
    protected string $location = '';
    protected string $date_updated = '';
    protected string $date_planned = '';
    protected string $status = 'active';
    protected ?int $capacity = null;
    protected ?float $price = null;


    public function comments()
    {
        return Comment::getAll('post_id = ?', [$this->id]);
    }

    // --- ID ---
    public function getId(): ?int
    {
        return $this->id;
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

    // --- Category ID ---
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    // --- Title ---
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    // --- Description ---
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    // --- Photo Path ---
    public function getPhotoPath(): ?string
    {
        return $this->photo_path;
    }

    public function setPhotoPath(?string $photo_path): void
    {
        $this->photo_path = $photo_path;
    }

    // --- Location ---
    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    // --- Date Planned ---
    public function getDatePlanned(): string
    {
        return $this->date_planned;
    }

    public function setDatePlanned(string $date_planned): void
    {
        $this->date_planned = $date_planned;
    }

    // --- Date Updated ---
    public function getDateUpdated(): string
    {
        return $this->date_updated;
    }

    public function setDateUpdated(string $date_updated): void
    {
        $this->date_updated = $date_updated;
    }

    // --- Status ---
    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    // --- Capacity ---
    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(?int $capacity): void
    {
        $this->capacity = $capacity;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }
}
