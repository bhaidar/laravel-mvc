<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory;

//    protected $dates = [
//        'created_at',
//        'updated_at',
//        'deleted_at'
//    ];

//    protected $casts = [
//        'published_at' => 'date'
//    ];

    protected $fillable = [
        'title',
        'body',
        'slug',
        'user_id',
        'published_at'
    ];

    public function publishedAt(): Attribute
    {
        return Attribute::make(
            get: static fn ($value) => Carbon::parse($value)?->format('Y-m-d'),
            set: static fn ($value) => Carbon::parse($value)?->format('Y-m-d')
        );
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
