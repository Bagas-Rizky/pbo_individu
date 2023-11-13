@extends('layout.admin')

@section('title')
Interface
@endsection

@section('content')
<!-- table secondary start -->
<div class="col-lg-12 mt-3  ">
    <div class="card">
        <div class="card-body">
            <h2>Daftar Mobil</h2>
            <a href="{{ route('admin.mobil.create') }}" type="button" class="btn btn-primary my-2">Tambah Data</a>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-secondary">
                            <tr class="text-white">
                                <th scope="col">ID</th>
                                <th scope="col">Nama Mobil</th>
                                <th scope="col">Gambar Mobil</th>
                                <th scope="col">Harga Mobil</th>
                                <th scope="col">Status Mobil</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                    @forelse ($mobils as $mobil)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mobil->nama_mobil }}</td>
                                            <td>
                                                <img src="{{ Storage::url($mobil->gambar) }}" width="200">
                                            </td>
                                            <td>{{ $mobil->harga_sewa }}</td>
                                            <td>{{ $mobil->status }}</td>
                                            <td>
                                                <a href="{{ route('admin.mobil.edit', $mobil->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="d-inline" action="{{ route('admin.mobil.destroy', $mobil->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Kosong</td>
                                        </tr>
                                    @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- table secondary end -->
@endsection