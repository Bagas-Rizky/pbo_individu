@extends('layout.admin')

@section('title')
Interface Message
@endsection

@section('content')
<!-- table secondary start -->
<div class="col-lg-12 mt-3  ">
            <div class="card">
                <div class="card-body">
                    <h2>Daftar Pesan</h2>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-secondary">
                                    <tr class="text-white">
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($messages as $message)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $message->nama }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->pesan }}</td>
                                            <td>
                                                <form onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="d-inline" action="{{ route('admin.message.destroy', $message->id) }}" method="POST">
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