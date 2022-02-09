<?php

namespace App\Models;

use Carbon\Carbon;
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
    public static function getDate()
    {
        $current_month = Carbon::now()->format('m');
        // dd($current_month);
        $record = DB::table('unit_logs')
            ->selectRaw('DISTINCT date_fixed')
            ->whereMonth('date_fixed', $current_month)
            ->orderBy('date_fixed', 'ASC')
            ->get()->toArray();
        return $record;
    }
    public static function getDateParameter($fromDates, $toDates)
    {
        $current_month = Carbon::now()->format('m');
        // dd($current_month);
        if ($fromDates == $toDates) {
            $record = DB::table('unit_logs')
                ->selectRaw('DISTINCT date_fixed')
                ->where('date_fixed', '=', $fromDates)
                ->orderBy('date_fixed', 'ASC')
                ->get()->toArray();
            
        } else {
            $record = DB::table('unit_logs')
                ->selectRaw('DISTINCT date_fixed')
                ->where('unit_logs.date_fixed', '>=', $fromDates)
                ->where('unit_logs.date_fixed', '<=', $toDates)
                ->orderBy('date_fixed', 'ASC')
                ->get()->toArray();
        }
        return $record;
    }
    public static function getLogPerDate($date)
    {
        $record = DB::table('unit_logs')->leftJoin('service_assets', 'unit_logs.asset_id', '=', 'service_assets.id')
            ->leftJoin('departments', 'unit_logs.department_id', '=', 'departments.id')
            ->select(
                'service_assets.name as asset_name',
                'departments.name as department_name',
                'unit_logs.complainant_name as complainant_name',
                'unit_logs.desc_complain as desc_complain',
                'unit_logs.diagnose as diagnose',
                'service_assets.date as date',
                'unit_logs.date_fixed as date_fixed',
                'unit_logs.created_at as created_at',
            )
            ->where('unit_logs.date_fixed', $date)
            ->get()->toArray();
        return $record;
    }
    public static function getDataUnit()
    {
        $current_month = Carbon::now()->format('m');
        $record = DB::table('unit_logs')->leftJoin('service_assets', 'unit_logs.asset_id', '=', 'service_assets.id')
            ->leftJoin('departments', 'unit_logs.department_id', '=', 'departments.id')
            ->select(
                'service_assets.name as asset_name',
                'departments.name as department_name',
                'unit_logs.complainant_name as complainant_name',
                'unit_logs.desc_complain as desc_complain',
                'unit_logs.diagnose as diagnose',
                'unit_logs.date_fixed as date_fixed',
                'unit_logs.created_at as created_at',
            )
            ->whereMonth('unit_logs.date_fixed', $current_month)
            ->get()->toArray();
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
                    'unit_logs.date_fixed as date_fixed',
                    'unit_logs.created_at as created_at',
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
                    'unit_logs.date_fixed as date_fixed',
                    'unit_logs.created_at as created_at',
                )->where('unit_logs.date_fixed', '>=', $fromDates)
                ->where('unit_logs.date_fixed', '<=', $toDates)->get()->toArray();
        }
        return $record;
    }
}
