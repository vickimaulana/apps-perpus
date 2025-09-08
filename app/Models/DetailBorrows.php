<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBorrows extends Model
{
    use SoftDeletes;
     protected $fillable = [
    'id_borrow', 'id_book',
];

    //relation orm ke table borrows
    public function borrow()
    {
        return $this->belongsTo(Borrows::class, 'id_borrow', 'id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'id_book', 'id');
    }
}
