<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChangeRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'valid_id',
        'user_id',
        'status',
        'comment'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
