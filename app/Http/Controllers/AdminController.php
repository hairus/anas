<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Exports\GuruExport;
use App\Imports\SiswaImport;
use App\Models\categoris;
use App\Models\kandidat;
use App\Models\vote_mpk;
use App\Models\vote_osis;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::get()->sortBy('keterangan');

        return view('admin.allUser', compact('users'));
    }

    public function export()
    {
        return view('admin.importSiswa');
    }

    public function exportSiswa()
    {
        return (new SiswaExport)->download('siswa.xlsx');
    }

    public function exportGuru()
    {
        return (new GuruExport)->download('guru.xlsx');
    }

    public function importSiswa(Request $request)
    {
        Excel::import(new SiswaImport, request()->file('file_siswa'));

        return back();
    }

    public function pemOsis()
    {
        $siswas = User::doesnthave('kandidat')->where('keterangan', 'siswa')->get();
        $categoris = categoris::all();
        $kandidats = kandidat::with('user')->get();

        return view('admin.pemOsis', compact('siswas', 'categoris', 'kandidats'));
    }

    public function simpanKandidat(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'categori_id' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:25000'
        ]);


        if ($request->photo) {
            $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
            $rename = $fileName;
            $tempatUpload = 'photo';
            $file = $request->photo;
            $file->move($tempatUpload, $rename);

            $user = User::where('id', $request->user_id)->first();
            $user->kandidat()->create([
                'user_id' => $request->user_id,
                'categoris_id' => $request->categori_id,
                'photo' => $rename
            ]);

            return back();
        } else {

            $user = User::where('id', $request->user_id)->first();
            $user->kandidat()->create([
                'user_id' => $request->user_id,
                'categoris_id' => $request->categori_id
            ]);

            return back();
        }
    }

    public function chart()
    {
        /** data untuk osis */
        $osis = kandidat::where('categoris_id', 1)->get();
        foreach ($osis as $data) {
            $categoris[] = $data->user->name;
            $jumlah[] = vote_osis::where('user_id', $data->user_id)->count();
        }

        $mpk = kandidat::where('categoris_id', 2)->get();
        foreach ($mpk as $data) {
            $categoris1[] = $data->user->name;
            $jumlah1[] = vote_mpk::where('user_id', $data->user_id)->count();
        }

        return view('admin.chart', compact('osis', 'categoris', 'jumlah', 'categoris1', 'jumlah1'));
    }

    public function delKandidat($id)
    {
        $kandidat = kandidat::where('id', $id)->delete();

        return back()->with('message', 'sukses menghapus');
    }
}
