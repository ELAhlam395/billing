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
        'name',
        'location',
        'DVS_VPS',
        'Added_ips',
        'price',
        'status',
        'Due_Date',
        'remarks'

    ];
}
