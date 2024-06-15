<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuditLog;

use App\Models\User;
use App\Models\Roles;
use Carbon\Carbon;
use App\Exports\OperationExport;
use Maatwebsite\Excel\Facades\Excel;


class OperationLogController extends Controller
{
     public function index()
    {
    	
        $log = AuditLog::with('user')->orderBy('created_at', 'desc')->paginate(8);
        $roles = Roles::get();

        return view('operationLog',compact('log', 'roles'));
    }

     public function filter(Request $request)
    {
        
        $filter = $request->input('filter');
        $query = AuditLog::with('user');
        $roleId= @$request->roles?$request->roles:0;

        switch ($filter) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case '7-days':
                $query->where('created_at', '>=', Carbon::today()->subDays(7));
                break;
            case '30-days':
                $query->where('created_at', '>=', Carbon::today()->subDays(30));
                break;

                 case 'role':
                if ($roleId) {
                   $query->whereHas('user', function ($query) use ($roleId) {
                $query->where('roleID', $roleId);
            });
                }
                
                break;

            default:
                break;
        }

    	
        $log = $query->take(7)->get();

        $view = view('partials.operationLogEntries', compact('log'))->render();

        return response()->json(['html' => $view]);
    }

     public function export()
    {
          // Add some logging to check if this method is being called
        \Log::info('LoginController export method called');

        return Excel::download(new OperationExport, 'operation.xlsx');
    }
}
