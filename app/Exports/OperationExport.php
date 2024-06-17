<?php

namespace App\Exports;

use App\Models\AuditLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OperationExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Add some logging to check if this method is being called
        \Log::info('OperationExport collection method called');
        
        return AuditLog::join('users', 'audits.user_id', '=', 'users.id')
            ->select('users.name as username', 'audits.created_at', 'audits.event', 'audits.new_values')
            ->get();
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
