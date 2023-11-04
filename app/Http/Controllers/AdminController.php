<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $datas = Admin::all();
        return view('admin.index')->with('datas', $datas);
    }
    public function archive(Request $request)
    {
        $datas = Admin::withTrashed()->get(); // Mengambil semua data, termasuk yang telah dihapus secara logis
        return view('admin.archive')->with('datas', $datas);
    }

    public function create()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hp' => 'required',
            'merk_hp' => 'required',
            'tgl_hp' => 'required',
            'id_os' => 'required',
        ]);

        Admin::create([
            'nama_hp' => $request->nama_hp,
            'merk_hp' => $request->merk_hp,
            'tgl_hp' => $request->tgl_hp,
            'id_os' => $request->id_os,
        ]);

        return redirect()->route('admin.index')->with('success', 'Data Handphone berhasil disimpan');
    }

    public function edit($id)
    {
        $data = Admin::find($id);
        return view('admin.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama_hp' => 'required',
            'merk_hp' => 'required',
            'tgl_hp' => 'required',
            'id_os' => 'required',
        ]);

        $data = Admin::find($id);
        $data->update([
            'nama_hp' => $request->nama_hp,
            'merk_hp' => $request->merk_hp,
            'tgl_hp' => $request->tgl_hp,
            'id_os' => $request->id_os,
        ]);

        return redirect()->route('admin.index')->with('success', 'Data handphone berhasil diubah');
    }

    public function delete($id)
    {
        $data = Admin::find($id);
        $data->delete(); // Soft delete
        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil dihapus');
    }
}
