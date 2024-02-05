<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesReport extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'amount', 'quantity', 'down_payment', 'status', 'sales_date_id', 'user_id'];

    // SalesReport model

    public function salesDate()
    {
        return $this->belongsTo(SalesDate::class, 'sales_date_id'); // Replace 'sales_date_id' with your actual foreign key name
    }
}
