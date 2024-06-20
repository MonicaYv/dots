<?php

namespace App\Helpers;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityHelper
{
    public static function log($action, $details, $address)
    {
        $user = Auth::user();

        Activity::create([
            'user_id' => $user->id,
            'date' => now(),
            'action' => $action,
            'details' => $details,
            'address' => $address,
        ]);
    }
}
