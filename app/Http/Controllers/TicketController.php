<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{

    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {

        $ticket = new Ticket();
 
        $this->validate($request, [
            "title" => 'required',
            "description" => 'required',
        ]);

        $request->user()->tickets()->create([
            "user_id" => Auth::user()->id ?? 0,
            "title" => $request['title'],
            "description" => $request['description']
        ]);

        return back();
    }

    public function index () {

        $tickets = Ticket::where('user_id', auth()->user()->id)->get();

        //dd($tickets);
        return view('index', ['tickets' => $tickets]);
    }

    public function edit($id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first()->refresh();

        return view('edit', ["ticket" => $ticket]);
    }

    public function update(Request $request, $id)
    {
        $ticket = new Ticket();
        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
        $data['id'] = $id;
        $ticket->updateTicket($data);

        return redirect(route('tickets.index'))->with('success', 'New support ticket has been updated!!');

    }

    public function destroy($id)
    {

        $ticket = Ticket::find($id);
        //dd($ticket);
        $ticket->delete();

        return redirect(route('tickets.index'))->with('success', 'Ticket has been deleted!!');
    }

}
