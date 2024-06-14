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
        
        return LoginLog::select('user_id', 'login_time', 'system', 'system_version', 'browser','login_address')->get();
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
