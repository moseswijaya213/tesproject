<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Active Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body class="locationpage">
    @extends('Layouts.app')

    @section('content')
    <h1 class="bolder">Location Page - {{ $project_name }}</h1>
    <div class="flex-container">
        <div class="main-data">
            <div class="main-data-template">
                <label for="">Nama project</label><br>
                <label for="">Project Code</label><br>
                <label for="">Perusahaan</label><br>
                <label for="">PIC</label><br>
                <label for="">Bidang Usaha</label><br>
                <label for="">Alamat</label><br>
                <label for="">Target Live Project</label><br>
                <label for="">Sistem Operasional</label><br>
                <label for="">Cashflow</label><br>
                <label for="">Jenis Pekerjaan</label><br>
                <label for="">Status Asset</label><br>
                <label for="">Project Category</label><br>
            </div>
            <div class="vl"></div>
            <div>
                {{$project_name}}<br>
                {{$project_code}}<br>
                {{$perusahaan}}<br>
                {{$pic}}<br>
                {{$bidang_usaha}}<br>
                {{$alamat}}<br>
                {{$target_live_project}}<br>
                {{$sistem_operasional}}<br>
                {{$cashflow}}<br>
                {{$jenis_kerjasama}}<br>
                {{$status_asset}}<br>
                {{$project_category}}
            </div>
        </div>
        <div class="card">
            <p style="font-weight: bold;">List Kantong parkir dan Access</p>
            <hr>
            @foreach ($kantongs as $kantong)
                        {{ $kantong->nama_kantong }}
                        @php
                            $Access = $accessData->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                        @endphp
                        @foreach ($Access as $access)
                            <div>
                                Access {{ $access->jenis_kendaraan }} Entry [{{ $access->entry_access }}] Exit
                                [{{ $access->exit_access }}]
                            </div>
                        @endforeach
                        <br>
            @endforeach
        </div>
    </div>
    <br>
    <div class="kantongdisplaybase">
        <h1>Item List Table</h1>
        <table id="myDataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Kategori</th>
                    <th>Kantong Parkir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kantongs as $kantong)
                                @php
                                    $itemEntry = $itemEntries->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                                    $itemExit = $itemExits->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                                    $itemAdmin = $itemAdmins->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                                @endphp

                                @foreach ($itemEntry as $entry)
                                    <tr>
                                        <td>{{$entry->nama_item}}</td>
                                        <td>{{$entry->quantity}}</td>
                                        <td>Entry</td>
                                        <td>{{ $kantong->nama_kantong }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($itemExit as $exit)
                                    <tr>
                                        <td>{{$exit->nama_item}}</td>
                                        <td>{{$exit->quantity}}</td>
                                        <td>Exit</td>
                                        <td>{{ $kantong->nama_kantong }}</td>
                                    </tr>
                                @endforeach
                                @foreach ($itemAdmin as $admin)
                                    <tr>
                                        <td>{{$admin->nama_item}}</td>
                                        <td>{{$admin->quantity}}</td>
                                        <td>Admin</td>
                                        <td>{{ $kantong->nama_kantong }}</td>
                                    </tr>
                                @endforeach
                @endforeach
                @php
                    $itemRambu = $itemRambus->where('project_code', $project_code);
                @endphp
                @foreach ($itemRambu as $rambu)
                    <tr>
                        <td>{{$rambu->nama_item}}</td>
                        <td>{{$rambu->quantity}}</td>
                        <td>Rambu</td>
                        <td>-</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myDataTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true,
                "pageLength": 10
            });
        });
    </script>
</body>

</html>