<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['department', 'serial', 'loanAsset'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function serial()
    {
        return $this->belongsTo(Serial::class);
    }

    public function loanAsset()
    {
        return $this->hasMany(LoanAsset::class);
    }

    //--------------------- NEW FOR ALL-----------------
    public static function getDate()
    {
        $current_month = Carbon::now()->format('m');
        // dd($current_month);
        $record = DB::table('loans')
            ->selectRaw('DISTINCT loan_date')
            ->where('loans.status', 'Return')
            ->whereMonth('loan_date', $current_month)
            ->orderBy('loan_date', 'ASC')
            ->get()->toArray();
        return $record;
    }
    public static function getLoanPerDate($date)
    {
        $current_month = Carbon::now()->format('m');
        // dd($current_month);
        $record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
            ->select('loans.id as id', 'loans.approved_by_return as approved_return', 'loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.loan_date as loan_date', 'loans.real_return_date')
            ->where('loans.status', 'Return')
            ->where('loan_date', $date)
            ->get()->toArray();
        return $record;
    }
    //--------------------------------------------------

    public static function getLoan()
    {
        $current_month = Carbon::now()->format('m');
        // dd($current_month);
        $record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
            ->select('loans.id as id', 'loans.approved_by_return as approved_return', 'loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.loan_date as loan_date', 'loans.real_return_date')
            ->where('loans.status', 'Return')
            ->whereMonth('loan_date', $current_month)
            ->get()->toArray();
        return $record;
    }
    public static function getLoanAsset($id)
    {
        $records = DB::table('loan_assets')
            ->leftJoin('loans', 'loan_assets.loan_id', '=', 'loans.id')
            ->leftJoin('serials', 'loan_assets.serial_id', '=', 'serials.id')
            ->leftJoin('assets', 'serials.asset_id', '=', 'assets.id')
            ->select('loans.id as id','assets.name as name', 'loans.approved_by_return as approved_return', 'serials.no_serial as no_serial', 'loans.approved_by as approved_by', 'assets.category_asset as category_asset', 'loans.loan_date as loan_date', 'loans.real_return_date')
            ->where('loan_assets.loan_id', $id)->get()->toArray();
            foreach ($records as $record) {
                $recordData[] = $record->name . ' (' . $record->no_serial . ' | ' .  $record->category_asset . ')';
            }
        return $recordData;
    }
    public static function getLoanParameter($fromDates, $toDates)
    {
        if ($fromDates == $toDates) {
            $record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
                ->select('loans.id as id', 'loans.approved_by_return as approved_return', 'loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.loan_date as loan_date', 'loans.real_return_date')
                ->where('loan_date', '=', $fromDates)
                ->where('status', 'Return')->get()->toArray();
        } else {
            $record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
                ->select('loans.id as id', 'loans.approved_by_return as approved_return', 'loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.loan_date as loan_date', 'loans.real_return_date')
                ->where('loans.loan_date', '>=', $fromDates)
                ->where('loans.loan_date', '<=', $toDates)
                ->where('status', 'Return')->get()->toArray();
        }
        //$record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
        //         ->select('loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.equipment as equipment', 'loans.category_asset as category_asset', 'loans.loan_date as loan_date', 'loans.estimation_return_date as estimation_return_date', 'loans.status as status')
        //         ->whereDate('loan_date', '>=', $fromDates)
        //         ->whereDate('loan_date', '<=', $toDates)->get()->toArray();
        return $record;
    }
}