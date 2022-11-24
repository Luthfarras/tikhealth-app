@extends('template')
@section('main')
    <div class="container">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addkat" style="border-radius: 50px;">
            Tambah +
          </button>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $kategori)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$kategori->nama}}</td>
                    <td>
                        <button class="btn btn-outline-warning" style="border-radius: 50px;" data-bs-toggle="modal" data-bs-target="#editkat{{$kategori->id}}">Edit</button>
                        <a href="{{'delkat/' .$kategori->id}}" class="btn btn-outline-danger" style="border-radius: 50px;">Hapus</a>
                    </td>
                </tr>
                {{-- Modal update kategori --}}
                <div class="modal fade" id="editkat{{$kategori->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('kategori.update', $kategori->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="" value="{{$kategori->nama}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 50px;">Tutup</button>
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
    {{-- Modal tambah data kategori --}}
    <div class="modal fade" id="addkat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 50px;">Tutup</button>
                <button type="submit" class="btn btn-outline-success" style="border-radius: 50px;">Simpan</button>
            </div>
        </form>
          </div>
        </div>
      </div>
@endsection