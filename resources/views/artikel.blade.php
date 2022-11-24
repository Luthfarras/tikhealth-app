@extends('template')
@section('main')
    <div class="container">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addart" style="border-radius: 50px;">
            Tambah +
          </button>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Foto</th>
                <th scope="col">Isi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Kategori</th>
                <th scope="col">Petugas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $artikel)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$artikel->judul}}</td>
                    <td><img src="{{asset('storage/' .$artikel->foto)}}" width="100px" alt="" srcset=""></td>
                    <td>{{$artikel->isi}}</td>
                    <td>{{$artikel->tanggal}}</td>
                    <td>{{$artikel->kategori->nama}}</td>
                    <td>{{$artikel->user->name}}</td>
                    <td>
                        <button class="btn btn-outline-warning" style="border-radius: 50px;" data-bs-toggle="modal" data-bs-target="#editart{{$artikel->id}}">Edit</button>
                        <a href="{{'delart/' .$artikel->id}}" class="btn btn-outline-danger" style="border-radius: 50px;">Hapus</a>
                    </td>
                </tr>
                {{-- Modal update artikel --}}
                <div class="modal fade" id="editart{{$artikel->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Artikel</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('artikel.update', $artikel->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="" class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="" value="{{$artikel->judul}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Foto</label>
                                    <input type="file" name="foto" class="form-control" id="" value="{{@old('foto')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Isi</label>
                                    <textarea name="isi" class="form-control" id="" cols="30" rows="10">{{$artikel->isi}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal Artikel</label>
                                    <input type="date" name="tanggal" class="form-control" id="" value="{{$artikel->tanggal}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kategori Artikel</label>
                                    <select name="kategori_id" class="form-control" id="">
                                        @foreach ($kategori as $k)
                                            <option value="{{$k->id}}" @if($artikel->kategori_id == $k->id) @selected($artikel->kategori_id == $k->id) @endif>{{$k->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Petugas</label>
                                    <input type="text" disabled value="{{Auth::user()->name}}" class="form-control" id="">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 50px;">Tutup</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                            <button type="submit" class="btn btn-outline-success" style="border-radius: 50px;">Ubah</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                @endforeach
            </tbody>
          </table>
    </div>
    {{-- Modal tambah data artikel --}}
    <div class="modal fade" id="addart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Artikel</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Isi</label>
                    <textarea name="isi" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Artikel</label>
                    <input type="date" name="tanggal" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Kategori Artikel</label>
                    <select name="kategori_id" class="form-control" id="">
                        @foreach ($kategori as $k)
                            <option value="{{$k->id}}">{{$k->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Petugas</label>
                    <input type="text" disabled value="{{Auth::user()->name}}" class="form-control" id="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 50px;">Tutup</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                <button type="submit" class="btn btn-outline-success" style="border-radius: 50px;">Simpan</button>
            </div>
        </form>
          </div>
        </div>
      </div>
@endsection
