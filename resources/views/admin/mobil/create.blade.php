@extends('layout.admin')

@section('title')
Create Data
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Form Tambah Data</h4>
                        <form action="{{ route('admin.mobil.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_mobil" class="col-form-label">Nama Mobil</label>
                                <input class="form-control" type="text" name="nama_mobil" value="{{ old('nama_mobil') }}" id="example-text-input">
                            </div>
                            <div class="form-group">
                                <label for="harga_sewa" class="col-form-label">Harga Sewa</label>
                                <input class="form-control" type="text" name="harga_sewa" value="{{ old('harga_sewa') }}" id="example-text-input">
                            </div>
                            <div class="form-group">
                                <label for="bahan_bakar" class="col-form-label">Bahan Bakar</label>
                                <input class="form-control" type="text" name="bahan_bakar" value="{{ old('bahan_bakar') }}" id="example-text-input">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kursi" class="col-form-label">Jumlah Kursi</label>
                                <input class="form-control" type="text" name="jumlah_kursi" value="{{ old('jumlah_kursi') }}" id="example-text-input">
                            </div>
                            <div class="form-group">
                                <label for="transmisi" class="col-form-label">Transmisi</label>
                                <select class="form-control" name="transmisi" id="transmisi">
                                    <option value="manual">Manual</option>
                                    <option value="otomatis">Otomatis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-form-label">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="tersedia">Tersedia</option>
                                    <option value="tidak tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" for="deskripsi">Deskripsi</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" name="deskripsi" id="deskripsi" cols="30" rows="5">{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="p3k" class="col-form-label">P3K</label>
                                <select class="form-control" name="p3k" id="p3k">
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="audio" class="col-form-label">Audio</label>
                                <select class="form-control" name="audio" id="audio">
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="charger" class="col-form-label">Charger</label>
                                <select class="form-control" name="charger" id="charger">
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ac" class="col-form-label">AC</label>
                                <select class="form-control" name="ac" id="ac">
                                    <option value="1">Tersedia</option>
                                    <option value="0">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary" type="button">Button</button>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                    <label class="custom-file-label" for="gambar">Choose file</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection