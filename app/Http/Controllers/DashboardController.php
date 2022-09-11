<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Carbon\Carbon;
use PDF;
use App\Models\Pelanggaran;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        
        // dd(User::all());
        if (auth()->user()->role == "anggota") {
            $petugas = auth()->user()->nama;

            // $count_1 = DB::table('pelanggarans')
            // ->where('petugas', '=', $petugas)
            // ->count();
            // $count_2 = DB::table('laporan_kegiatan')
            // ->where('petugas', '=', $petugas)
            // ->count();
            // $count_3 = DB::table('users')->count();
            $count_1 = DB::table('pelanggarans')->count();
            $count_2 = DB::table('laporan_kegiatan')->count();
            $count_3 = DB::table('users')->count();

            $query = DB::table('pelanggarans')->select('pelanggarans.*')
            ->where('petugas', '=', $petugas)
            ->orderBy('pelanggarans.created_at','desc')
            ->get();
            return view('dash.dashboard', ['datas'=>$query,
            'count_1'=>$count_1,
            'count_2'=>$count_2,
            'count_3'=>$count_3,
            ]);

        } else if(auth()->user()->role == "kepala") {
            $count_1 = DB::table('pelanggarans')->count();
            $count_2 = DB::table('laporan_kegiatan')->count();
            $count_3 = DB::table('users')->count();
    
            $query = DB::table('pelanggarans')->select('pelanggarans.*')
            ->orderBy('pelanggarans.created_at','desc')
            ->get();
            return view('dash.dashboard', ['datas'=>$query,
             'count_1'=>$count_1,
             'count_2'=>$count_2,
             'count_3'=>$count_3,
            ]);
        } else {
            $count_1 = DB::table('pelanggarans')->count();
            $count_2 = DB::table('laporan_kegiatan')->count();
            $count_3 = DB::table('users')->count();
    
            $query = DB::table('pelanggarans')->select('pelanggarans.*')
            ->orderBy('pelanggarans.created_at','desc')
            ->get();
            return view('dash.dashboard', ['datas'=>$query,
             'count_1'=>$count_1,
             'count_2'=>$count_2,
             'count_3'=>$count_3,
            ]);
        }
        
    }

    public function formPelanggaran()
    {
        $kecamatan =  DB::table('kecamatan')->select('kecamatan.*')
        ->get();
        
        return view('dash.tambah_tindak_pelanggaran', ['kecamatan'=>$kecamatan]);
    }

    public function proses_tindak_pelanggaran(Request $req)
    {
        // dd($req->all());
        $dt_planggar = new Pelanggaran;
        $dt_planggar->nama = $req->nama;
        $dt_planggar->petugas = $req->petugas;
        $dt_planggar->nik = $req->nik;
        $dt_planggar->pekeerjaan = $req->pekeerjaan;
        $file_ktp = $req->file('fl_nik');
        $dt_planggar->fl_nik = $file_ktp->getClientOriginalName();
        $file_ktp->move(public_path('file/'), $file_ktp->getClientOriginalName());
        $dt_planggar->nohp = $req->nohp;
        $dt_planggar->jns_pelanggaran = $req->jns_pelanggaran;
        $dt_planggar->lks_pelanggaran = $req->lks_pelanggaran;
        $dt_planggar->kelurahan = $req->kelurahan;
        $dt_planggar->kecamatan = $req->kecamatan;
        $dt_planggar->sanksi = $req->sanksi;
        $dt_planggar->alamat = $req->alamat;
        $dt_planggar->desk_pelanggaran = $req->desk_pelanggaran;
        $simpan = $dt_planggar->save();
        
        if($simpan) {
            Session::flash('berhasil', 'Data tindak pelanggaran berhasil tersimpan');
            return redirect('/tindak_pelanggaran');
        } else {
            Session::flash('gagal', 'Data tindak pelanggaran gagal tersimpan');
            return redirect()->back();
        }
    }

    public function tndk_pelanggaran()
    {
       
        if(auth()->user()->role == "anggota") {
            $petugas = auth()->user()->nama;
            $query = DB::table('pelanggarans')->select('pelanggarans.*')
            ->where('petugas', $petugas) 
            ->orderBy('pelanggarans.created_at','desc')
            ->get();
    
            return view('dash.tindak_pelanggaran', ['datas'=>$query]);
        } else {
            $query = DB::table('pelanggarans')->select('pelanggarans.*') 
            ->orderBy('pelanggarans.created_at','desc')
            ->get();
    
            return view('dash.tindak_pelanggaran', ['datas'=>$query]);
        }
        
    }

    public function upload_kegiatan()
    {
        return view('dash.upl_kegiatan');
    }

    public function simpan_laporan(Request $req)
    {
        
        // dd($unik);
        $dt_laporan = new Kegiatan;
        $dt_laporan->petugas = $req->petugas;
        $file_laporan = $req->file('file_kegiatan');
        $unik = uniqid() . '.' .  $req->file('file_kegiatan')->getClientOriginalExtension();
        $dt_laporan->file_kegiatan = $unik;
        $file_laporan->move(public_path('laporan_file/'), $unik);
        $dt_laporan->nama_file = $req->nama_file;
        $simpan = $dt_laporan->save();
        
        if($simpan) {
            Session::flash('berhasil', 'Data laporan kegiatan berhasil tersimpan');
            return redirect('/laporan_kegiatan');
        } else {
            Session::flash('gagal', 'Data laporan kegiatan gagal tersimpan');
            return redirect()->back();
        }
    }

    public function laporan_kegiatan()
    {
        if (auth()->user()->role == "anggota") {
            $petugas = auth()->user()->nama;
            $query = DB::table('laporan_kegiatan')->select('laporan_kegiatan.*')
            ->where('petugas', $petugas) 
            ->orderBy('laporan_kegiatan.created_at','desc')
            ->get();
            return view('dash.laporan_kegiatan', ['datas'=>$query]);
        } else {
            $query = DB::table('laporan_kegiatan')->select('laporan_kegiatan.*') 
            ->orderBy('laporan_kegiatan.created_at','desc')
            ->get();
            return view('dash.laporan_kegiatan', ['datas'=>$query]);
        }
       
    }

    public function pdf_tindak_pelangggaran($id)
    {

        $doc_lihat = Pelanggaran::find($id);
        $petugas = $doc_lihat->petugas;
        $dt_petugas = DB::table('users')->select('users.*') 
        ->where('nama', $petugas)
        ->first();

        $pdf = PDF::loadview('dash.pdf_tindak_pelanggaran', [
            'doc_lihat' => $doc_lihat,
            'dt_petugas'=> $dt_petugas,
        ]);
        return $pdf->stream();
    }

    public function unduh_pelangggaran($id)
    {
        $doc_lihat = Pelanggaran::find($id);
        $petugas = $doc_lihat->petugas;
        $nama = $doc_lihat->nama;
        $dt_petugas = DB::table('users')->select('users.*') 
        ->where('nama', $petugas)
        ->first();

        $pdf = PDF::loadview('dash.pdf_tindak_pelanggaran', [
            'doc_lihat' => $doc_lihat,
            'dt_petugas'=> $dt_petugas,
        ]);

        return $pdf->download('Formulir-Tidakan-Pelanggaran-'.$nama.'.pdf');
    }

    public function hapus_tindak_pelangggaran($id)
    {
        $user = Pelanggaran::where('id', $id)->delete();
        
         if($user == 1) {
             $success = true;
             $message = "Data tindakan pelanggaran berhasil dihapus !";
         } else {
             $success = true;
             $message = "gagal";
         }
         return response()->json([
             'success' => $success,
             'message' => $message,
         ]);
    } 

    public function hapus_laporan_kegiatan($id)
    {
        $user = Kegiatan::where('id', $id)->delete();
        
         if($user == 1) {
             $success = true;
             $message = "Data laporan kegiatan berhasil dihapus !";
         } else {
             $success = true;
             $message = "gagal";
         }
         return response()->json([
             'success' => $success,
             'message' => $message,
         ]);
    }

    public function getkelurahan(Request $req)
    {
        $id_kecamatan = $req->ambilId;
        $kelurahan = DB::table('kelurahan')->select('kelurahan.*') 
        ->where('id_kecamatan', $id_kecamatan)
        ->get();

        foreach($kelurahan as $klh) {
            echo "<option value='$klh->kelurahan'>$klh->kelurahan</option>";
        }

    }

    public function lihat_dokumen($id)
    {
        $data = Kegiatan::find($id);
        return response()->json($data);
    }

    public function unduh_laporan_kegiatan($id)
    {
        $get_file = Kegiatan::where('id', $id)->firstOrFail();
        $path_file = public_path('laporan_file/'.$get_file->file_kegiatan);
        return response()->download($path_file);
    }
}
