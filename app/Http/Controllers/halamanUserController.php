<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class halamanUserController extends Controller
{
    public function halaman_user()
    {
        
        $query = DB::table('users')->select('users.*')
        ->orderBy('users.created_at','desc')
        ->get();

        return view('user.halaman_user', ['datas'=>$query]);
    }

    public function halaman_tambah_user()
    {
        return view('user.halaman_tambah_user');
    }

    public function simpan_user(Request $req)
    {
        // dd($req->all());
        $cek_email = User::where('email', '=', $req->email)->count();
        if($cek_email == 1) {
            Session::flash('fail', 'Email Pengguna telah digunakan');
            return redirect('/halaman_tambah_user');
        } else {
            $dt_planggar = new User;
            $dt_planggar->nama = $req->nama;
            $dt_planggar->username = $req->username;
            $dt_planggar->nip = $req->nip;
            $dt_planggar->jabatan = $req->jabatan;
            $dt_planggar->email = $req->email;
            $dt_planggar->role = $req->role;
            $dt_planggar->password = Hash::make($req->password);
            $simpan = $dt_planggar->save();
            
            if($simpan) {
                Session::flash('berhasil', 'Data Pengguna baru berhasil tersimpan');
                return redirect('/halaman_user');
            } else {
                Session::flash('gagal', 'Data pengguna gagal tersimpan');
                return redirect()->back();
            }
        }
        
    }

    public function edit_user($id)
    {
        $datas = User::find($id);
        return view('user.halaman_edit_user', ['id'=>$id, 'datas'=>$datas]);
    }

    public function ubah_user(Request $req, $id)
    {
        $cek_email = User::where('email', '=', $req->email)->count();
        if($cek_email == 0) {
            $dt_planggar = User::find($id);
            $dt_planggar->nama = $req->nama;
            $dt_planggar->username = $req->username;
            $dt_planggar->nip = $req->nip;
            $dt_planggar->jabatan = $req->jabatan;
            $dt_planggar->email = $req->email;
            $dt_planggar->role = $req->role;
            $simpan = $dt_planggar->save();
            
            if($simpan) {
                Session::flash('diubah', 'Data Pengguna berhasil diubah');
                return redirect('/halaman_user');
            } else {
                Session::flash('gagal', 'Data pengguna gagal diubah');
                return redirect()->back();
            } 
        } else {
            Session::flash('fail', 'Email Pengguna telah digunakan');
                return redirect()->back();
        }
    }


    public function hapus_user($id)
    {
        $user = User::where('id', $id)->delete();
        
         if($user == 1) {
             $success = true;
             $message = "Data Pengguna berhasil dihapus !";
         } else {
             $success = true;
             $message = "gagal menghapus";
         }
         return response()->json([
             'success' => $success,
             'message' => $message,
         ]);
    }

    public function kelola_profil()
    {
        $id = Auth::id();
        $data = User::find($id);
        return view('dash.kelola_profil', ['data'=>$data]);
    }

    public function update_profil(Request $req)
    {
        $id = Auth::id();
        $dt_planggar = User::find($id);

        
            $dt_planggar->nama = $req->nama;
            $dt_planggar->username = $req->username;
            $dt_planggar->nip = $req->nip;
            $dt_planggar->jabatan = $req->jabatan;
            $dt_planggar->email = $req->email;
            $dt_planggar->role = $req->role;
            $simpan = $dt_planggar->save();
            
            if($simpan) {
                Session::flash('diubah', 'Data Pengguna berhasil diubah');
                return redirect('/kelola_profil');
            } else {
                Session::flash('gagal', 'Data pengguna gagal diubah');
                return redirect('/kelola_profil');
            } 
        
    }

    public function ubah_password(Request $request, $id)
    {
        $users = User::find($id);
        if(Hash::check($request->old_password, $users->password)){
            User::where('id', '=', $id)
            ->update(['password' => Hash::make($request->new_password)]);
            echo "sukses";
        }else{
            echo "gagal";
        }
    }


}
