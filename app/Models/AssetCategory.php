<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
    use HasFactory;

    protected $table = 'asset_categories';

    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];
    // protected $with = ['service_asset', 'asset'];

    public function service_asset()
    {
        return $this->hasMany(ServiceAsset::class);
    }
    public function asset()
    {
        return $this->hasMany(Asset::class);
    }
    public function listPrice()
    {
        return $this->hasMany(ListPrice::class);
    }
}
