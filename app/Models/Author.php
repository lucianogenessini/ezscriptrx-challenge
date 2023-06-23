<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends AbstractBaseModel
{
    protected $fillable = [
        'name',
        'last_name',
    ];

    /**
     * @return HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'author_id');
    }

    /**
     * Store or update a new author
     * 
     * @param string $name
     * @param string $lastName
     * 
     * @return Author
     */
    public static function storeOrUpdate(string $name, string $lastName): Author
    {
        return Author::updateOrCreate(
            ['name' => $name, 'last_name' => $lastName],
            [
                'name' => $name,
                'last_name' => $lastName,
            ]
        );
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
