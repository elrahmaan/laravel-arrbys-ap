<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPrice extends Model
{
    use HasFactory;

    protected $table = 'list_prices';

    public function category()
    {
        return $this->belongsTo(AssetCategory::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function getLpp()
    {
        $record = ListPrice::all();
        return $record;
    }
}
