<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        $users = User::all();
        $products = Product::all();
        return view("transaction.index", ['datas' => $transactions, 'users' => $users, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view("transaction.create", ['users' => $users, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->user_id = $request->get('user');
        $transaction->save();

        $product_id = $request->get('product');
        $quantity = $request->get('quantity');
        $subtotal = $request->get('subtotal');

        $poin = 0;
        $spend = 0;
        for ($i = 0; $i < count($product_id); $i++) {
            $transaction->products()->attach($product_id[$i], ['quantity' => $quantity[$i], 'subtotal' => $subtotal[$i]]);
            $p = Product::find($product_id[$i]);
            if ($p->productType->name == "Deluxe" || $p->productType->name ==  "Superior" || $p->productType->name ==  "Suite") {
                $poin += 5 * $quantity[$i];
            } else {
                $spend += $subtotal[$i];
            }
        }
        $poin += $spend / 300000;

        if ($request->get('poin') == "yes") {
            $user = User::find($transaction->user_id);
            $user->poin = $user->poin - $request->get('pointerpakai');
            $user->save();
        } else {
            $user = User::find($transaction->user_id);
            $user->poin = $user->poin + $poin;
            $user->save();
        }
        session()->forget('cart');
        return redirect('transaction')->with('status', 'Success add new transaction!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::find($id);
        $dataProducts = $transaction->products;
        $users = User::all();
        $products = Product::all();
        return view("transaction.edit", [
            'data' => $transaction,
            'dataProducts' => $dataProducts,
            'users' => $users,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);
        $transaction->user_id = $request->get('user');
        $transaction->save();

        DB::table('product_transaction')->where('transaction_id', $id)->delete();

        $product_id = $request->get('product');
        $quantity = $request->get('quantity');
        $subtotal = $request->get('subtotal');

        // dd($request->all());

        for ($i = 0; $i < count($product_id); $i++) {
            $transaction->products()->attach($product_id[$i], ['quantity' => $quantity[$i], 'subtotal' => $subtotal[$i]]);
        }
        return redirect('transaction')->with('status', 'Success update transaction!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $transaction = Transaction::find($id);
            $deletedData = $transaction;
            $deletedData->delete();
            return redirect()->route('transaction.index')->with('status', 'Data is successfully deleted!');
        } catch (\PDOException $ex) {
            $msg = "Failed to delete data! Make sure there is no related data before deleting it";
            return redirect()->route('transaction.index')->with('status', $msg);
        }
    }

    public function getPrice()
    {
        $product = Product::find($_POST['id']);
        return response()->json(['price' => $product->price], 200);
    }

    public function showAjax(Request $request)
    {
        $id = ($request->get('id'));
        $data = Transaction::find($id);
        $products = $data->products;
        foreach ($products as $p) {
            $directory = public_path('img/product/' . $p->id);
            if (File::exists($directory)) {
                $files = File::files($directory);
                $filenames = [];
                foreach ($files as $file) {
                    $filenames[] = $file->getFilename();
                }
                $p['filenames'] = $filenames;
            }
        }
        return response()->json(
            array(
                'msg' => view('transaction.showModal', compact('data', 'products'))->render()
            ),
            200
        );
    }
}
