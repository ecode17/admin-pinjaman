@extends('layouts.app')

@section('title', 'Data Pinjaman')

@section('content')
<div class="form-container">
    <h2 class="mb-4">Data Pinjaman</h2>
    <a href="{{ route('pinjaman.create') }}" class="btn btn-custom mb-3">Tambah Data</a>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Nama Pinjaman</th>
                <th>Total Pinjaman</th>
                <th>Tenor</th>
                <th>Nominal Angsuran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row['NIK'] }}</td>
                    <td>{{ $row['Nama'] }}</td>
                    <td>{{ $row['Nama Pinjaman'] }}</td>
                    <td>Rp{{ number_format($row['Total Pinjaman'], 2, ',', '.') }}</td>
                    <td>{{ $row['Tenor'] }} bulan</td>
                    <td>Rp{{ number_format($row['Nominal Angsuran'], 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('pinjaman.edit', $row['id_pinjaman']) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $row['id_pinjaman'] }}">
                            Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal')
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-id')
        var form = document.getElementById('deleteForm')
        form.action = '/pinjaman/' + id
    })
</script>
@endsection
