<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function service_asset()
    {
        return $this->hasMany(ServiceAsset::class);
    }
}