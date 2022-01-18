<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $guarded = ['id'];

    public function service_asset()
    {
        return $this->hasMany(ServiceAsset::class);
    }
    public function unit_log()
    {
        return $this->hasMany(UnitLog::class);
    }
    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
    
}