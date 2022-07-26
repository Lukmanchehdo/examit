<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\BorrowList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    public function index()
    {
        //$borrow = Borrow::all();

        $borrow = DB::table('Borrows')
            ->join('students', 'students.id', 'Borrows.student_id')
            ->select('Borrows.*', 'students.fullname as fullname')
            ->get();

        return response()->json([
            'borrow' => $borrow,
            'status' => 'OK',
        ]);
    }

    public function borrow_lists($id)
    {
        // $borrow_lists = BorrowList::all();

        $borrow_lists = DB::table('borrow_lists')
            ->join('borrows', 'borrows.id', 'borrow_lists.borrow_id')
            ->join('devicets', 'devicets.id', 'borrow_lists.device_id')
            ->select('borrow_lists.*', 'borrows.*', 'devicets.*')
            ->where('borrow_lists.borrow_id', $id)
            ->get();

        return response()->json([
            'borrow_lists' => $borrow_lists,
            'status' => 'OK',
        ]);

        // return response()->json($borrow_lists);
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
}
