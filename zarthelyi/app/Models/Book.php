<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'reviews',
        'user_rating',
        'author_id',
        'price',
        'year',
        'genre_id'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class,'genre_id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function author()
    {
        return $this->belongsTo(Author::class,'author_id');
    }

}
