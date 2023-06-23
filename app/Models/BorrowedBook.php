<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BorrowedBook extends AbstractBaseModel
{

    protected $fillable = [
        'member_id',
        'book_id',
    ];
    /**
     * member realtion
     * 
     * @return HasMany
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    /**
     * book relation
     * 
     * @return HasMany
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    /**
     * Create a new borrow book
     * 
     * @param int $bookId
     * @param int $memberId
     * 
     * @return BorrowedBook
     */
    public static function store(
        int $bookId,
        int $memberId
    ): BorrowedBook
    {
        $borrow =  BorrowedBook::create(
            [
                'book_id' => $bookId,
                'member_id' => $memberId,
            ]
        );

        $borrow->book->available_copies--;
        $borrow->book->save();

        return $borrow;
    }
}
