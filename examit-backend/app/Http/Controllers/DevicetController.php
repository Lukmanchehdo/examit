<?php

namespace App\Http\Controllers;

use App\Models\Devicet;
use Illuminate\Http\Request;

class DevicetController extends Controller
{
    public function index()
    {
        $devicet = Devicet::orderBy('id', 'ASC')->get();
        return response()->json([
            'devicet' => $devicet,
            'status' => 'OK',
        ]);

    }

    public function save(Request $request)
    {
        $devicet = new Devicet;

        $devicet->name = $request->name;
        $devicet->remain = $request->remain;

        $devicet->save();

        return response()->json([
            'devicet_data' => $devicet,
            'message' => 'Data Insert Successfully',
        ]);
    }

    public function update(Request $request)
    {

        $devicet = Devicet::find($request->id);

        $devicet->name = $request->name;
        $devicet->remain = $request->remain;

        $devicet->save();

        return response()->json([
            'devicet_data' => $devicet,
            'message' => 'Data Update Successfully',
        ]);

    }

    public function delete($id)
    {
        $delete = Devicet::find($id)->delete();

        return response()->json([
            'message' => 'Data Delete Successfully',
        ]);
    }
}
