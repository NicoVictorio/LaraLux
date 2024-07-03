<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $this->authorize('create-permission', $user);

        $hotels = Hotel::orderBy('name')->get();
        $type = ProductType::orderBy('name')->get();
        return view('product.create', compact('hotel_selected', 'hotels', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $this->authorize('create-permission', $user);

        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'type' => 'required',
                'description' => 'required',
                'available_room' => 'required',
                'hotel' => 'required',
            ]
        );

        $data = new Product();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->type_id = $request->type;
        $data->description = $request->description;
        $data->available_room = $request->available_room;
        $data->hotel_id = $request->hotel;
        $data->save();
        return view('product.formUploadPhoto', compact('data'));
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
        $user = Auth::user();
        $this->authorize('edit-permission', $user);

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
        $user = Auth::user();
        $this->authorize('edit-permission', $user);

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

        return redirect()->route('hotel.show', $product->hotel_id)->with('status', 'Horray, Your product data is already updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $this->authorize('delete-permission', $user);

        $product = Product::find($id);
        try {
            $deletedData = $product;
            $deletedData->delete();
            return redirect()->route('hotel.show', $product->hotel_id)->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('hotel.show', $product->hotel_id)->with('status', $msg);
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
        $file_photo_kamar = $request->file("file_photo_kamar");
        $file_photo_kamar2 = $request->file("file_photo_kamar2");
        $file_photo_kamar3 = $request->file("file_photo_kamar3");
        $file_photo_kamar4 = $request->file("file_photo_kamar4");
        $folder = 'img/product/' . $request->product_id;
        @File::makeDirectory(public_path() . "/" . $folder);
        $filename1 = time() . "_" . $file_photo_kamar->getClientOriginalName();
        $filename2 = time() . "_" . $file_photo_kamar2->getClientOriginalName();
        $filename3 = time() . "_" . $file_photo_kamar3->getClientOriginalName();
        $filename4 = time() . "_" . $file_photo_kamar4->getClientOriginalName();
        $file_photo_kamar->move($folder, $filename1);
        $file_photo_kamar2->move($folder, $filename2);
        $file_photo_kamar3->move($folder, $filename3);
        $file_photo_kamar4->move($folder, $filename4);
        return redirect()->route('hotel.show', $request->hotel_id)->with('status', 'Product Berhasil Ditambah!');
    }

    public function deletePhoto(Request $request)
    {
        File::delete(public_path() . "/" . $request->filepath);
        return redirect()->route('hotel.index')->with('status', 'photo dihapus');
    }

    public function createProduct(string $id)
    {
        $user = Auth::user();
        $this->authorize('create-permission', $user);

        $hotel_selected = Hotel::find($id);
        $hotels = Hotel::orderBy('name')->get();
        $type = ProductType::orderBy('name')->get();
        return view('product.create', compact('hotel_selected', 'hotels', 'type'));
    }
}
