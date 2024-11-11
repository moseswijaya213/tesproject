<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Active Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        @foreach ($kantongs as $index => $kantong)
                <div class="kantongdisplay kantong" id="kantong-{{ $index }}"
                    style="display: {{ $index == 0 ? 'block' : 'none' }}">
                    <h3>Kantong Parkir {{ $kantong->nama_kantong }}</h3>
                    @php
                        $Access = $accessData->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                        $itemEntry = $itemEntries->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                        $itemExit = $itemExits->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                        $itemAdmin = $itemAdmins->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                        $itemRambu = $itemRambus->where('project_code', $project_code);
                    @endphp

                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Entry Item</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemEntry as $entry)
                                    <tr>
                                        <td>{{ $entry->nama_item }}</td>
                                        <td>{{ $entry->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Exit Item</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemExit as $exit)
                                    <tr>
                                        <td>{{ $exit->nama_item }}</td>
                                        <td>{{ $exit->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Admin Item</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemAdmin as $admin)
                                    <tr>
                                        <td>{{ $admin->nama_item }}</td>
                                        <td>{{ $admin->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        @endforeach
        <div class="kantongdisplay">
            <table class="table table-bordered">
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

        <div class="text-center">
            <button class="btn btn-secondary" onclick="showPrevious()">Previous</button>
            <button class="btn btn-secondary" onclick="showNext()">Next</button>
        </div>
    </div>

    <script>
        let currentIndex = 0;
        const kantongs = document.querySelectorAll('.kantong');

        function showNext() {
            kantongs[currentIndex].style.display = 'none';
            currentIndex = (currentIndex + 1) % kantongs.length;
            kantongs[currentIndex].style.display = 'block';
        }

        function showPrevious() {
            kantongs[currentIndex].style.display = 'none';
            currentIndex = (currentIndex - 1 + kantongs.length) % kantongs.length;
            kantongs[currentIndex].style.display = 'block';
        }
    </script>
    @endsection

</body>

</html>