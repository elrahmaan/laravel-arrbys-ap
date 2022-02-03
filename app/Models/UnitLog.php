<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnitLog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['department', 'service'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function service()
    {
        return $this->belongsTo(ServiceAsset::class);
    }
    public static function getDataUnit()
    {
        $record = DB::table('unit_logs')->leftJoin('service_assets', 'unit_logs.asset_id', '=', 'service_assets.id')
            ->leftJoin('departments', 'unit_logs.department_id', '=', 'departments.id')
            ->select(
                'service_assets.name as asset_name',
                'departments.name as department_name',
                'unit_logs.complainant_name as complainant_name',
                'unit_logs.desc_complain as desc_complain',
                'unit_logs.diagnose as diagnose',
                'unit_logs.date_fixed as date_fixed'
            )->get()->toArray();
        return $record;
    }
    public static function getServiceParameter($fromDates, $toDates)
    {
        if ($fromDates == $toDates) {
            $record = DB::table('unit_logs')->leftJoin('service_assets', 'unit_logs.asset_id', '=', 'service_assets.id')
                ->leftJoin('departments', 'unit_logs.department_id', '=', 'departments.id')
                ->select(
                    'service_assets.name as asset_name',
                    'departments.name as department_name',
                    'unit_logs.complainant_name as complainant_name',
                    'unit_logs.desc_complain as desc_complain',
                    'unit_logs.diagnose as diagnose',
                    'unit_logs.date_fixed as date_fixed'
                )->where('unit_logs.date_fixed', '=', $fromDates)->get()->toArray();
        } else {
            $record = DB::table('unit_logs')->leftJoin('service_assets', 'unit_logs.asset_id', '=', 'service_assets.id')
                ->leftJoin('departments', 'unit_logs.department_id', '=', 'departments.id')
                ->select(
                    'service_assets.name as asset_name',
                    'departments.name as department_name',
                    'unit_logs.complainant_name as complainant_name',
                    'unit_logs.desc_complain as desc_complain',
                    'unit_logs.diagnose as diagnose',
                    'unit_logs.date_fixed as date_fixed'
                )->where('unit_logs.date_fixed', '>=', $fromDates)
                ->where('unit_logs.date_fixed', '<=', $toDates)->get()->toArray();
        }
        return $record;
    }
}
