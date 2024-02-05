<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'image',
    ];
}
