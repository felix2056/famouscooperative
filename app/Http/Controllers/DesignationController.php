<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Designation;
use App\Models\Log;
use App\Models\User;
use App\Models\UserDesignation;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        if(empty($designations)) return abort(404);
        
        return view('employees.designations', compact('designations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::find(Auth::id());

        $designation = new Designation();
        $designation->name = $request->name;
        $designation->save();

        $log = new Log();
        $log->message = 'New Designation ' . $designation->name . ' has been added by ' . $user->role . ' ' . $user->full_name;
        $log->type = 'success';
        $log->icon = 'fa fa-tasks';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'Designation added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::find(Auth::id());

        $designation = Designation::find($id);
        $designation->name = $request->name;
        $designation->save();

        $log = new Log();
        $log->message = 'Designation ' . $designation->name . ' has been updated by ' . $user->role . ' ' . $user->full_name;
        $log->type = 'success';
        $log->icon = 'fa fa-tasks';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'Designation updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find(Auth::id());

        $designation = Designation::find($id);
        if(empty($designation)) return abort(404);

        $designation->delete();

        $log = new Log();
        $log->message = 'Designation ' . $designation->name . ' has been deleted by ' . $user->role . ' ' . $user->full_name;
        $log->type = 'danger';
        $log->icon = 'fa fa-tasks';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'Designation deleted successfully');
    }
}
