<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller {

    // public function index()
    // {
    //     $arrMhs = ['Bill gates', 'Steve jobs', 'Mark zuckerberg', 'Evan spiegal', 'Jack ma', 'Larry page',];
    //     return view('akademik.mahasiswa', ['mhs' => $arrMhs]);
    // }

    // public function show()
    // {
    //     $nama = 'bill gates';
    //     $nim = '23010202';
    //     $total_nilai = [80,40,90,70];
    //     return view('akademik.nilai_mahasiswa')->with(compact('nama','nim','total_nilai'));
    // }

    // public function insertSql()
    // {
    //     try {
    //         $result = DB::insert("INSERT INTO mahasiswa(nim, nama_lengkap, tempat_lahir, 
    //             tgl_lahir, email, prodi, alamat, created_at, updated_at) VALUES 
    //             ('23231', 'Dini', 'Padang', '2004-12-10', 
    //             'dini@gmail.com', 'TK', 'Jl. Cendana no.10 Padang', now(), now())");
            
    //         if($result) {
    //             return 'Data berhasil disimpan';
    //         }
    //         return 'Gagal menyimpan data';
    //     } catch (\Exception $e) {
    //         return 'Error: ' . $e->getMessage();
    //     }
    // }

    // public function insertPrepared()
    // {
    //     try {
    //         $result = DB::insert("INSERT INTO mahasiswa(nim, nama_lengkap, tempat_lahir, 
    //             tgl_lahir, email, prodi, alamat, created_at, updated_at) VALUES 
    //             (?, ?, ?, ?, ?, ?, ?, ?, ?)", 
    //             [ '23232','Taylor Otwell','Limau Manis','1971-06-12','taylor@laravel.com','MI', 
    //              'Jl. M Hatta no.1 Padang', now(),  now()] );
    //         if($result) {
    //             return 'Data berhasil disimpan';
    //         }
    //         return 'Gagal menyimpan data';
    //     } catch (\Exception $e) {
    //         return 'Error: ' . $e->getMessage();
    //     }
    // }

    // public function insertBinding()
    // {
    //     try {
    //         $query = DB::insert("INSERT INTO mahasiswa(nim,nama_lengkap,tempat_lahir,
    //             tgl_lahir,email,prodi,alamat,created_at,updated_at) VALUES (:nim,
    //             :nama_lengkap,:tempat_lahir,:tgl_lahir,:email,:prodi,:alamat,:created_at,
    //             :updated_at)",
    //             [
    //                 'nim' => '202209009',
    //                 'nama_lengkap' => 'Bill Gates',
    //                 'tempat_lahir' => 'Payakumbuh',
    //                 'tgl_lahir' => '1963-05-1',
    //                 'email' => 'bill@microsoft.com',
    //                 'prodi' => 'MI',
    //                 'alamat' => 'Jl. M Yamin no.1 Padang',
    //                 'created_at' => now(),
    //                 'updated_at' => now()
    //             ]);

    //         if($query) {
    //             return 'Data berhasil disimpan';
    //         }
    //         return 'Gagal menyimpan data';
    //     } catch (\Exception $e) {
    //         return 'Error: ' . $e->getMessage();
    //     }
    // }

    // public function update()
    // {
    //     try {
    //         $query = DB::update("UPDATE mahasiswa SET tempat_lahir = 'Seattle' WHERE nama_lengkap=?", ['Bill Gates']);
            
    //         if($query) {
    //             return 'Data berhasil diupdate';
    //         }
    //         return 'Gagal mengupdate data';
    //     } catch (\Exception $e) {
    //         return 'Error: ' . $e->getMessage();
    //     }
    // }

    // public function delete()
    // {
    //     try {
    //         $query = DB::delete("DELETE FROM mahasiswa WHERE nama_lengkap=?", ['Bill Gates']);
            
    //         if($query) {
    //             return 'Data berhasil dihapus';
    //         }
    //         return 'Gagal menghapus data';
    //     } catch (\Exception $e) {
    //         return 'Error: ' . $e->getMessage();
    //     }
    // }

    // public function select()
    // {
    //     $query = DB::select("SELECT * FROM mahasiswa");
    //     dd($query);
    // }

    // public function selectTampil()
    // {
    //     $query = DB::select("SELECT * FROM mahasiswa");
    //     echo ($query[0]->id) . "<br />";
    //     echo ($query[0]->nim) . "<br />";
    //     echo ($query[0]->nama_lengkap) . "<br />";
    //     echo ($query[0]->alamat);
    // }

    // public function selectView()
    // {
    //     $query = DB::select("SELECT * FROM mahasiswa");
    //     echo 'select berhasil';
    //     return view('akademik.mahasiswa', ['mahasiswas' => $query]);
    // }

    // public function selectWhere()
    // {
    //     $query = DB::select("SELECT * FROM mahasiswa WHERE prodi=? ORDER BY nim 
    //     ASC", ['MI']);
    //     return view('akademik.mahasiswa', ['mahasiswas' => $query]);
    // }

    public function cekObjek()
    {
        $mahasiswa=new Mahasiswa();
        dd($mahasiswa);
    }

    public function insert()
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = '20210298';
        $mahasiswa->nama_lengkap = 'Steve Job';
        $mahasiswa->tempat_lahir = 'Solok';
        $mahasiswa->tgl_lahir = '1970-09-05';
        $mahasiswa->email = 'steve@apple.com';
        $mahasiswa->prodi = 'TRPL';
        $mahasiswa->alamat = 'Jl. Luhur no.11 Solok';
        $mahasiswa->save();
        
        dd($mahasiswa);
    }

    public function massAssignment()
    {
        $mahasiswa = Mahasiswa::create([
            'nim' => '202007890',
            'nama_lengkap' => 'M. Yazid',
            'tempat_lahir' => 'Padang',
            'tgl_lahir' => '2011-07-03',
            'email' => 'yazid@gmail.com',
            'prodi' => 'MI',
            'alamat' => 'Padang',
        ]);
        dump($mahasiswa);

        $mahasiswa1 = Mahasiswa::create([
            'nim' => '202007891',
            'nama_lengkap' => 'M. Rasyid',
            'tempat_lahir' => 'Padang',
            'tgl_lahir' => '2015-05-12',
            'email' => 'rasyid@gmail.com',
            'prodi' => 'TRPL',
            'alamat' => 'Padang',
        ]);
        dump($mahasiswa1);
    }

    public function update()
    {
        $mahasiswa = Mahasiswa::find(2);
        $mahasiswa->tempat_lahir = 'California';
        $mahasiswa->prodi='Tekom';
        $mahasiswa->save();

        dd($mahasiswa);
      
    }

    public function updateWhere()
    {
        $mahasiswa = Mahasiswa::where('nim','202007890')->first();
        $mahasiswa->alamat='Koto Lalang Kec. Lubuk Kilangan Padang';
        $mahasiswa->save();

        dd($mahasiswa);
    }

    public function massUpdate()
    {
        $mahasiswa = Mahasiswa::where('nim', '202007890')->first()->update([
            'tempat_lahir' => 'Payakumbuh',
            'prodi' => 'Teknik Komputer'
        ]);
        
        dd($mahasiswa);
    }

    public function delete()
    {
        $mahasiswa = Mahasiswa::find(4);
        if($mahasiswa) {
            $mahasiswa->delete();
            return "Data berhasil dihapus";
        }
        return "Data tidak ditemukan";
    }

    public function destroy()
    {
        $mahasiswa=Mahasiswa::destroy(4);
        
        dd($mahasiswa);
    }

    public function massDelete()
    {
        $mahasiswa=Mahasiswa::where('prodi','Teknik Komputer')->delete();
        
        dd($mahasiswa);
    }

    public function all()
    {
        $mahasiswa=Mahasiswa::all();
        foreach ($mahasiswa as $mhs) {
            echo $mhs->id . '<br>';
            echo $mhs->nim . '<br>';
            echo $mhs->nama_lengkap . '<br>';
            echo $mhs->tempat_lahir . '<br>';
            echo $mhs->alamat;
            echo '<hr>';
        }
        //dd($mahasiswa);
    }

    public function allView()
    {
        $mahasiswas=Mahasiswa::all();
        return view('akademik.mahasiswa',['mahasiswas'=>$mahasiswas]);
    }

    public function getWhere()
    {
        $mahasiswas=Mahasiswa::where('prodi','TRPL')
            ->orderBy('nama_lengkap','asc')
            ->get();
        return view('akademik.mahasiswa',['mahasiswas'=>$mahasiswas]);
    }

    public function first()
    {
        $mahasiswas=Mahasiswa::where('prodi','TRPL')->first();
        return view('akademik.mahasiswa',['mahasiswas'=>[$mahasiswas]]);
    }

    public function find()
    {
        $mahasiswas=Mahasiswa::find(2);
        return view('akademik.mahasiswa',['mahasiswas'=>[$mahasiswas]]);
    }

    public function latest()
    {
        $mahasiswas=Mahasiswa::latest()->get();
        return view('akademik.mahasiswa',['mahasiswas'=>$mahasiswas]);
    }

    public function limit()
    {
        $mahasiswas=Mahasiswa::latest()->limit(2)->get();
        return view('akademik.mahasiswa',['mahasiswas'=>$mahasiswas]);
    }

    public function skipTake()
    {
        $mahasiswas=Mahasiswa::orderBy('id')->skip(1)->take(2)->get();
        return view('akademik.mahasiswa',['mahasiswas'=>$mahasiswas]);
    }

    public function softDelete()
    {
        $mahasiswa = Mahasiswa::where('id', '3')->delete();
        return 'Data berhasil dihapus';
    }

    public function withTrashed()
    {
        $mahasiswas = Mahasiswa::withTrashed()->get();
        return view('akademik.mahasiswa', ['mahasiswas' => $mahasiswas]);
    }

    public function restore()
    {
        Mahasiswa::withTrashed()->where('id','3')->restore();
        return 'Berhasil di restore';
    }

    public function forceDelete()
    {
        Mahasiswa::where('id','3')->forceDelete();
        return 'Data berhasil dihapus secara permanen';
    }

}

