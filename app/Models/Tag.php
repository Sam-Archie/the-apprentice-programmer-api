<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "tag"
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public static function fromStrings(array $strings) : Collection
    {
        return collect($strings)->map(fn($str) => trim($str))
        ->unique()
        ->map(fn($str) => Tag::firstOrCreate(["tag" => $str]));
    }
}
