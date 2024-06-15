<?php

namespace App\Exports;

use App\Models\Login;
use App\Models\AuditLog;
use Maatwebsite\Excel\Concerns\FromCollection;


class OperationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // Add some logging to check if this method is being called
        \Log::info('LoginsExport collection method called');
        
        return AuditLog::select('user_id', 'created_at', 'event', 'new_values')->get();
    }
      public function headings(): array
    {
        return [
            'USER',
            'LOG IN DATE',
            'Action',
            'Details',
            
        ];
    }
}

