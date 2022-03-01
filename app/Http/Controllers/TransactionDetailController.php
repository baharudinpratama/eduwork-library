<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.transaction.transaction_detail');
    }

    public function api(Request $request)
    {
        $transactionDetails = TransactionDetail::all();

        $datatables = datatables()->of($transactionDetails)->addIndexColumn();

        return $datatables->make(true);
    }
}
