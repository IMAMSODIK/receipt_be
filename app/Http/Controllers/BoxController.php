<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
                'name' => 'required|unique:boxes,name',
                'pin' => 'required',
                'image' => 'nullable|image|max:2048'
            ]);

            $imagePath = null;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')
                    ->store('boxes', 'public');
            }

            Box::create([
                'name' => $request->name,
                'pin' => $request->pin,
                'image' => $imagePath
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Box baru berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
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
                'name' => "required|unique:boxes,name,$id",
                'pin' => "nullable",
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $box = Box::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($box->image && Storage::disk('public')->exists($box->image)) {
                    Storage::disk('public')->delete($box->image);
                }

                $path = $request->file('image')->store('boxes', 'public');
                $box->image = $path;
            }

            $box->name = $request->name;

            if ($request->pin){
                $box->pin = $request->pin;
            }

            $box->save();

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
            if ($box->image && Storage::disk('public')->exists($box->image)) {
                Storage::disk('public')->delete($box->image);
            }
            
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

    public function verifyPin(Request $request)
    {
        $request->validate([
            'pin' => 'required|string|size:6',
        ]);

        $user = $request->user();
        $box = Box::where('user_id', $user->id)->first();

        if (!$box) {
            return response()->json([
                'valid' => false,
                'message' => 'Box not found'
            ], 404);
        }

        if (!Hash::check($request->pin, $box->pin)) {
            return response()->json([
                'valid' => false
            ]);
        }

        return response()->json([
            'valid' => true
        ]);
    }
}
