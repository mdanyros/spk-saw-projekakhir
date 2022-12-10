@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Penilaian</h1>
        </div>
        <div class="section-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('success') }}
                    </div>
            @endif
            @if (session()->has('gagal'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('gagal') }}
                    </div>
            @endif
        </div>
        <a class="btn btn-icon icon-left btn-primary" href="/penilaian/create" role="button"><i
                class="fas fa-user-plus"></i>Buat Penilaian
            Data</a>
        <br>
        <br>
        <div class="card card-primary">
            <div class="card-body">
                <table id="DataTable" class="table table-striped-columns table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Akses</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($users as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <div class="badge {{ $u->is_admin == 0 ? 'badge-success' : 'badge-primary' }}">
                                        {{ $u->is_admin == 0 ? 'Admin' : 'Super Admin' }}</div>
                                </td>
                                <td>
                                    <a href="/user/{{ $u->id }}/edit" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i></a>
                                    @if ($u->is_admin == 0)
                                        <a href="{{ route('user.destroy', $u->id) }}" class="btn btn-sm btn-danger hapus">
                                            <i class="fas fa-trash-alt"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
