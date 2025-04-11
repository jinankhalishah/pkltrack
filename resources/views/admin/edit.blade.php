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
                <h3 class="card-title">FORM EDIT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(session('succes'))
                <p style="color: green;">{{session('succes')}}</p>
              @endif

              @if ($errors->any())
              <ul style="color: red;">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                {{-- ($errors->all() as $error) --}}
              </ul>
              @endif

              <form action="{{ route('adminupdate', $admin->id) }}" method="POST">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{$admin->email}}" placeholder="Input Email">
                  </div>
                  <div class="form-group">
                    <label>No HP</label>
                    <input type="text" class="form-control" name="no_hp"    value="{{$admin->no_hp}}" placeholder="Input No HP">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username"  value="{{$admin->username}}" placeholder="Input Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengganti password">
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
              </form>
            </div>
        </div>
        </div>
        </div>
        </div>


@endsection

