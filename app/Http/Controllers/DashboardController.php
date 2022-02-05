<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Serial;
use App\Models\ServiceAsset;
use App\Models\UnitLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (request('year')) {
            $current_year = request('year');
        } else {
            $current_year = Carbon::now()->isoFormat('YYYY');
        }

        $logs = DB::table('unit_logs')->whereYear('created_at', $current_year)->count();
        $now = Carbon::now()->toDateString();
        $loans_late = DB::table('loans')
            ->where('estimation_return_date', '<', $now)
            ->where('status', 'In Loan')
            ->orderBy('loan_date', 'desc')
            ->whereYear('created_at', $current_year)
            ->take(5)
            ->count();
        $loans = Loan::orderBy('loan_date', 'desc')->whereYear('loan_date', $current_year)->take(5)->get();
        $loan_late = DB::table('loans')
            ->orderBy('loan_date', 'desc')
            ->whereYear('created_at', $current_year)
            ->get()->sortBy('status');
        $services = ServiceAsset::all();
        $serials = Serial::all()->sortBy('asset_id')->where('is_borrowed', true);
        $logs_data = UnitLog::orderBy('created_at', 'desc')->take(5)->get();
        $inrepair = DB::table('service_assets')->where('status', 'In Repair')->whereYear('date', $current_year)->count();
        $fixed = DB::table('service_assets')->where('status', 'Fixed')->whereYear('date', $current_year)->count();
        $inloan = DB::table('loans')->where('status', 'In Loan')->whereYear('loan_date', $current_year)->count();
        $return = DB::table('loans')->where('status', 'Return')->whereYear('loan_date', $current_year)->count();
        $countData = DB::table('loans')->count();
        $years = DB::table("loans")
            ->selectRaw("DISTINCT year(loan_date) year")
            ->orderByRaw('year ASC')
            ->get();

        $service_1 = DB::table('unit_logs')
            ->whereMonth('created_at', 1)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_2 = DB::table('unit_logs')
            ->whereMonth('created_at', 2)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_3 = DB::table('unit_logs')
            ->whereMonth('created_at', 3)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_4 = DB::table('unit_logs')
            ->whereMonth('created_at', 4)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_5 = DB::table('unit_logs')
            ->whereMonth('created_at', 5)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_6 = DB::table('unit_logs')
            ->whereMonth('created_at', 6)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_7 = DB::table('unit_logs')
            ->whereMonth('created_at', 7)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_8 = DB::table('unit_logs')
            ->whereMonth('created_at', 8)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_9 = DB::table('unit_logs')
            ->whereMonth('created_at', 9)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_10 = DB::table('unit_logs')
            ->whereMonth('created_at', 10)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_11 = DB::table('unit_logs')
            ->whereMonth('created_at', 11)
            ->whereYear('created_at', $current_year)
            ->count();
        $service_12 = DB::table('unit_logs')
            ->whereMonth('created_at', 12)
            ->whereYear('created_at', $current_year)
            ->count();


        // loan
        $loan_1 = DB::table('loans')
            ->whereMonth('loan_date', 1)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_2 = DB::table('loans')
            ->whereMonth('loan_date', 2)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_3 = DB::table('loans')
            ->whereMonth('loan_date', 3)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_4 = DB::table('loans')
            ->whereMonth('loan_date', 4)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_5 = DB::table('loans')
            ->whereMonth('loan_date', 5)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_6 = DB::table('loans')
            ->whereMonth('loan_date', 6)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_7 = DB::table('loans')
            ->whereMonth('loan_date', 7)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_8 = DB::table('loans')
            ->whereMonth('loan_date', 8)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_9 = DB::table('loans')
            ->whereMonth('loan_date', 9)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_10 = DB::table('loans')
            ->whereMonth('loan_date', 10)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_11 = DB::table('loans')
            ->whereMonth('loan_date', 11)
            ->whereYear('loan_date', $current_year)
            ->count();
        $loan_12 = DB::table('loans')
            ->whereMonth('loan_date', 12)
            ->whereYear('loan_date', $current_year)
            ->count();

        return view('layouts.dashboard', compact(
            'logs',
            'logs_data',
            'now',
            'loan_late',
            'loans_late',
            'services',
            'loans',
            'serials',
            'inrepair',
            'fixed',
            'inloan',
            'return',
            'service_1',
            'service_2',
            'service_3',
            'service_4',
            'service_5',
            'service_6',
            'service_7',
            'service_8',
            'service_9',
            'service_10',
            'service_11',
            'service_12',
            'loan_1',
            'loan_2',
            'loan_3',
            'loan_4',
            'loan_5',
            'loan_6',
            'loan_7',
            'loan_8',
            'loan_9',
            'loan_10',
            'loan_11',
            'loan_12',
            'current_year',
            'countData',
            'years',
        ));
    }
}
