@extends('template')

@section('main')
    <div class="container">
        <div class="row">
            @foreach ($data as $d)
            <div class="col-3">
                <div class="card mb-4" style="width: 18rem;">
                    <img src="{{asset('storage/' .$d->foto)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$d->judul}}</h5>
                        <p class="card-text text-secondary">by {{$d->user->name}}</p>
                        <p class="card-text"><sup>{{$d->tanggal}}</sup></p>
                        <p class="card-text">{{$d->isi}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
