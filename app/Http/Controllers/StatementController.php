<?php

namespace App\Http\Controllers;

use App\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatementController extends Controller
{
    /**
     * User package buy statements
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $statements = Statement::where('userId', Auth::id())->get();
        return view('payment.statements', compact('statements'));
    }

    /**
     * Admin statements
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admin()
    {
        $statements = Statement::all();
        return view('payment.statements', compact('statements'));
    }
}
