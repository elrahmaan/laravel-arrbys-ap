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
    
    public function getLoan()
    {
        $record = DB::table('loans')->leftJoin('departments', 'loans.department_id', '=', 'departments.id')
        ->select('loans.name as name','departments.name as department_name', 'loans.approved_by as approved_by', 'loans.equipment as equipment', 'loans.category_asset as category_asset', 'loans.loan_date as loan_date','loans.estimation_return_date','loans.status')->get()->toArray();
        return $record;
    }
}