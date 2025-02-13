<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project Data</title>
    <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="addprojectpage">
    @extends('Layouts.app')

    @section('content')

    <div class="homeheader">
        <h1 class="bolder">New Project Data</h1>
    </div>

    <main>
        <div class="mainform">
            <form class="mainformm shadow" method="post" action="{{route('addproject')}}" style="width: 1000px;">
                @csrf
                <div class="form1">
                    <h3 class="fw-bold">Project Information Details</h3>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label>Nama Project </label><br>
                            <input class="form-control" type="text" name="project_name" placeholder="" required>
                        </div>
                        <div class="col">
                            <label>Perusahaan </label><br>
                            <input class="form-control" type="text" name="perusahaan" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>Project Code</label><br>
                            <input class="form-control" type="text" name="project_code" placeholder="" required>
                        </div>
                        <div class="col">
                            <label>Bidang Usaha</label><br>
                                <select class="form-select" id="test" name="bidang_usaha" required>
                                    <option value="Office">Office</option>
                                    <option value="Pelabuhan">Pelabuhan</option>
                                    <option value="Mall">Mall</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Bandara">Bandara</option>
                                    <option value="Others">Others</option>
                                </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label>Alamat</label><br>
                            <textarea class="form-control" name="alamat" id="" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label>Target Live Project</label><br>
                        <input class="form-control" type="date" name="targetliveproject" required>
                    </div>
                    <div class="col">
                        <label>Sistem Operasional</label><br>
                        <input class="form-control" type="text" name="sistem_operasional" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label>Cashflow</label><br>
                        <input class="form-control" type="text" name="cashflow" required>
                    </div>
                    <div class="col">
                        <label>Jenis Kerjasama</label><br>
                        <input class="form-control" type="text" name="jenis_kerjasama" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label>Status Asset</label><br>
                        <input class="form-control" type="text" name="status_asset" required>
                    </div>
                    <div class="col">
                        <label>Project Category</label><br>
                        <select class="form-select" name="project_category" id="" required>
                            <option value="Bronze">Bronze</option>
                            <option value="Silver">Silver</option>
                            <option value="Gold">Gold</option>
                            <option value="Platinum">Platinum</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label>PIC</label><br>
                        <input class="form-control" type="text" name="pic" required>
                    </div>
                </div>

                <button class="btn submitbutton mt-3" type="submit">Submit</button>
            </form>
        </div>
    </main>
    @endsection
</body>

</html>