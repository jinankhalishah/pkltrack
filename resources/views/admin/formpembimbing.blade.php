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
            <h3 class="card-title">FORM REGISTER PEMBIMBING</h3>
          </div>
          <!-- /.card-header -->

          @if ($errors->any())
            <div class="alert alert-danger m-3">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @if(session('success'))
            <div class="alert alert-success m-3">
              {{ session('success') }}
            </div>
          @endif

          <!-- form start -->
          <form action="{{ route('prosesregispembimbing') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Input Email">
            </div>
            <div class="form-group">
                <label for="username">Nama Lengkap</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Input Nama">
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" name="nip" id="nip" placeholder="Input NIP">
            </div>
            <div class="form-group">
                <label for="no_hp">No Handphone</label>
                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Input No HP">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Input Jabatan">
            </div>
            <div class="form-group">
                <label for="status">Status Akun</label>
                <input type="text" class="form-control" name="status" id="status" placeholder="Input Status">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Input Password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>

        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>

@endsection
