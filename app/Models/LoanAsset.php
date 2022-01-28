<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanAsset extends Model
{
    use HasFactory;

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
