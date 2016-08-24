<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class adminController extends Controller
{
    public function index(){
        $jumlah = DB::select('select count(*) as "jumlah" from daftar_permohonan where status_permohonan="Diproses"');
    	return view('indexadmin', ['jumlah'=>$jumlah]);
    }
    public function accRuangan(){
    	$listPermohonan = DB::select('select * from daftar_permohonan where status_permohonan = "Diproses" order by tanggal_masuk_permohonan ASC');
    	return view('accruangan', ['listPermohonan'=>$listPermohonan]);
    }
    public function agenda(Request $Request){
    	return view('postagenda');
    }
    public function isiAgenda(Request $Request){
    	$isi = $Request['isi'];
    	$admin = $Request->session()->get('username_admin');
    	$mulai = $Request['mulai'];
    	$selesai = $Request['selesai'];
    	DB::select('call isiAgenda(?,?,?,?)', array($isi, $mulai, $admin, $selesai));
    	return view('postagenda');
    }
    public function acc(Request $request){
        $pesan = DB::select('call setujuiPermohonan(?,?)', array($request['kode_permohonan'], $request->session()->get('username_admin')));
        if($pesan[0]->status==1)
        return redirect()->back();
        else{
            session::flash('msg', $pesan[0]->pesan);
            return redirect()->back();
        }
    }
    public function del(request $request){
        $pesan = DB::select('call tolakPermohonan(?,?)', array($request->session()->get('username_admin'), $request['kode_permohonan']));
        return redirect()->back();
    }
    public function listagenda(){
        $lists=DB::select('select * from agenda where tanggal_mulai_agenda > now() order by tanggal_mulai_agenda');
        return view('listagenda', ['lists'=>$lists]);
    }
    public function editagenda($time){
        $data=DB::select('select * from agenda where timestamp_agenda=?',array($time));
        return view('editagenda', ['data'=>$data]);
    }
    public function ubah(Request $request, $time){
        DB::select('delete from agenda where timestamp_agenda=?', array($time));
        DB::select('call isiAgenda(?,?,?,?)', array($request->isi,$request->mulai,$request->session()->get('username_admin'), $request->selesai));
        return redirect('admin/listagenda');
    }
    public function hapus($time){
        DB::select('delete from agenda where timestamp_agenda=?', array($time));
        return redirect('admin/listagenda');
    }
    public function tambahdosen(){
        return view('tambahdosen');
    }
    public function add(Request $request){
        DB::select('call tambahDosen(?,?,?,?)', array($request['nama'],$request['nidn'],$request['pass'],$request->session()->get('username_admin')));
        return redirect()->back();
    }
    public function editpeminjaman(){
        $peminjaman=DB::select('SELECT * FROM daftar_permohonan WHERE status_permohonan="Disetujui" AND kode_permohonan IN (SELECT kode_permohonan FROM waktu_kegiatan WHERE tanggal_kegiatan >= CURDATE()) ORDER BY tanggal_mulai_permohonan_peminjaman ASC');
        return view('pinjamacc', ['peminjaman'=>$peminjaman]);
    }
    public function halamaneditpinjam($kodepeminjaman){
        $datapinjam = DB::select('select * from daftar_permohonan where kode_permohonan=?', array($kodepeminjaman));
        $ruangan=DB::select('select * from ruangan');
        $rutinitas=DB::select('select * from rutinitas');
        $pemohon=DB::select('select * from pemohon where nama_pemohon=?', array($datapinjam[0]->nama_pemohon_peminjaman));
        return view('formeditpinjam', ['data'=>$datapinjam, 'ruangan'=>$ruangan, 'rutinitas'=>$rutinitas, 'pemohon'=>$pemohon]);
    }
    public function updatepeminjaman(Request $request){
        $update = DB::select('call updatePeminjaman(?,?,?,?,?, ?,?,?,?)', array($request->session()->get('username_admin'), $request['kode_peminjaman'],$request['keg'],$request['tglmulai'],$request['wktmulai'],$request['wktselesai'],$request['ruang'],$request['rutin'],$request['kali']));
        if($update[0]->pesan==1){
            session::flash('edit', 'Pengubahan peminjaman berhasil dilakukan.');
        }else{
            session::flash('edit', 'Pengubahan peminjaman gagal dilakukan.');
        }
        return redirect('/admin/editpeminjaman');
    }
    public function hapuspeminjaman(Request $request){
        DB::select('call hapusPeminjaman(?,?)', array($request->kode_permohonan, $request->session()->get('username_admin')));
        return redirect()->back();
    }
    public function setting(){
        return view('setelan');
    }
    public function tambahruang(Request $request){
        $pesan = DB::select('call tambahRuangan(?)', array($request['ruangan']));
        if($pesan[0]->pesan==1){
            session::flash('ruang_ok', 'Ruangan telah ditambahkan');
            return redirect()->back();
        }else{
            session::flash('ruang_ko', 'Ruangan sudah ada');
            return redirect()->back();
        }
    }
    public function tambahinterval(Request $request){
        $pesan = DB::select('call tambahRutinitas(?,?,?)', array($request['interval'],$request['keterangan'],$request->session()->get('username_admin')));
        session::flash('interval_ok', 'Interval telah ditambahkan');
        return redirect()->back();
    }
    public function gantipassword(Request $request){
        $pesan = DB::select('call gantiPasswordAdmin(?,?,?)', array($request['passwordlama'], $request['passwordbaru1'], $request->session()->get('username_admin')));
        session::flash('hasil', $pesan[0]->message);
        return redirect()->back();
    }
}