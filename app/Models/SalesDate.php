<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SalesDate extends Model
{
    use HasFactory;

    protected $fillable = ['date'];

    // SalesDate model

    protected $dates = ['date'];

    // Mutator for the date attribute
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = \Carbon\Carbon::createFromFormat('Y-m-d', $value);
    }

    // Accessor for the date attribute
    public function getDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value);
    }

    public function salesReports(): HasMany
    {
        return $this->hasMany(SalesReport::class);
    }
}
