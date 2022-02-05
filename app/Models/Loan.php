<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

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

    public static function getLoan()
    {
        $record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
            ->select('loans.id as id', 'loans.approved_by_return as approved_return', 'loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.loan_date as loan_date', 'loans.real_return_date')
            ->where('loans.status', 'Return')
            ->get()->toArray();
        return $record;
        // $record = DB::table('loan_assets')
        //     ->leftJoin('loans', 'loan_assets.loan_id', '=', 'loans.id')
        //     ->leftJoin('serials', 'loan_assets.serial_id', '=', 'serials.id')
        //     ->leftJoin('assets', 'serials.asset_id', '=', 'asset.id')
        //     ->leftJoin('asset_categories', 'assets.category_id', '=', 'asset_categories.id')
        //     ->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
        //     ->select('loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'assets.name as asset_name', 'loans.loan_date as loan_date', 'loans.estimation_return_date', 'loans.status')->get()->toArray();
        // return $record;
    }
    public static function getLoanAsset($id)
    {
        $record = DB::table('loan_assets')
            ->leftJoin('loans', 'loan_assets.loan_id', '=', 'loans.id')
            ->leftJoin('serials', 'loan_assets.serial_id', '=', 'serials.id')
            ->leftJoin('assets', 'serials.asset_id', '=', 'assets.id')
            ->select('assets.name as name', 'loans.approved_by_return as approved_return', 'serials.no_serial as no_serial', 'loans.approved_by as approved_by', 'assets.category_asset as category_asset', 'loans.loan_date as loan_date', 'loans.real_return_date')
            ->where('loan_assets.loan_id', $id)->get()->toArray();
        return $record;
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
