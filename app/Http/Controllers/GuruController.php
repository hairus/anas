<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kandidat;
use App\Models\vote_mpk;
use App\Models\vote_osis;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index');
    }

    public function pemOsis()
    {
        /*cek siswa jika sudah milih osis maka langsung di lempar ke pemilihan mpk */
        $cek = vote_osis::where('pemilih_id', auth()->user()->id)->count();
        if ($cek >= 1) {
            return redirect('/guru/pemMpk');
        } else {
            $osis = kandidat::where('categoris_id', 1)->get();
            return view('guru.pemOsis', compact('osis'));
        }
    }

    public function pemMpk()
    {
        $cek = vote_mpk::where('pemilih_id', auth()->user()->id)->count();
        if ($cek >= 1) {
            return redirect('/guru/finish');
        } else {
            $osis = kandidat::where('categoris_id', 2)->get();
            return view('guru.mpk', compact('osis'));
        }
    }

    public function saveVote(Request $request)
    {
        $request->validate([
            'radio' => 'required'
        ]);

        $cek = vote_osis::where('pemilih_id', auth()->user()->id)->count();
        if ($cek >= 1) {
            return redirect('/guru/pemMpk');
        } else {
            $saveVote = new vote_osis();
            $saveVote->user_id = $request->radio[0];
            $saveVote->pemilih_id = auth()->user()->id;
            $saveVote->save();

            return back();
        }
    }

    public function saveVoteMpk(Request $request)
    {
        $request->validate([
            'radio' => 'required'
        ]);

        $cek = vote_mpk::where('pemilih_id', auth()->user()->id)->count();
        if ($cek >= 1) {
            return redirect('/guru/finish');
        } else {
            $saveVote = new vote_mpk();
            $saveVote->user_id = $request->radio[0];
            $saveVote->pemilih_id = auth()->user()->id;
            $saveVote->save();

            return redirect('/guru/finish');
        }
    }

    public function finish()
    {
        $vote_osis_saya = vote_osis::where('pemilih_id', auth()->user()->id)->first();
        $vote_mpk_saya = vote_mpk::where('pemilih_id', auth()->user()->id)->first();

        return view('guru.finish', compact('vote_osis_saya', 'vote_mpk_saya'));
    }
}
