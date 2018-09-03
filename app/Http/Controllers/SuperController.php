<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Pemilik;
use App\Jabatan;
use App\Pegawai;
use App\Kecamatan;
use App\Ikm;
use App\Dataizin;
use Auth;
use DB;
use Image;
use Validator;
use Storage;
use PDF;

class SuperController extends Controller
{

    public function index()
    {
        return view('super.index');
    }

    public function rekapdata()
    {
        $i=1;
        $kecamatans = Kecamatan::all();
        $ikms = Ikm::all();
        return view('super.rekapdata', compact('kecamatans','i','ikms'));
    }


// crud pegawai
    public function pegawai()
    {
        $i=1;
        $pegawais = Pegawai::all();
        return view('super.pegawai.index', compact('pegawais','i'));
    }
    public function createpegawai()
    {
        $users = new User();
        $jabatan = Jabatan::all()->pluck('namajabatan', 'id');
        $pegawais = new Pegawai();
        
        return view('super.pegawai.create', compact('pegawais', 'users', 'jabatan'));
    }
    public function storepegawai(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'nip'=>'Required',
            'jnsklmn'=>'Required',
            'tlpn'=>'Required',
            'img' => 'image',
            'alamatt'=>'Required',

            'jabatan_id'=>'Required',
            
            'name'=>'Required',
            'email'=>'Required',
            'password'=>'Required',
            'status'=>'Required'
        ]);
        
        // input user
        $user = new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$user->password=$request->input('password')!=''?bcrypt($request->input('password')):'';
        $user->status=$request->input('status');
        $user->save();

        // input pegawai

        $pegawai = new Pegawai();
        $pegawai->nip=$request->input('nip');
        $pegawai->jnsklmn=$request->input('jnsklmn');
        $pegawai->tlpn=$request->input('tlpn');
        $pegawai->alamatt=$request->input('alamatt');

        if($request->hasFile('img')){
            $image=$request->file('img');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $location='photos/'.$imageName;
            Image::make($image)->save($location);
            $pegawai->image=$imageName;
        }
        
        $pegawai->user_id=$user->id;
        $pegawai->jabatan_id=$request->input('jabatan_id');
        $pegawai->save();
        return redirect()->route('pegawai');
    }

    public function detailpegawai($id)
    {
        $pegawais = Pegawai::find($id);
        return view('super.pegawai.detail', compact('pegawais'));
    }
    public function editpegawai($id)
    {
        $user=User::find($id);
        $pegawais = Pegawai::find($id);
        $jabatan = Jabatan::all()->pluck('namajabatan', 'id');
        return view('super.pegawai.edit', compact('pegawais', 'user', 'jabatan'));
    }
    public function updatepegawai(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'nip'=>'Required',
            'jnsklmn'=>'Required',
            'tlpn'=>'Required',
            'img' => 'image',
            'alamatt' => 'Required',

            'jabatan_id'=>'Required',
            
            'name'=>'Required',
            'email'=>'Required',
            'password'=>'Required',
            'status'=>'Required'
        ]);

         $pegawai = Pegawai::find($id);
         $pegawai->alamatt=$request->input('alamatt');
         if($request->hasFile('img')){
            $image=$request->file('img');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $location='photos/'.$imageName;
            Image::make($image)->save($location);
            $oldPhoto=$pegawai->image;

            $pegawai->image=$imageName;
            Storage::delete($oldPhoto);
         }

         $pegawaiUpdate = $request->only([
            'nip', 
            'jnsklmn',
            'tlpn', 
            'jabatan_id']);
         $pegawai->update($pegawaiUpdate);

         $user = Pegawai::find($id)->user;
         $userUpdate = $request->only(['name', 'email', 'status', 'password']);
         $userUpdate['password'] = $request->input('password')!=''?bcrypt($request->input('password')):'';
         $user->update($userUpdate);
        return redirect(url('pegawaii'));
    }
    public function destroypegawai($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return redirect('pegawaii');
    }


// crud pemilik
    public function pemilik()
    {
        $pemiliks = Pemilik::all();
        return view('super.pemilik.index', compact('pemiliks'));
    }
    public function createpemilik()
    {
        return view('super.pemilik.create', compact('pemiliks'));
    }
    public function storepemilik(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'no_ktp'=>'Required',
            'nama'=>'Required',
            'alamat'=>'Required',
            'jenkel'=>'Required'
        ]);
        $pemilik = new Pemilik();
        $pemilik->no_ktp=$request->input('no_ktp');
        $pemilik->nama=$request->input('nama');
        $pemilik->alamat=$request->input('alamat');
        $pemilik->jenkel=$request->input('jenkel');
        $pemilik->save();
        return redirect('pemilik');   
    }

    public function editpemilik($id)
    {
        $edit = Pemilik::where('id', $id)->first();
        return view('super.pemilik.edit', compact('edit'));
    }
    public function updatepemilik(Request $request, $id)
    {
        $pemilik = Pemilik::where('id', $id)->first();
        $pemilik->no_ktp = $request->input('no_ktp');
        $pemilik->nama = $request->input('nama');
        $pemilik->alamat = $request->input('alamat');
        $pemilik->jenkel = $request->input('jenkel');
        $pemilik->update();
        return redirect('pemilik');
    }

    public function destroypemilik($id)
    {
        $pemilik = Pemilik::find($id)->delete();
        return redirect('pemilik');
    }



