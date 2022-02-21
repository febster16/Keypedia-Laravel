<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\transactionDetail;
use App\Models\transactionHeader;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function getTransaction() {
        $date = new DateTime();
        $categories = Category::all();
        $transactions = transactionHeader::where('user_id', '=', Auth::user()->id)->get();

        if(Auth::user()->role == 'manager'){
            return redirect('home')->with(['date' => $date]);
        }

        return view('transactionHistory', ['date' => $date, 'categories'=>$categories, 'transactions'=>$transactions]);
    }

    public function getTransactionDetail($id) {
        $date = new DateTime();
        $categories = Category::all();
        $transaction = transactionHeader::where('id', '=', $id)->first();
        if($transaction['user_id'] != Auth::user()->id){
            return redirect('home')->with(['date' => $date]);
        }
        $details = transactionDetail::where('transaction_id', '=', $id)->get();
        $totalPrice = 0;
        foreach($details as $d) {
            $totalPrice += $d->subtotal;
        }
        return view('transactionDetail', ['date' => $date, 'categories'=>$categories, 'details'=>$details, 'transaction'=>$transaction, 'totalPrice'=>$totalPrice]);
    }

}
