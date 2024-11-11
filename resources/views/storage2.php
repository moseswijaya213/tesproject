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
    <br>
    <div class="kantongdisplaybase">
        @foreach ($kantongs as $kantong)
        <div class="kantongdisplay">
            Kantong Parkir {{ $kantong->nama_kantong }}
            @php
            $Access = $accessData->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
            $itemEntry = $itemEntries->where('nama_kantong', $kantong->nama_kantong)->where('project_code',
            $project_code);
            $itemExit = $itemExits->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
            $itemAdmin = $itemAdmins->where('nama_kantong', $kantong->nama_kantong)->where('project_code',
            $project_code);
            $itemRambu = $itemRambus->where('project_code', $project_code);
            @endphp
            @foreach ($Access as $access)
            <div>
                Access {{ $access->jenis_kendaraan }} Entry [{{ $access->entry_access }}] Exit
                [{{ $access->exit_access }}]
            </div>
            @endforeach
            <div>
                <table id="myDataTable" class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Entry Item</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    @foreach ($itemEntry as $entry)
                    <tbody>
                        <td>{{$entry->nama_item}}</td>
                        <td>{{$entry->quantity}}</td>
                    </tbody>
                    @endforeach
                </table>
                <table id="myDataTable" class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Exit Item</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    @foreach ($itemExit as $exit)
                    <tbody>
                        <td>{{$exit->nama_item}}</td>
                        <td>{{$exit->quantity}}</td>
                    </tbody>
                    @endforeach
                </table>
                <table id="myDataTable" class="datatable table table-bordered">
                    <thead>
                        <tr>
                            <th>Admin Item</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    @foreach ($itemAdmin as $admin)
                    <tbody>
                        <td>{{$admin->nama_item}}</td>
                        <td>{{$admin->quantity}}</td>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        @endforeach
        <div class="kantongdisplay">
            <table id="myDataTable" class="datatable table table-bordered">
                <thead>
                    <tr>
                        <th>Rambu Item</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                @foreach ($itemRambu as $rambu)
                <tbody>
                    <td>{{$rambu->nama_item}}</td>
                    <td>{{$rambu->quantity}}</td>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#myDataTable').DataTable({
                paging: true, // Enable pagination
                searching: true, // Enable search
                ordering: true, // Enable sorting
                info: true, // Show information
                lengthChange: false, // Disable the "Show X entries" dropdown
            });
        });
    </script>
</body>

</html>