<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();

        return view('admin.section._publisher', compact('publishers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_publisher' => 'required|string|max:255|unique:publisher,publisher_name',
            'email_publisher' => 'required|email|max:255',
            'telp_publisher' => 'required|string|max:255',
            'alamat_publisher' => 'required|string',
        ], [
            'publisher_name.required' => 'Nama Penerbit Wajib Diisi',
            'publisher_name.unique' => 'Nama Penerbit ini sudah ada di database',
        ]);

        Publisher::create([
            'publisher_name' => $validated['nama_publisher'],
            'publisher_email' => $validated['email_publisher'],
            'publisher_telp' => $validated['telp_publisher'],
            'publisher_address' => $validated['alamat_publisher'],
        ]);
        return redirect()->back()->with('success', 'Penerbit Baru berhasil ditambahkan');
    }

    public function edit($id)
    {

        $publisher = Publisher::findOrFail($id);

        return view('admin.section._publisher', compact('publisher'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_publisher' => 'required|string|max:255|unique:publisher,publisher_name,' . $id,
            'email_publisher' => 'required|email|max:255',
            'telp_publisher' => 'required|string|max:255',
            'alamat_publisher' => 'required|string',
        ], [
            'nama_publisher.required' => 'Nama Penerbit Wajib Diisi',
            'nama_publisher.unique' => 'Nama Penerbit ini Sudah terdaftar',
        ]);

        $publisher = Publisher::findOrFail($id);

        $publisher->update([
            'publisher_name' => $validated['nama_publisher'],
            'publisher_email' => $validated['email_publisher'],
            'publisher_telp' => $validated['telp_publisher'],
            'publisher_address' => $validated['alamat_publisher'],
        ]);

        return redirect()->back()->with('success', 'penerbit berhasil diedit');
    }

    public function destroy($id)
    {
        $publisher = Publisher::findOrFail($id);

        // perintah untuk menghapus
        $publisher->delete();

        // me redirect ke halaman utama dengan pesan sukses
        return redirect()->back()->with('success', 'penerbit berhasil dihapus');
    }
}
