<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionHeader extends Model
{
    use HasFactory;

    protected $table = 'transaction_headers';

    public function transactionDetail() {
        return $this->hasMany(transactionDetail::class);
    }

    public function user() {
        return $this->belongsTo(user::class);
    }
}
