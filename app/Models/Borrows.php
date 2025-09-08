<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrows extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_anggota', 'trans_number', 'return_date', 'note', 'status'];

    public function detailBorrows()
    {
        return $this->hasMany(DetailBorrows::class, 'id_borrow', 'id');
    }
    public function member()
    {
         return $this->belongsTo(Members::class, 'id_anggota', 'id');
    }
}
