<?php

namespace App\Http\Controllers;

use App\Models\HotelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $this->authorize('menu-permission', $user);

        $querybuilder = HotelType::all(); // ini untuk pake model
        return view('hotel_type.index', ['data' => $querybuilder]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $this->authorize('menu-permission', $user);

        return view('hotel_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $this->authorize('menu-permission', $user);

        $data = new HotelType();
        $data->name = $request->get('type_name');
        $data->save();
        return redirect()->route("hoteltype.index")->with('status', "Horray, Your new category data is already inserted");
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
        $user = Auth::user();
        $this->authorize('menu-permission', $user);

        $type = HotelType::find($id);
        $data = $type;
        return view('hotel_type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $this->authorize('menu-permission', $user);

        $type = HotelType::find($id);
        $updateData = $type;
        $updateData->name = $request->type_name;
        $updateData->save();
        return redirect()->route('hoteltype.index')->with('status', 'Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $this->authorize('menu-permission', $user);

        $type = HotelType::find($id);
        try {
            $deletedData = $type;
            $deletedData->delete();
            return redirect()->route('hoteltype.index')->with('status', 'Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('hoteltype.index')->with('status', $msg);
        }
    }
}
