<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['category', 'serial'];

    public function category()
    {
        return $this->belongsTo(AssetCategory::class);
    }
    public function serial()
    {
        return $this->hasMany(Serial::class);
    }
}