<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Hotel::all();
        foreach ($items as $r) {
            $directory = public_path('img/hotel/' . $r->id);
            if (File::exists($directory)) {
                $files = File::files($directory);
                $filenames = [];
                foreach ($files as $file) {
                    $filenames[] = $file->getFilename();
                }
                $r['filenames'] = $filenames;
            }
        }
        return view('hotel.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = HotelType::orderBy('name')->get();
        return view('hotel.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'phone_number' => 'required',
                'email' => 'required',
                'type' => 'required',
            ]
        );

        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->phone_number = $request->phone_number;
        $hotel->email = $request->email;
        $hotel->type_id = $request->type;
        $hotel->save();

        return view('hotel.formUploadPhoto', compact('hotel'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Hotel::find($id);
        foreach ($data->products as $p) {
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
        return view("hotel.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel = Hotel::find($id);
        $types = HotelType::all();
        return view("hotel.edit", ['data' => $hotel, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Hotel::find($id);
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->phone_number = $request->get('phone_number');
        $data->email = $request->get('email');
        $data->type_id = $request->get('type');
        $data->save();
        return redirect('hotel')->with('status', 'Success update hotel!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        try {
            $deletedData = $hotel;
            $deletedData->delete();
            return redirect()->route('hotel.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('hotel.index')->with('status', $msg);
        }
    }

    public function uploadPhoto(Request $request)
    {
        $hotel_id = $request->hotel_id;
        $hotel = Hotel::find($hotel_id);
        return view('hotel.formUploadPhoto', compact('hotel'));
    }

    public function simpanPhoto(Request $request)
    {
        $file_photo_appearance = $request->file("file_photo_appearance");
        $file_photo_lobby = $request->file("file_photo_lobby");
        $file_photo_pool = $request->file("file_photo_pool");
        $file_photo_lounge = $request->file("file_photo_lounge");
        $folder = 'img/hotel/' . $request->hotel_id;
        @File::makeDirectory(public_path() . "/" . $folder);
        $filename1 = time() . "_" . $file_photo_appearance->getClientOriginalName();
        $filename2 = time() . "_" . $file_photo_lobby->getClientOriginalName();
        $filename3 = time() . "_" . $file_photo_pool->getClientOriginalName();
        $filename4 = time() . "_" . $file_photo_lounge->getClientOriginalName();
        $file_photo_appearance->move($folder, $filename1);
        $file_photo_lobby->move($folder, $filename2);
        $file_photo_pool->move($folder, $filename3);
        $file_photo_lounge->move($folder, $filename4);
        return redirect()->route('hotel.index')->with('status', 'Data Berhasil Ditambah!');
    }

    public function deletePhoto(Request $request)
    {
        File::delete(public_path() . "/" . $request->filepath);
        return redirect()->route('hotel.index')->with('status', 'photo dihapus');
    }
}
