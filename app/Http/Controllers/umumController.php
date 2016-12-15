<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class umumController extends Controller
{
    public function index(){
    	return view('index');
    }
    public function agenda(){
        $agenda=DB::select('call lihatAgenda()');
    	return view('agenda', ['agenda'=>$agenda]);
    }
    public function reservasi(){
        $ruangan = DB::select('select * from ruangan');
        $peminjaman = DB::select('SELECT dp.nama_kegiatan, dp.nama_ruangan, wk.tanggal_kegiatan, wk.waktu_mulai_kegiatan, wk.waktu_selesai_kegiatan FROM daftar_permohonan dp, waktu_kegiatan wk WHERE dp.kode_permohonan = wk.kode_permohonan ORDER BY wk.tanggal_kegiatan ASC;');
    	return view('jadwal', ['ruangan'=>$ruangan, 'peminjaman'=>$peminjaman]);
    }
    public function dosen(){
        $listDosen = DB::select('select nama_dosen from dosen');
    	return view('lihatdosen', ['listDosen'=>$listDosen]);
    }
    public function pinjam(){
    	$ruangan=DB::select('select * from ruangan');
    	$rutinitas=DB::select('select * from rutinitas');
    	return view('formpinjam', ['ruangan'=>$ruangan,'rutinitas'=>$rutinitas]);
    }
    public function isiPinjam(Request $request){
    	DB::select('call isiPemohon(?,?,?)', array($request['nama'], $request['telp'], $request['email']));
        $pengisian = DB::select('call isiPermohonan(?,?,?, ?,?,?, ?,?,?)', array($request['nama'],$request['keg'], $request['tglmulai'], $request['wktmulai'], $request['wktselesai'], $request['badan'], $request['ruang'], $request['rutin'], $request['kali']));
        if($pengisian[0]->pesan==1){
            session::flash('msg', 'Permohonan telah diterima tunggu persetujuan dari bagian tata usaha. Kode permohonan anda '.$pengisian[0]->Kode_Pemesanan);
            return redirect()->back();
        }else{
            session::flash('msg', 'Permohonan tidak dapat diterima karena pada saat bersamaan telah ada kegiatan lain');
            return redirect()->back();
        }
    }
    function data($kunci){
        $data = DB::select('call getListDosen(?)', array($kunci));
        return response()->json(['dataDosen'=>$data]);
    }
    function data2($kunci){
        $data = DB::select('SELECT * FROM kegiatan_rutin WHERE nidn_dosen = (SELECT nidn_dosen FROM dosen WHERE nidn_dosen =? OR nama_dosen=?) ORDER BY hari_angka_rutin ASC, waktu_rutin ASC;', array($kunci, $kunci));
        return response()->json(['rutindosen'=>$data]);
    }
    function cekRuangan($ruangan, $tanggal){
        $kegiatan = DB::select('call lihatKegiatan(?,?)', array($ruangan, $tanggal));
        return response()->json(['kegiatan'=>$kegiatan]);
    }
    function feed($ruang){
        $now = DB::select('call lihatKegiatanSekarang(?)', array($ruang));
        $next = DB::select('call lihatKegiatanBerikut(?)', array($ruang));
        return view('feed', ['now'=>$now, 'next'=>$next, 'ruang'=>$ruang]);
    }
    function feeding($ruang){
        $now = DB::select('call lihatKegiatanSekarang(?)', array($ruang));
        $next = DB::select('call lihatKegiatanBerikut(?)', array($ruang));
        return response()->json(['now'=>$now, 'next'=>$next, 'ruang'=>$ruang]);
    }
}