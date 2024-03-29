<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morocco extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="morocco";
    protected $fillable = [
        'provider',
        'number_servers',
        'VDS_VPS',
        'price',
        'date_payment',
        'paid_by',
        'remarks'

    ];
}