// crud jabatan
    public function jabatan()
    {
        $i=1;
        $jabatans = Jabatan::all();
        return view('super.jabatan.index', compact('jabatans', 'i'));
    }
    public function createjabatan()
    {
        return view('super.jabatan.create', compact('jabatans'));
    }
     public function storejabatan(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'namajabatan'=>'Required'
        ]);

        $jabatan = new Jabatan();
        $jabatan->namajabatan=$request->input('namajabatan');
        $jabatan->save();
        return redirect('jabatan');
    }
    public function editjabatan($id)
    {
        $edit = Jabatan::where('id', $id)->first();
        return view('super.jabatan.edit', compact('edit'));
    }

    public function updatejabatan(Request $request, $id)
    {
        $jabatan = Jabatan::where('id', $id)->first();
        $jabatan->namajabatan = $request->input('namajabatan');
        $jabatan->update();

        return redirect('jabatan');
    }

    public function destroyjabatan($id)
    {
        $jabatan = Jabatan::find($id)->delete();
        return redirect('jabatan');
    }


// crud kecamatan
    public function kecamatan()
    {
        $i=1;
        $kecamatans = Kecamatan::all();
        return view('super.kecamatan.index', compact('kecamatans', 'i'));
    }
    public function createkecamatan()
    {
        return view('super.kecamatan.create', compact('kecamatans'));
    }
    
    public function storekecamatan(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'file' => 'size:5000000'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors('Field Tidak Boleh Kosong')->withInput();
        }
        $kecamatan = new Kecamatan();
        $kecamatan->nama=$request->input('nama');
        // $kecamatan->status = 0 ;
        if($request->file('nama_file') == '')
        {
            $kecamatan->nama_file = 'default-thumbnail.jpg';
        } 
        else
        {
            $file  = $request->file('nama_file');
            $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
            $extension = $file->getClientOriginalExtension();
            $fileName   = $nameonly.'_'.'.'.$extension;
            $request->file('nama_file')->move("file/", $fileName);
            $kecamatan->nama_file = $fileName;
        }
        $kecamatan->save();
        return redirect('kecamatan');

    }
    public function editkecamatan($id)
    {
        $edit = Kecamatan::where('id', $id)->first();
        return view('super.kecamatan.edit', compact('edit'));
    }


    public function updatekecamatan(Request $request, $id)
    {
        $kecamatan = kecamatan::where('id', $id)->first();
        $kecamatan->nama = $request->input('nama');
        if($request->file('nama_file') == '')
        {
            $kecamatan->nama_file = $kecamatan->nama_file ;
        } 
        else
        {
            $file  = $request->file('nama_file');
            $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
            $extension = $file->getClientOriginalExtension();
            $fileName   = $nameonly.'_'.'.'.$extension;
            $request->file('nama_file')->move("file/", $fileName);
            $kecamatan->nama_file = $fileName;
        }
        $kecamatan->update();
        return redirect('kecamatan');
    }

    public function destroykecamatan($id)
    {
        $kecamatan = Kecamatan::find($id)->delete();
        return redirect('kecamatan');
    }


