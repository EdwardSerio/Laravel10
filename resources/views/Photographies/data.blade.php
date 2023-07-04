@extends('layouts.app')

@section('content')
    <h3>Data Penyewa</h3>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('Photographies/add') }}'">
                Add New Data
            </button>        
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="alert alert-info">
                <table class="table table-sm table-striped table-bordered">
                    <tr>
                        <th>No</th>
                        <th>ID Penyewa</th>
                        <th>Nama Penyewa</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telp</th>
                        <th>#</th>
                    </tr>
                    <thead>
                    <tbody>
                        @foreach ($photographies as $row)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $row->idnumber }}</td>
                                <td>{{ $row->fullname }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ ($row->gender=='M') ? 'Male' : 'Female' }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>
                                    <button onclick="window.location='{{ route('Photographies.edit', $row->idnumber) }}'" type="button" class="btn btn-primary">Edit</button>
                                    <form action="{{ route('Photographies.destroy', $row->idnumber) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
