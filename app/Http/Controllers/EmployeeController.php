<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Log;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::where('role', 'employee')->get();
        if(empty($employees)) return abort(404);
        
        return view('employees.index', compact('employees'));
    }

    public function profile($slug)
    {
        $employee = User::where('slug', $slug)->where('role', 'employee')->first();
        if(empty($employee)) return abort(404);
        
        return view('employees.profile', compact('employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:4|confirmed',
            'designation' => 'required|integer',
        ]);

        $auth = User::find(Auth::id());

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->role = 'employee';
        $user->save();

        // attach designation
        $user->designations()->attach($request->designation);

        $log = new Log();
        $log->message = 'New Employee ' . $user->full_name . ' has been added by ' . $auth->role . ' ' . $auth->full_name . ' and assigned to ' . $user->designations()->first()->name;
        $log->type = 'success';
        $log->icon = 'fa fa-user-plus';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->route('dashboard.employees')->with('success', 'employee added successfully. Password is: '.$request->password);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'state' => 'string|max:255',
            'country' => 'string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'designation' => 'required|integer',
            'reports_to' => 'integer',
        ]);

        $auth = User::find(Auth::id());

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->reports_to = $request->reports_to;

        if($request->hasFile('profile_pic')) {
            if ($user->profile_pic !== null) {
                $profile_pic_exists = Storage::exists('public/profiles/' . $user->profile_pic);
                
                if ($profile_pic_exists) {
                    Storage::delete('public/profiles/' . $user->profile_pic);
                }
            }

            $profile_image = 'famouscooperative-employee-' . time() . '.' . $request->profile_pic->getClientOriginalExtension();
            $request->profile_pic->storeAs('public/profiles', $profile_image);
            
            $user->profile_pic = $profile_image;
        }

        $user->save();

        // detach all designations
        $user->designations()->detach();

        // attach designation
        $user->designations()->attach($request->designation);

        $log = new Log();
        $log->message = 'Employee ' . $user->full_name . ' has been updated by ' . $auth->role . ' ' . $auth->full_name;
        $log->type = 'success';
        $log->icon = 'fa fa-user-plus';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'employee updated successfully');
    }

    public function updatePersonal(Request $request, $id)
    {
        $request->validate([
            'passport_no' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'marital_status' => 'required|string|email|max:255',
            'no_of_children' => 'required|string|max:255'
        ]);

        $user = User::find($id);
        $user->passport_no = $request->passport_no;
        $user->religion = $request->religion;
        $user->marital_status = $request->marital_status;
        $user->no_of_children = $request->no_of_children;
        $user->save();

        return redirect()->back()->with('success', 'employee personal information updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user) return abort(404);

        $auth = User::find(Auth::id());

        if ($user->profile_pic !== null) {
            $profile_pic_exists = Storage::exists('public/profiles/' . $user->profile_pic);
            
            if ($profile_pic_exists) {
                Storage::delete('public/profiles/' . $user->profile_pic);
            }
        }
        
        $user->delete();

        $log = new Log();
        $log->message = 'Employee ' . $user->full_name . ' has been deleted by ' . $auth->role . ' ' . $auth->full_name;
        $log->type = 'danger';
        $log->icon = 'fa fa-user-times';
        $log->image = $auth->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'employee deleted successfully');
    }
}
