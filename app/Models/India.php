<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class India extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="india";
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