// crud ikm..
    public function ikm()
    {
        $i=1;
        $ikms = Ikm::all();
        return view('super.ikm.index', compact('ikms','i'));
    }

    public function createikm()
    {
        $ikms = new Ikm();
        $kecamatan = Kecamatan::all()->pluck('nama', 'id');
        $pemilik = Pemilik::all()->pluck('nama', 'id');
        
        return view('super.ikm.create', compact('ikms', 'pemilik', 'kecamatan'));
    }
    public function storeikm(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'namaikm'=>'Required',
            'desa'=>'Required',
            'rtrw'=>'Required',
            'no_tdp' => 'Required',
            'telp'=>'Required',

            'pemilik_id'=>'Required',
            'kecamatan_id'=>'Required',
            
            'jenisush'=>'Required',
            'jenisind'=>'Required',
            'bahanbaku'=>'Required',
            'statuss'=>'Required',
            'tkl'=>'Required',
            'tkp'=>'Required'
        ]);

        // input ikm

        $ikm = new Ikm();
        $ikm->no_tdp=$request->input('no_tdp');
        $ikm->namaikm=$request->input('namaikm');
        $ikm->desa=$request->input('desa');
        $ikm->rtrw=$request->input('rtrw');
        $ikm->telp=$request->input('telp');
        $ikm->jenisush=$request->input('jenisush');
        $ikm->jenisind=$request->input('jenisind');
        $ikm->bahanbaku=$request->input('bahanbaku');
        $ikm->tkl=$request->input('tkl');
        $ikm->tkp=$request->input('tkp');
        $ikm->statuss=$request->input('statuss');
        $ikm->pemilik_id=$request->input('pemilik_id');
        $ikm->kecamatan_id=$request->input('kecamatan_id');
        $ikm->total = $ikm->tkl + $ikm->tkp ;

        $ikm->save();
        return redirect()->route('ikm');
    }

    public function detailikm($id)
    {
        $ikms = Ikm::find($id);
        return view('super.ikm.detail', compact('ikms'));
    }

    public function editikm($id)
    {
        $ikms = Ikm::find($id);
        $pemilik = Pemilik::all()->pluck('nama', 'id');
        $kecamatan = Kecamatan::all()->pluck('nama', 'id');
        return view('super.ikm.edit', compact('ikms', 'kecamatan', 'pemilik'));
    }

    public function updateikm(Request $request, $id)
    {
        $ikm = Ikm::where('id', $id)->first();
        $ikm->no_tdp=$request->input('no_tdp');
        $ikm->namaikm=$request->input('namaikm');
        $ikm->desa=$request->input('desa');
        $ikm->rtrw=$request->input('rtrw');
        $ikm->telp=$request->input('telp');
        $ikm->jenisush=$request->input('jenisush');
        $ikm->jenisind=$request->input('jenisind');
        $ikm->bahanbaku=$request->input('bahanbaku');
        $ikm->tkl=$request->input('tkl');
        $ikm->tkp=$request->input('tkp');
        $ikm->statuss=$request->input('statuss');
        $ikm->pemilik_id=$request->input('pemilik_id');
        $ikm->kecamatan_id=$request->input('kecamatan_id');
        $ikm->total = $ikm->tkl + $ikm->tkp ;
        $ikm->update();
        return redirect('ikm');
    }
    public function destroyikm($id)
    {
        $ikm = Ikm::find($id);
        $ikm->delete();
        return redirect('ikm');
    }

    public function printikm(){
        $i=1;
        $ikms = Ikm::all();
        return view('super.ikm.print', compact('ikms', 'i'));
    }

    public function verifikasi(){
        $i=1;
        $ikms = Ikm::all();
        return view('super.verifikasi.index', compact('ikms', 'i'));
    }


    public function laporan()
    {
        $i=1;
        $ikms = Ikm::all();
        return view('super.laporan.index', compact('ikms', 'i'));
    }

    public function pdf2(Request $request)
    {
        $ikms = Ikm::with('pemilik')->whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])->get();

        $total = Ikm::with('pemilik')->whereBetween('created_at', [$request->tgl_awal, $request->tgl_akhir])->sum('total');
        // dd($penjualans);
        $pdf =  PDF::loadView('pdf2', ['ikms' => $ikms, 'total'=> $total]);
        return $pdf->download('laporan1.pdf');
    }







     public function dataizin()
    {
        $i=1;
        $dataizins = Dataizin::all();
        return view('super.dataizin.index', compact('dataizins','i'));
    }

    public function createdataizin()
    {
        $dataizins = new Ikm();
        $ikm = Ikm::all()->pluck('namaikm', 'id');
        
        return view('super.dataizin.create', compact('dataizins', 'ikm'));
    }
    public function storedataizin(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'img' => 'image',
            'ikm_id'=>'Required'
        ]);

        // input dataizin ikm

        $dataizin = new Dataizin();
        if($request->hasFile('img')){
            $image=$request->file('img');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $location='photos/'.$imageName;
            Image::make($image)->save($location);
            $dataizin->image=$imageName;
        }
        $dataizin->ikm_id=$request->input('ikm_id');

        $dataizin->save();
        return redirect()->route('dataizin');
    }

    public function detaildataizin($id)
    {
        $dataizins = Dataizin::find($id);

        return view('super.dataizin.detail', compact('dataizins', 'u'));
    }

    public function editdataizin($id)
    {
        $dataizins = Dataizin::find($id);
        $ikm = Ikm::all()->pluck('namaikm', 'id');
        return view('super.dataizin.edit', compact('dataizins', 'ikm'));
    }

    public function updatedataizin(Request $request, $id)
    {
        $dataizin = Dataizin::where('id', $id)->first();
        $dataizin->ikm_id=$request->input('ikm_id');
        if($request->hasFile('img')){
            $image=$request->file('img');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $location='photos/'.$imageName;
            Image::make($image)->save($location);
            $oldPhoto=$dataizin->image;

            $dataizin->image=$imageName;
            Storage::delete($oldPhoto);
         }
        $dataizin->update();
        return redirect('dataizin');
    }

    public function destroydataizin($id)
    {
        $dataizin = Dataizin::find($id);
        $dataizin->delete();
        return redirect('dataizin');
    }


}