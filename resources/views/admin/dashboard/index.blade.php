@extends('layouts.admin')

@section('title', 'Beranda')

@push('style')
@endpush

@section('main')

    <div class="content p-4">
        <div class="row">
            <!-- Card Berita -->
            <div class="col-md-3">
                <div class="card dashboard-card shadow-sm text-center text-white bg-primary">
                    <div class="card-body">
                        <i class="bi bi-newspaper card-icon"></i>
                        <h6 class="card-title mt-2">Berita</h6>
                        <h2>{{ $berita }}</h2>
                    </div>
                </div>
            </div>
            <!-- Card User -->
            <div class="col-md-3">
                <div class="card dashboard-card shadow-sm text-center text-white bg-danger">
                    <div class="card-body">
                        <i class="bi bi-people card-icon"></i>
                        <h6 class="card-title mt-2">User</h6>
                        <h2>{{ $user }}</h2>
                    </div>
                </div>
            </div>
            <!-- Card Guru dan Staff -->
            <div class="col-md-3">
                <div class="card dashboard-card shadow-sm text-center text-white bg-warning">
                    <div class="card-body">
                        <i class="bi bi-person-workspace card-icon"></i>
                        <h6 class="card-title mt-2">Guru dan Staff</h6>
                        <h2>{{ $staff }}</h2>
                    </div>
                </div>
            </div>
            <!-- Card Prestasi -->
            <div class="col-md-3">
                <div class="card dashboard-card shadow-sm text-center text-white bg-info">
                    <div class="card-body">
                        <i class="bi bi-award card-icon"></i>
                        <h6 class="card-title mt-2">Prestasi</h6>
                        <h2>{{ $prestasi }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush
