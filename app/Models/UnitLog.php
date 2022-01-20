<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitLog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function service()
    {
        return $this->belongsTo(ServiceAsset::class);
    }
}
