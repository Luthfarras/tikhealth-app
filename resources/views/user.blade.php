@extends('template')
@section('main')
    <div class="container">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#adduser" style="border-radius: 50px;">
            Tambah +
          </button>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <button class="btn btn-outline-warning" style="border-radius: 50px;" data-bs-toggle="modal" data-bs-target="#edituser{{$user->id}}">Edit</button>
                        <a href="{{'deluser/' .$user->id}}" class="btn btn-outline-danger" style="border-radius: 50px;">Hapus</a>
                    </td>
                </tr>
                {{-- Modal update user --}}
                <div class="modal fade" id="edituser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit user</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('user.update', $user->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="" value="{{$user->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="" value="{{$user->email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="">
                                    <p class="text-danger">*Kosongi jika tidak ingin mengganti password.</p>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Role</label>
                                    <select name="role" class="form-control" id="">
                                        <option value="admin" @if($user->role == 'admin') @selected($user->role == 'admin') @endif>Admin</option>
                                        <option value="editor" @if($user->role == 'editor') @selected($user->role == 'editor') @endif>Editor</option>
                                    </select>
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
    {{-- Modal tambah data user --}}
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    <select name="role" class="form-control" id="">
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                    </select>
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
