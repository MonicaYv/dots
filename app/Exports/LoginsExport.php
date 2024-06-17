<?php

namespace App\Exports;

use App\Models\LoginLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoginsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Add some logging to check if this method is being called
        \Log::info('LoginsExport collection method called');
        
        return LoginLog::with('user')
            ->join('users', 'login_logs.user_id', '=', 'users.id')
            ->select('users.name as user_name', 'login_logs.login_time', 'login_logs.system', 'login_logs.system_version', 'login_logs.browser', 'login_logs.login_address')
            ->get();
    }

    public function headings(): array
    {
        return [
            'USER',
            'LOG IN DATE',
            'SYSTEM',
            'SYSTEM VERSION',
            'BROWSER',
            'LOGIN ADDRESS',
        ];
    }
}
