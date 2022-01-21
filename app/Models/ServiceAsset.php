<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAsset extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(AssetCategory::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function log()
    {
        return $this->hasMany(UnitLog::class);
    }
}