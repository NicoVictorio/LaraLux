<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function mostReservedProduct()
    {
        $products = DB::table('product_transaction')
            ->join('transactions as t', 'product_transaction.transaction_id', '=', 't.id')
            ->join('products as p', 'product_transaction.product_id', '=', 'p.id')
            ->join('hotels as h', 'h.id', '=', 'p.hotel_id')
            ->select('p.name as product_name', 'h.name as hotel_name', DB::raw('SUM(product_transaction.quantity) as total_quantity'))
            ->groupBy('p.id', 'p.name', 'h.name')
            ->orderBy('total_quantity', 'desc')
            ->limit(3)
            ->get();
        return view('report.mostReservedProducts', compact('products'));
    }

    public function mostMembership()
    {
        $data = DB::table('users')
            ->select('name','poin')
            ->orderBy('poin', 'desc')
            ->limit(1)
            ->get();
        return view('report.mostMembership', compact('data'));
    }

    public function mostProduct()
    {
        $products = DB::table('product_transaction')
            ->join('transactions as t', 'product_transaction.transaction_id', '=', 't.id')
            ->join('users as u','t.user_id','=','u.id')
            ->select('u.name as user_name', DB::raw('SUM(product_transaction.quantity) as total_quantity'))
            ->groupBy('u.name')
            ->orderBy('total_quantity', 'desc')
            ->limit(3)
            ->get();
        return view('report.mostProduct', compact('products'));
    }
}
