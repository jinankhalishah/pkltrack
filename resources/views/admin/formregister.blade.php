@extends('admin.layout')
@section('content')

<div class="content-wrapper">
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">FORM REGISTER</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


              @if ($errors->any())
              <ul style="color: red;">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach ($errors->all() as $error)
              </ul>
              @endif

              <form action="{{ route('prosesregister') }}" method="POST">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"  placeholder="Input Email">
                  </div>
                  <div class="form-group">
                    <label>No Handphone</label>
                    <input type="text" class="form-control" name="no_hp"  placeholder="Input No HP">
                  </div>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="username"  placeholder="Input Name">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password"  placeholder="Input Password" required>
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation"  placeholder="Konfirmasi Password" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Admin</h3>
              </div>
              @if(session('succes'))
              <p style="color: green;">{{session('succes')}}</p>
            @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>Id</th>
                          <th>Email</th>
                          <th>No Handphone</th>
                          <th>Nama Lengkap</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                  <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td style="">{{ $admin -> id }}</td>
                        <td style="">{{ $admin -> email }}</td>
                        <td style="">{{ $admin -> no_hp }}</td>
                        <td style="">{{ $admin -> username }}</td>
                        <td>
                            <a href="{{ route('adminedit', $admin->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            <form action="{{route('admindelete',$admin->id)}}" method="post"
                              style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-primary btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Hapus</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                 {{-- </tbody> --}}
                </table></div></div></div>
        </div>
        </div>
        </div>


@endsection
