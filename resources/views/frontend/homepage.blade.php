@extends('layout.frontend')

@section('title')
    Home
@endsection

@section('content')
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route ('homepage') }}">Homepage</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="{{route ('homepage') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
          <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Rental Mobil</h1>
            <p class="lead fw-normal text-white-50 mb-0">
              Hanya Dengan Satu Sentuhan
            </p>
          </div>
        </div>
      </header>
      <!-- Section-->
      <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="text-center mb-5">Daftar Mobil</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
              @foreach ( $mobils as $mobil )
                <div class="col mb-5">
                  <div class="card h-100">
                    <!-- Sale badge-->
                    <div
                      class="badge badge-custom {{ $mobil->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                      style="top: 0; right: 0"
                    >
                      {{ $mobil->status }}
                    </div>
                    <!-- Product image-->
                    <div style="height: 200px" class="d-flex justify-content-center align-items-center">

                      <img style="max-height: 200px"
                      class="card-img-top"
                      src="{{ Storage::url($mobil->gambar) }}"
                      alt="{{ $mobil->nama_mobil }}"
                      />
                    </div>
                      <!-- Product details-->
                    <div class="card-body card-body-custom pt-4">
                      <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">{{ $mobil->nama_mobil }}</h5>
                        <!-- Product price-->
                        <div class="rent-price mb-3">
                          <span class="text-primary">Rp.{{ number_format($mobil->harga_sewa) }}/</span>day
                        </div>
                        <ul class="list-unstyled list-style-group">
                          <li
                            class="border-bottom p-2 d-flex justify-content-between"
                          >
                            <span>Bahan bakar</span>
                            <span style="font-weight: 600">{{ $mobil->bahan_bakar }}</span>
                          </li>
                          <li
                            class="border-bottom p-2 d-flex justify-content-between"
                          >
                            <span>Jumlah Kursi</span>
                            <span style="font-weight: 600">{{ $mobil->jumlah_kursi }}</span>
                          </li>
                          <li
                            class="border-bottom p-2 d-flex justify-content-between"
                          >
                            <span>Transmisi</span>
                            <span style="font-weight: 600">{{ $mobil->transmisi }}</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer border-top-0 bg-transparent">
                      <div class="text-center">
                        <a class="btn btn-primary mt-auto" href="https://wa.me/6282132834294?text=Saya%20Tertarik%20Untuk%20Menyewa%20Mobil%20{{ $mobil->nama_mobil }}%20Ini">Sewa</a>
                        <a
                          class="btn btn-info mt-auto text-white"
                          href="{{ route('detail', $mobil->id) }}"
                          >Detail</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
      </section>
@endsection