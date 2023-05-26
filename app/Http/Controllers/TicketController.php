<?php

namespace App\Http\Controllers;

use App\Models\PurchasedTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TicketController extends Controller
{
    public function myTickets()
    {
        $tickets = PurchasedTicket::where('user_id', Auth::user()->id)->get();
        return view('my_tickets', compact('tickets'));
    }

    public function ticketToPdf()
    {
        if($ticket = PurchasedTicket::where('user_id', Auth::user()->id)->where('id', $_GET['ticket_id'])->first())
        {
            // share data to view

            $pdf = PDF::loadView('ticket_pdf', array('ticket' => $ticket));

            // download PDF file with download method
            return $pdf->download('/ticket.pdf');
        }
    }
}
