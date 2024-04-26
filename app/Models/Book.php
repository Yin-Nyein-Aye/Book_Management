<?php

namespace App\Models;

use App\DB\Core\IntegerField;
use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $table = 'tbl_book';
    protected $primaryKey = 'idx';
    protected $guarded = ['idx'];
    public $timestamps = false;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class,"co_id","idx");
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class,"publisher_id","idx");
    }

    public function saveableFields(): array
    {
        return [
            'co_id'=>IntegerField::new(),
            'publisher_id'=>IntegerField::new(),
            'book_uniq_idx'=>StringField::new(),
            'bookname'=>StringField::new(),
            'cover_photo'=>StringField::new(),
            'prize'=>IntegerField::new()
        ];
    }
}
