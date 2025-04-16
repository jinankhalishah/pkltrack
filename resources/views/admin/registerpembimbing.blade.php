@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <div class="container-fluid">
    <div class="col-12">
      <div class="card mb-4">
        <!-- Header dengan title dan tombol Tambah di kanan -->
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title mb-0">Data Guru Pembimbing</h3>
          <a href="{{ route('prosesregispembimbing') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
          </a>
        </div>

        <!-- Pesan sukses -->
        @if(session('succes'))
          <div class="p-3">
            <p style="color: green;">{{ session('succes') }}</p>
          </div>
        @endif

        <!-- Tabel -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nama Lengkap</th>
                <th>NIP</th>
                <th>Email</th>
                <th>No Handphone</th>
                <th>Jabatan</th>
                <th>Status Akun</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pembimbings as $pembimbing)
                <tr>
                  <td>{{ $pembimbing-> id }}</td>
                  <td>{{ $pembimbing-> username }}</td>
                  <td>{{ $pembimbing-> nip }}</td>
                  <td>{{ $pembimbing-> email }}</td>
                  <td>{{ $pembimbing-> no_hp }}</td>
                  <td>{{ $pembimbing-> jabatan }}</td>
                  <td>{{ $pembimbing-> status }}</td>
                  <td>
                    <a href="{{ route('pembimbing.edit', $pembimbing->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                    <form action="{{ route('pembimbing.destroy', $pembimbing->id) }}" method="post" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> <!-- end card -->
    </div> <!-- end col -->
  </div> <!-- end row -->
</div> <!-- end container -->
</div> <!-- end content-wrapper -->
@endsection
