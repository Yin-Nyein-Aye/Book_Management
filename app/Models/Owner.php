<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    use HasFactory;
    protected $table = 'content_owner';
    protected $primaryKey = 'idx';

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
