<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index')->with('tickets', $tickets);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'client' => 'required|integer',
            'priority' => 'required',
            'description' => 'required',
        ]);

        $client = User::find($request->client);
        if(empty($client)) return abort(404);

        $user = User::find(Auth::id());

        $ticket = new Ticket([
            'title' => $request->get('title'),
            'client_id' => $client->id,
            'employee_id' => Auth::id(),
            'priority' => $request->get('priority'),
            'description' => $request->get('description'),
        ]);

        $ticket->save();

        $log = new Log();
        $log->message = 'New Ticket ' . $ticket->title . ' has was added by ' . $user->role . ' ' . $user->full_name . ' for ' . $client->role . ' ' . $client->full_name;
        $log->type = 'success';
        $log->icon = 'fa fa-ticket';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->route('dashboard.tickets')->with('success', 'Ticket has been added');
    }

    public function show($slug)
    {
        $ticket = Ticket::with('chats')->where('slug', $slug)->first();
        if(empty($ticket)) return abort(404);

        return view('tickets.show')->with('ticket', $ticket);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'client' => 'required|integer',
            'priority' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $client = User::find($request->client);
        if(empty($client)) return abort(404);

        $ticket = Ticket::find($id);
        if(empty($ticket)) return abort(404);

        $user = User::find(Auth::id());

        $ticket->title = $request->get('title');
        $ticket->client_id = $client->id;
        $ticket->employee_id = Auth::id();
        $ticket->priority = $request->get('priority');
        $ticket->status = $request->get('status');
        $ticket->description = $request->get('description');
        $ticket->save();

        $log = new Log();
        $log->message = 'Ticket ' . $ticket->title . ' has been updated by ' . $user->role . ' ' . $user->full_name . ' for ' . $client->role . ' ' . $client->full_name;
        $log->type = 'success';
        $log->icon = 'fa fa-ticket';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->route('dashboard.tickets')->with('success', 'Ticket has been updated');
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        if(empty($ticket)) return abort(404);

        $user = User::find(Auth::id());

        $ticket->delete();

        $log = new Log();
        $log->message = 'Ticket ' . $ticket->title . ' has been deleted by ' . $user->role . ' ' . $user->full_name;
        $log->type = 'danger';
        $log->icon = 'fa fa-ticket';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->route('dashboard.tickets')->with('success', 'Ticket has been deleted Successfully');
    }

    public function sendMessage(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if(empty($ticket)) return abort(404);

        $user = User::find(Auth::id());

        $request->validate([
            'message' => 'required',
        ]);

        $ticket->chats()->create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        $log = new Log();
        $log->message = 'New Message has been sent by ' . $user->role . ' ' . $user->full_name . ' for Ticket ' . $ticket->title;
        $log->type = 'success';
        $log->icon = 'fa fa-envelope';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'Message has been sent');
    }
}
