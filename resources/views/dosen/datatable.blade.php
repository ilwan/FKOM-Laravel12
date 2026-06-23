@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <table id="crudTable" class="table table-bordered table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Jabatan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("dosen.index") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nidn', name: 'nidn' },
            { data: 'nama', name: 'nama' },
            { data: 'email', name: 'email' },
            { data: 'jurusan', name: 'jurusan' },
            { data: 'jabatan', name: 'jabatan' },
            { data: 'foto', name: 'foto', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        order: [[1, 'asc']]
    });
});
</script>
@endpush
