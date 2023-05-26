<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ExpenseController extends Controller
{
    public function expenses()
    {
        $expenses = Payment::where('user_id', Auth::user()->id)->get();
        return view('expenses', compact('expenses'));
    }

    public function expensesPDF()
    {
        // retreive all records from db
        $data = Payment::where('user_id', Auth::user()->id)->get();;
        // share data to view
        view()->share('expenses', $data);
        $pdf = PDF::loadView('expense_log_pdf', array('expenses' => $data));
        // download PDF file with download method
        return $pdf->download('/expenses.pdf');
    }
}
