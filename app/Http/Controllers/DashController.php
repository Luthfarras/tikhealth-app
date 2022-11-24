<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dt = new konsultasi($request->tinggi, $request->berat, $request->tahun);
        $data = [
            'nama' => $request->nama,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'bmi' => $dt->bmi(),
            'status' => $dt->sttb(),
            'hobi' => $request->hobi,
            'umur' => $dt->hitungUmur(),
            'konsul' => $dt->konsul(),
        ];
        return view('dashboard', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class hitung {
    public function __construct($tinggi, $berat, $tahun)
    {
        //inisialisasi parameter
        $this->tinggi = $tinggi / 100;
        $this->berat = $berat;
        $this->tahun = $tahun;
    }

    public function bmi()
    {
        // menghitung bmi
        return number_format($this->berat / ($this->tinggi * $this->tinggi), 2);
    }

    public function sttb()
    {
        //menentukan status berat badan berdasarkan bmi
        $rbmi = $this->bmi();
        if ($rbmi < 18.5) {
            return "Kurus";
        }elseif ($rbmi <= 22.9) {
            return "Normal";
        }elseif ($rbmi <= 30) {
            return "Gemuk";
        }else {
            return "Obesitas";
        }
    }

    public function hitungUmur()
    {
        //menghitung umur
        return 2022 - $this->tahun;
    }
}

class konsultasi extends hitung {
    public function stts()
    {
        $stts = $this->hitungUmur();
        if ($stts >= 17) {
            return "Dewasa";
        }else {
            return "Belum Dewasa";
        }
    }

    public function konsul()
    {
        if ($this->stts() == 'Dewasa' && $this->sttb() == 'Obesitas') {
            return "Anda bisa mendapatkan Konsultasi gratis.";
        }else {
            return "Anda belum bisa mendapatkan Konsultasi gratis.";
        }
    }
}