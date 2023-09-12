<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Record;
use App\Models\Ticket;
use App\Models\ThemeSetting;
use App\Models\CompanySetting;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::id());

        if($user->role == 'admin') {
            return view('admin-index');
        }

        return view('employee-index');
    }

    public function activities()
    {
        $logs = Log::orderBy('created_at', 'desc')->get();
        return view('activities', compact('logs'));
    }

    public function knowledgeBase()
    {
        return view('knowledge-base');
    }

    // Admin
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function companySettings(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'company_name' => 'required',
                'company_owner' => 'required',
                'company_address' => 'required',
                'company_email' => 'required',
                'company_phone' => 'required',
                'company_website' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'zip_code' => 'required',
            ]);

            $settings = CompanySetting::first();

            if(!$settings) {
                $settings = new CompanySetting;
            }

            $settings->company_name = $request->company_name;
            $settings->company_owner = $request->company_owner;
            $settings->company_address = $request->company_address;
            $settings->company_email = $request->company_email;
            $settings->company_phone = $request->company_phone;
            $settings->company_website = $request->company_website;
            $settings->country = $request->country;
            $settings->state = $request->state;
            $settings->city = $request->city;
            $settings->zip_code = $request->zip_code;
            $settings->save();

            return redirect()->back()->with('success', 'Company settings updated successfully!');
        }

        $settings = CompanySetting::first();
        return view('admin.company-settings', compact('settings'));
    }

    public function themeSettings(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'website_name' => 'required|string|max:255',
                'website_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'website_favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                // 'website_primary_color' => 'required|string|max:255',
                // 'website_secondary_color' => 'required|string|max:255',
            ]);

            $settings = ThemeSetting::first();

            if(!$settings) {
                $settings = new ThemeSetting;
            }

            $settings->website_name = $request->website_name;

            if($request->hasFile('website_logo')) {
                $logo = $request->file('website_logo');

                if (!is_null($settings->website_logo)) {
                    $path = 'public/site/' . $settings->website_logo;
                    
                    $logo_exists = Storage::exists($path);
                    if ($logo_exists) Storage::delete($path);
                }
    
                $name = 'famouscooperative-site-' . time() . '.' . $logo->getClientOriginalExtension();
                
                $logo->storeAs('public/site', $name);
                $settings->website_logo = $name;
            }

            if($request->hasFile('website_favicon')) {
                $favicon = $request->file('website_favicon');

                if (!is_null($settings->website_favicon)) {
                    $path = 'public/site/' . $settings->website_favicon;
                    
                    $favicon_exists = Storage::exists($path);
                    if ($favicon_exists) Storage::delete($path);
                }
    
                $name = 'famouscooperative-site-' . time() . '.' . $favicon->getClientOriginalExtension();
                
                $favicon->storeAs('public/site', $name);
                $settings->website_favicon = $name;
            }

            // $settings->website_primary_color = $request->website_primary_color;
            // $settings->website_secondary_color = $request->website_secondary_color;
            $settings->save();

            return redirect()->back()->with('success', 'Theme settings updated successfully');
        }

        $settings = ThemeSetting::first();
        return view('admin.theme-settings', compact('settings'));
    }
}
