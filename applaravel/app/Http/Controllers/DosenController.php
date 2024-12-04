<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    
    public function insertDosen()
    {
        $query = DB::table('dosens')->insert([
            'nik' => '197809809889',
            'nama' => 'M Rasyid',
            'email' => 'rasyid@gmail.com',
            'no_telp' => '081268768',
            'prodi' => 'Manajemen Informatika',
            'alamat' => 'Jl. Rasuna Said no. 5 Padang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        dd($query);
    }

    public function insertBanyakDosen()
    {
        $query = DB::table('dosens')->insert([
            [
                'nik' => '198009809112',
                'nama' => 'M Yazid',
                'email' => 'yazid@gmail.com',
                'no_telp' => '081379979',
                'prodi' => 'TRL',
                'alamat' => 'Jl. Sutomo no. 1 Padang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '1982888678',
                'nama' => 'Deni',
                'email' => 'deni@gmail.com', 
                'no_telp' => '0812887888',
                'prodi' => 'TRL',
                'alamat' => 'Jl. M Hatta no. 15 Padang',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        dd($query);
    }

    public function updateDosen()
    {
        $query = DB::table('dosens')
        ->where('nama','Deni')
        ->update(
            [
                'no_telp'=>'081100001',
                'prodi'=>'Teknik Komputer',
                'updated_at'=>now(),
            ]
        );

        dd($query); 
    }

    public function updateWhereDosen()
    {
        $query = DB::table('dosens')
            ->where('nama', 'Deni')
            ->where('prodi', '<>', 'TRPL')
            ->update([
                'email' => 'deni@mi_ti.ac.id',
                'updated_at' => now(),
            ]);

        dd($query);
    }

    public function updateOrInsert()
    {
        $query = DB::table('dosens')->updateOrInsert(
            [
                'nik' => '197809280001',
            ],
            [
                'nama' => 'Steve Job',
                'email' => 'steve@gmail.com',
                'no_telp' => '08128874444',
                'prodi' => 'TRPL',
                'alamat' => 'Jl. M Hatta no. 1 Padang',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        dd($query);
    }
    public function deleteDosen()
    {
        $query = DB::table('dosens')
            ->where('nik', '197809280001')
            ->delete();
        
        dd($query);
    }

    public function get()
    {
        $query = DB::table('dosens')->get();
        
        dd($query);
    }

    public function getTampil()
    {
        $query = DB::table('dosens')->get();

        foreach ($query as $dosen) {
            echo $dosen->id . '<br />';
            echo $dosen->nik . '<br />';
            echo $dosen->nama . '<br />'; 
            echo $dosen->email . '<br />';
            echo $dosen->alamat . '<br />';
            echo '<hr>';
        }
    }

    public function getView()
    {
       $query = DB::table('dosens')->get();

       return view('akademik.dosen', ['dosens' => $query]);
    }

    public function getWhere()
    {
        $query = DB::table('dosens')
            ->where('prodi', '=', 'TRL')
            ->orderBy('nama', 'desc')
            ->get();
        
        return view('akademik.dosen', ['dosens' => $query]);
    }   

    public function selectDosen()
    {
        $query = DB::table('dosens')
        ->select('nik','nama as nama_dosen')
        ->get();

        dd($query);

    }

    public function take()
    {
        $query = DB::table('dosens')
            ->select('*')
            ->orderBy('nama', 'desc')
            ->limit(2)
            ->offset(1)
            ->get();

        return view('akademik.dosen', ['dosens' => $query]);
    }

    public function first()
    {
        $query = DB::table('dosens')
            ->where('nama', 'Deni')
            ->get();
        return view('akademik.dosen', ['dosens' => $query]);
    }
    
    public function find()
    {
        $query = DB::table('dosens')->find(2);
        return view('akademik.dosen', ['dosens' => [$query]]);
    }

    public function raw()
    {
        $query=DB::table('dosens')
          ->selectRaw('count(*) as total_dosen')
          ->get();

          echo $query[0]->total_dosen;
    }

}
