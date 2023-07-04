<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photography;
use App\Http\Requests\StorePhotographyRequest;
use App\Http\Requests\UpdatePhotographyRequest;

class PhotographyController extends Controller
{
    /**
     * Menampilkan daftar data.
     */
    public function index()
    {
        return view('Photographies.data')->with([
            'photographies' => Photography::all()
        ]);
    }

    /**
     * Menampilkan form untuk membuat data baru.
     */
    public function create()
    {
        return view('Photographies.formadd');
    }

    /**
     * Menyimpan data baru ke dalam database.
     */
    public function store(StorePhotographyRequest $request)
    {
        $validated = $request->validated();

        $photography = new Photography();
        $photography->idnumber = $request->txtid;
        $photography->fullname = $request->txtfullname;
        $photography->address = $request->txtaddress;
        $photography->gender = $request->txtgender;
        $photography->phone = $request->txtphone;
        $photography->save();

        return redirect('Photographies')->with('msg', 'Menambahkan Data Baru Berhasil');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit($idnumber)
    {
        $photography = Photography::find($idnumber);
        
        return view('Photographies.formedit')->with([
            'txtid' => $idnumber,
            'txtfullname' => $photography->fullname,
            'txtaddress' => $photography->address,
            'txtgender' => $photography->gender,
            'txtphone' => $photography->phone,
        ]);
    }

    /**
     * Memperbarui data yang sudah ada di database.
     */
    public function update(UpdatePhotographyRequest $request, $idnumber)
    {
        $validated = $request->validated();

        $photography = Photography::find($idnumber);
        $photography->idnumber = $request->txtid;
        $photography->fullname = $request->txtfullname;
        $photography->address = $request->txtaddress;
        $photography->gender = $request->txtgender;
        $photography->phone = $request->txtphone;
        $photography->save();

        return redirect('Photographies')->with('msg', 'Memperbarui Data Berhasil');
    }

    /**
     * Menghapus data tertentu dari database.
     */
    public function destroy($idnumber)
{
    $photography = Photography::find($idnumber);
    
    if ($photography) {
        $photography->delete();
        return redirect('Photographies')->with('msg', 'Data berhasil dihapus');
    } else {
        return redirect('Photographies')->with('error', 'Data tidak ditemukan');
    }
}
}
