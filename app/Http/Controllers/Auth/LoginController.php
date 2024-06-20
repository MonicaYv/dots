<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\LoginLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;
use App\Helpers\ActivityHelper;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function name()
    {
        return 'name';
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
     protected function authenticated(Request $request, $user)
    {
        $localIP = getHostByName(getHostName());
        $agent = new Agent();
        $system = $agent->platform();
        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);
        $systemVersion = $agent->version($system);
        $location = Location::get($localIP);
       
       
        $locationString = $location ? "{$location->city}, {$location->region}, {$location->country}" : 'Unknown';
        LoginLog::create([
            'user_id' => $user->id,
            'user_image' => $user->avatar, 
            'login_time' => now(),
            'system' => $system,
            'system_version' => $systemVersion,
            'system_image' => $this->getSystemImage($system),
            'browser' => "{$browser} {$browserVersion}",
            'browser_image' => $this->getBrowserImage($browser),
            'login_address' => $localIP,
        ]);

         ActivityHelper::log('Log In', "$system $systemVersion $browser $browserVersion", 'India,');
    }

    private function getSystemImage($system)
    {
        // Return the image URL based on the system
        $systemImages = [
            'Windows' => 'path/to/windows/image.png',
            'Linux' => 'path/to/linux/image.png',
            'Mac' => 'path/to/mac/image.png',
            // Add other systems and their images
        ];

        return $systemImages[$system] ?? 'path/to/default/system/image.png';
    }

    private function getBrowserImage($browser)
    {
        // Return the image URL based on the browser
        $browserImages = [
            'Chrome' => 'path/to/chrome/image.png',
            'Firefox' => 'path/to/firefox/image.png',
            'Safari' => 'path/to/safari/image.png',
            // Add other browsers and their images
        ];

        return $browserImages[$browser] ?? 'path/to/default/browser/image.png';
    }

}
