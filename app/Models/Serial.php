<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['asset', 'loan'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
}