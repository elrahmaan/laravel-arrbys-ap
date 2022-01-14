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

    public function service_asset()
    {
        return $this->hasMany(ServiceAsset::class);
    }
}
