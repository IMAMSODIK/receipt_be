<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Boxes',
            'data' => Box::all(),
        ];

        return view('box.index', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:boxes,name'
            ]);

            Box::create([
                'name' => $request->name
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Box baru berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        try {
            $box = Box::findOrFail($id);
            return response()->json($box);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        try {
            $request->validate([
                'name' => "required|unique:boxes,name,$id"
            ]);

            $box = Box::findOrFail($id);
            $box->update([
                'name' => $request->name
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal update: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        try {
            $box = Box::findOrFail($id);
            $box->delete();
            
            return response()->json([
                'status' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }
}
