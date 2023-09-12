<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role', 'client')->get();
        if(empty($clients)) return abort(404);
        
        return view('clients.index', compact('clients'));
    }

    public function profile($slug)
    {
        $client = User::with('tickets')->where('slug', $slug)->where('role', 'client')->first();
        if(empty($client)) return abort(404);
        
        return view('clients.profile', compact('client'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $auth = User::find(Auth::id());

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt('password');
        $user->address = $request->address;
        $user->save();

        $log = new Log();
        $log->message = $auth->role . ' ' . $auth->full_name . ' created a new client ' . $user->first_name . ' ' . $user->last_name;
        $log->type = 'success';
        $log->icon = 'fa fa-user-plus';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->route('dashboard.clients')->with('success', 'Client added successfully');
    }

    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'state' => 'string|max:255',
            'country' => 'string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $auth = User::find(Auth::id());

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->hasFile('profile_pic')) {
            if ($user->profile_pic !== null) {
                $profile_pic_exists = Storage::exists('public/profiles/' . $user->profile_pic);
                
                if ($profile_pic_exists) {
                    Storage::delete('public/profiles/' . $user->profile_pic);
                }
            }

            $profile_image = 'famouscooperative-client-' . time() . '.' . $request->profile_pic->getClientOriginalExtension();
            $request->profile_pic->storeAs('public/profiles', $profile_image);
            
            $user->profile_pic = $profile_image;
        }

        $user->save();

        $log = new Log();
        $log->message = $auth->role . ' ' . $auth->full_name . ' updated client ' . $user->first_name . ' ' . $user->last_name;
        $log->type = 'success';
        $log->icon = 'fa fa-user-circle';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'client updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user) return abort(404);

        if ($user->profile_pic !== null) {
            $profile_pic_exists = Storage::exists('public/profiles/' . $user->profile_pic);
            
            if ($profile_pic_exists) {
                Storage::delete('public/profiles/' . $user->profile_pic);
            }
        }

        $auth = User::find(Auth::id());

        $user->delete();

        $log = new Log();
        $log->message = $auth->role . ' ' . $auth->full_name . ' deleted client ' . $user->first_name . ' ' . $user->last_name;
        $log->type = 'danger';
        $log->icon = 'fa fa-user-times';
        $log->image = $auth->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'client deleted successfully');
    }
}
