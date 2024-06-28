<?php

namespace App\Http\Controllers;

use App\Models\HotelType;
use Illuminate\Http\Request;

class HotelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $querybuilder = HotelType::all(); // ini untuk pake model
        return view('hotel_type.index', ['data' => $querybuilder]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new HotelType();
        $data->name = $request->get('type_name');
        $data->save();
        // dd($data);

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
    public function edit(HotelType $type)
    {
        $data = $type;
        // $data = Types::find($type);
        // dd($data);
        return view('hotel_type.edit', compact('data'));
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = HotelType::find($id);

        return response()->json(
            array(
                'status' => 'oke',
                'msg' => view('hotel_type.getEditForm', compact('data'))->render()
            ),
            200
        );
    }

    public function saveDataTD(Request $request)
    {
        $id = $request->id;
        $data = HotelType::find($id);
        $data->name = $request->name;
        $data->save();
        return response()->json(
            array(
                'status' => 'oke',
                'msg' => 'type data is up-to-date !'
            ),
            200
        );
    }

    public function deleteData(Request $request)
    {
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelType $type)
    {
        $updateData = $type;
        $updateData->name = $request->type_name;
        $updateData->save();
        return redirect()->route('hoteltype.index')->with('status', 'Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelType $type)
    {
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
