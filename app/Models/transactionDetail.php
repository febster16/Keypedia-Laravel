<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';

    public function transactionHeader() {
        return $this->belongsTo(transactionHeader::class);
    }
}
