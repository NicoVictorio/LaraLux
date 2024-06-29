<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Product::all();
        $hotels = Hotel::orderBy('name')->get();
        return view('product.index', compact('items', 'hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::orderBy('name')->get();
        $type = ProductType::orderBy('name')->get();
        return view('product.create', compact('hotels', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'type' => 'required',
                'description' => 'required',
                'available_room' => 'required',
                // 'image' => 'required',
                'hotel' => 'required',
            ]
        );

        $data = new Product();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->type_id = $request->type;
        $data->description = $request->description;
        $data->available_room = $request->available_room;
        // $data->image = $request->image;
        $data->hotel_id = $request->hotel;
        $data->save();
        return redirect()->route('hotel.index')->with('status', 'Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        return view("product.show", compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::find($id);
        $hotel = Hotel::all();
        $types = ProductType::all();
        return view("product.edit", compact('data', 'hotel', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found');
        }

        $product->name = $request->name;
        $product->hotel_id = $request->hotel_id;
        $product->type_id = $request->type_id;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        return redirect()->route('hotel.index')->with('status', 'Horray, Your product data is already updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $deletedData = $product;
            $deletedData->delete();
            return redirect()->route('product.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('product.index')->with('status', $msg);
        }
    }

    public function uploadPhoto(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        return view('product.formUploadPhoto', compact('product'));
    }

    public function simpanPhoto(Request $request)
    {
        $file = $request->file("file_photo");
        $folder = 'img/product/' . $request->product_id;
        @File::makeDirectory(public_path() . "/" . $folder);
        $filename = time() . "_" . $file->getClientOriginalName();
        $file->move($folder, $filename);
        return redirect()->route('hotel.index')->with('status', 'photo terupload');
    }

    public function deletePhoto(Request $request)
    {
        File::delete(public_path() . "/" . $request->filepath);
        return redirect()->route('hotel.index')->with('status', 'photo dihapus');
    }
}
