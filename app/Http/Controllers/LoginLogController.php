<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginLog;
use App\Models\User;
use Carbon\Carbon;


class LoginLogController extends Controller
{
     public function index()
    {
    	
        $log = LoginLog::with('user')->paginate(8);
        return view('loginLog',compact('log'));
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $query = LoginLog::with('user');

        switch ($filter) {
            case 'today':
                $query->whereDate('login_time', Carbon::today());
                break;
            case '7-days':
                $query->where('login_time', '>=', Carbon::today()->subDays(7));
                break;
            case '30-days':
                $query->where('login_time', '>=', Carbon::today()->subDays(30));
                break;
            default:
                break;
        }

    	
        $log = $query->take(7)->get();

        $view = view('partials.loginLogEntries', compact('log'))->render();

        return response()->json(['html' => $view]);
    }
}
