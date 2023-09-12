<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

use App\Models\Record;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index(Request $request, $slug)
    {
        $client = User::where('slug', $slug)->first();
        if(empty($client)) return abort(404);

        $year = $request->query('year') ?? date('Y');
        $month = $request->query('month') ?? date('m');

        $records = $client->records()->with('employee')->whereMonth('date', $month)->whereYear('date', $year)->get();

        // account for months with 28, 29, 30, 31 days
        $days_in_month = $this->days_in_month($month, $year);

        $days = [];
        for($i = 1; $i <= $days_in_month; $i++) {
            // fill empty days from 1 to 31 on each month with empty object
            $new_record = new Record();
            $new_record->id = NULL;
            $new_record->client_id = NULL;
            $new_record->employee_id = NULL;
            $new_record->amount = NULL;
            $new_record->date = date('Y-m-d', strtotime($year . '-' . $month . '-' . $i));
            $new_record->created_at = NULL;
            $new_record->updated_at = NULL;

            $days[$i] = $new_record;
        }

        foreach($records as $record) {
            $days[date('j', strtotime($record->date))] = $record;
        }

        // return response()->json($days);
        return view('clients.records')->with([
            'client' => $client,
            'records' => $days,
            'total' => $records->sum('amount'),
            'year' => $year,
            'month' => $month,
        ]);
    }

    public function update(Request $request, $slug)
    {
        $client = User::where('slug', $slug)->first();
        if(empty($client)) return abort(404);

        $user = User::find(Auth::id());

        $request->validate([
            'record_id' => 'required|integer',
            'amount' => 'required|integer|min:10',
            'date' => 'required|date',
            // 'status' => 'string|max:255',
        ]);

        $data = [
            'employee_id' => Auth::user()->id,
            'amount' => $request->amount,
            'date' => $request->date,
        ];

        // create or update record
        $record = $client->records()->find($request->record_id ?? 0);
        $record ? $record->update($data) : $client->records()->create($data);

        $log = new Log();
        $log->message = 'Record for ' . $client->full_name . ' has been updated by ' . $user->role . ' ' . $user->full_name;
        $log->type = 'success';
        $log->icon = 'fa fa-database';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'Record updated successfully');
    }

    public function destroy($id)
    {
        $record = Record::find($id);
        if(empty($record)) return abort(404);

        $user = User::find(Auth::id());

        $record->delete();

        $log = new Log();
        $log->message = 'Record for ' . $record->client->full_name . ' has been deleted by ' . $user->role . ' ' . $user->full_name;
        $log->type = 'danger';
        $log->icon = 'fa fa-database';
        $log->image = $user->profile_pic_url;
        $log->save();

        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function days_in_month($month, $year)
    {
        // calculate number of days in a month
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }
}
