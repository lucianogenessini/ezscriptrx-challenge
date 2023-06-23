<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends AbstractBaseModel
{
    protected $fillable = [
        'title',
        'author_id',
        'total_copies',
        'available_copies',
    ];

    protected $casts = [
        'total_copies' => 'integer',
        'available_copies' => 'integer',
    ];

    /**
     * Borrowed Books Relation
     * 
     * @return HasMany
     */
    public function borrowedBooks(): HasMany
    {
        return $this->hasMany(BorrowedBook::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    /**
     * Store or update a book
     * 
     * @param string $title
     * @param int $authorId
     * @param int $totalCopies
     * @param int $availableCopies
     * 
     * @return Book
     */
    public static function storeOrUpdate(
        string $title,
        int $authorId, 
        int $totalCopies, 
        int $availableCopies
    ): Book
    {
        return Book::updateOrCreate(
            [
                'title' => $title,
                'author_id' => $authorId,
            ],
            [
                'title' => $title,
                'author_id' => $authorId,
                'total_copies' => $totalCopies,
                'available_copies' => $availableCopies,
            ]
        );
    }

    /**
     * Returns only books available to borrow
     * 
     * @return Book|null
     */
    public static function getBooksAvailableToBorrow(): ?Collection
    {
        return Book::where('available_copies', '>', 0)->get();
    }

    /**
     * set attribute to TitleCase
     * 
     * @param string $title
     * 
     * @return void
     */
    public function setTitleAttribute(string $title): void
    {
        $this->attributes['title'] = ucwords($title);
    }
}
