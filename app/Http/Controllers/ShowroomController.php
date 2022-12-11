<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showroom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShowroomController extends Controller
{
    public function index()
    {
        $showrooms = Showroom::with('owner')->where('user_id', Auth::user()->id)->get();
        return view('items', ['showrooms' => $showrooms]);
    }

    public function detail($id)
    {
        $showroom = Showroom::find($id);
        return view('detail', ['showroom' => $showroom]);
    }

    public function add()
    {
        return view('add');
    }

    public function edit($id)
    {
        $showroom = Showroom::findOrFail($id);
        return view('edit', ['showroom' => $showroom]);
    }

    public function delete($id)
    {
        $showroom = Showroom::find($id);
        $showroom->delete();

        if ($showroom) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Data berhasil dihapus');
        } else {
            Session::flash('status', 'Failed');
            Session::flash('message', 'Data gagal dihapus');
        }

        return redirect('/items');
    }

    public function create(Request $request)
    {
        $showroom = new Showroom;
        $showroom->user_id = Auth::user()->id;
        $showroom->name = $request->name;
        $showroom->owner = $request->owner;
        $showroom->brand = $request->brand;
        $showroom->purchase_date = $request->purchase_date;
        $showroom->description = $request->description;
        $showroom->image = $request->file('image')->getClientOriginalName();
        $showroom->status = $request->status;
        $showroom->created_at = now();
        $showroom->updated_at = now();
        $showroom->save();

        if ($showroom) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Data berhasil ditambahkan');
        } else {
            Session::flash('status', 'Failed');
            Session::flash('message', 'Data gagal ditambahkan');
        }

        $request->file('image')->storeAs('public', $request->file('image')->getClientOriginalName());

        return redirect('/items');
    }

    public function update(Request $request, $id)
    {
        $showroom = Showroom::findOrFail($id);
        $showroom->user_id = Auth::user()->id;
        $showroom->name = $request->name;
        $showroom->owner = $request->owner;
        $showroom->brand = $request->brand;;
        $showroom->purchase_date = $request->purchase_date ?? $showroom->purchase_date;
        $showroom->description = $request->description;
        if ($request->image) {
            $showroom->image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $request->file('image')->getClientOriginalName());
        }
        $showroom->image = $request->image ?? $showroom->image;
        $showroom->status = $request->status;;
        $showroom->updated_at = now();
        $showroom->save();

        return redirect('/items');
    }
}
