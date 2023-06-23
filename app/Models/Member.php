<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends AbstractBaseModel
{
    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'borrowed_books_limit',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
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
    /**
     * Create a new member
     * 
     * @param string $name
     * @param string $lastName
     * @param string $phone
     * @param int $borrowedBooksLimit
     * @param bool $active
     * 
     * @return Member
     */
    public static function store(
        string $name,
        string $lastName, 
        string $phone, 
        int $borrowedBooksLimit,
        bool $active
    ): Member
    {
        return Member::create(
            [
                'name' => $name,
                'last_name' => $lastName,
                'phone' => $phone,
                'borrowed_books_limit' => $borrowedBooksLimit,
                'active' => $active,
            ]
        );
    }

    /**
     * return only actives members
     * 
     * @return Member|null
     */
    public static function getActiveMembers(): ?Collection
    {
        return Member::where('active', true)->get();
    }

    /**
     * Returns true if the member can borrow a book
     * 
     * @return bool
     */
    public function canBorrow(): bool
    {
        return $this->borrowed_books_limit > $this->borrowedBooks()->count();
    }

    /**
     * verify if is the member can borrow a new book
     * 
     * @return void
     */
    public function verifyBorrowOrFail(): void
    {
        if (! $this->canBorrow()){
            throw new \Exception("The member has already reached the limit of books borrowed");
        }
    }

    /**
     * set attribute to TitleCase
     * 
     * @param string $name
     * 
     * @return void
     */
    public function setNameAttribute(string $name): void
    {
        $this->attributes['name'] = ucwords($name);
    }

     /**
     * set attribute to TitleCase
     * 
     * @param string $last_name
     * 
     * @return void
     */
    public function setLastNameAttribute(string $last_name): void
    {
        $this->attributes['last_name'] = ucwords($last_name);
    }
}
