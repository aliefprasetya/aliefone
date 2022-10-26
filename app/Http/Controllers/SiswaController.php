<?php

namespace App\Http\Controllers;


use App\models\Siswa;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
     public function index()
    {
        $data = Siswa::all();
        return view('mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahsiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'mohon :attribute harus diisi terlebih dulu...',
            'min' => ':attribute minimal :min karakter ya',
            'max' => ':attribute maksimal :max karakter ya',
            'numeric' => ':attribute harus diisi angka ya!',
            'mimes' => 'file:attribute harus bertipe jpg,jpeg,png',
            'size' => 'file yang diupload maksimal :size'

        ];

        $this->validate($request,[
            'nama' => 'required|min:5',
            'nisn' => 'required|numeric',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        //Ambil informasi file yang diupload
        $file = $request->file('foto');

        //Rename + ambil Nama File
        $nama_file = time()."_".$file->getClientOriginalName();

        //Proses Upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //Proses Insert Database
        Siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'about' => $request->about,
            'foto' => $nama_file
        ]);

        return redirect('/mastersiswa');
        
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        return view('tampilkansiswa', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::find($id);
        return view('editsiswa', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'mohon :attribute harus diisi terlebih dulu...',
            'min' => ':attribute minimal :min karakter ya',
            'max' => ':attribute maksimal :max karakter ya',
            'numeric' => ':attribute harus diisi angka ya!',
            'mimes' => 'file:attribute harus bertipe jpg,jpeg,png',
            'size' => 'file yang diupload maksimal :size'

        ];

        $this->validate($request,[
            'nama' => 'required|min:5',
            'nisn' => 'required|numeric',
            'jk' => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required',
            'foto' => 'mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        if ($request->foto !=''){
            //Dengan Ganti Foto
            //Menghapus File Foto Lama
            $old=Siswa::find($id);
            file::delete('./template/img/'.$old->foto);
            
            //Ambil informasi file yang diupload
        $file = $request->file('foto');

        //Rename + ambil Nama File
        $nama_file = time()."_".$file->getClientOriginalName();

        //Proses Upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

            //Menyimpan ke Database
            $siswa=Siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->jk = $request->jk;
            $siswa->email = $request->email;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->foto = $nama_file;
            $siswa->save();
            return redirect ('mastersiswa');


        }else{
            //Tanpa Ganti Foto
            $siswa=Siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->jk = $request->jk;
            $siswa->email = $request->email;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->save();
            return redirect ('mastersiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function hapus($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect('mastersiswa');
    }

    
}
