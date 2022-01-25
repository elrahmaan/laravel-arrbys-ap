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

    public static function getLoan()
    {
        $record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
            ->select('loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.equipment as equipment', 'loans.category_asset as category_asset', 'loans.loan_date as loan_date', 'loans.estimation_return_date', 'loans.status')->get()->toArray();
        return $record;
    }
    public static function getLoanParameter($fromDates, $toDates)
    {
        if ($fromDates == $toDates) {
            $record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
                ->select('loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.equipment as equipment', 'loans.category_asset as category_asset', 'loans.loan_date as loan_date', 'loans.estimation_return_date as estimation_return_date', 'loans.status as status')
                ->where('loan_date', '=', $fromDates)->get()->toArray();
        } else {
            $record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
                ->select('loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.equipment as equipment', 'loans.category_asset as category_asset', 'loans.loan_date as loan_date', 'loans.estimation_return_date as estimation_return_date', 'loans.status as status')
                ->where('loans.loan_date', '>=', $fromDates)
                ->where('loans.loan_date', '<=', $toDates)->get()->toArray();
        }
        //$record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
        //         ->select('loans.name as name', 'departments.name as department_name', 'loans.approved_by as approved_by', 'loans.equipment as equipment', 'loans.category_asset as category_asset', 'loans.loan_date as loan_date', 'loans.estimation_return_date as estimation_return_date', 'loans.status as status')
        //         ->whereDate('loan_date', '>=', $fromDates)
        //         ->whereDate('loan_date', '<=', $toDates)->get()->toArray();
        return $record;
    }
}
