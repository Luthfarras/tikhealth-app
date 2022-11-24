@extends('template')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('dashboard')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" name="nama" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tinggi Badan <sub>(.cm)</sub></label>
                                <input type="number" name="tinggi" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Berat Badan <sub>(.kg)</sub></label>
                                <input type="number" name="berat" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Hobi</label>
                                <input type="text" name="hobi" id="" class="form-control mb-2">
                                <input type="text" name="hobi2" id="" class="form-control mb-2">
                                <input type="text" name="hobi3" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tahun Lahir</label>
                                <input type="number" name="tahun" id="" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-outline-info" style="border-radius: 50px;">Cek</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($data)
                                <tr>
                                    <td>Nama</td>
                                    <td>{{$data['nama']}}</td>
                                </tr>
                                <tr>
                                    <td>Tinggi</td>
                                    <td>{{$data['tinggi']}}</td>
                                </tr>
                                <tr>
                                    <td>Berat</td>
                                    <td>{{$data['berat']}}</td>
                                </tr>
                                <tr>
                                    <td>BMI</td>
                                    <td>{{$data['bmi']}}</td>
                                </tr>
                                <tr>
                                    <td>Status Berat Badan</td>
                                    <td>{{$data['status']}}</td>
                                </tr>
                                <tr>
                                    <td>Hobi</td>
                                    <td>{{$data['hobi']}}</td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td>{{$data['umur']}}</td>
                                </tr>
                                <tr>
                                    <td>Konsultasi Gratis</td>
                                    <td>{{$data['konsul']}}</td>
                                </tr>
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection