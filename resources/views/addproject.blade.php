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
    <h1 class="bolder">New Project Data</h1>
    <hr>
    <div class="mainform">
        <form class="mainformm" method="post">
            @csrf
            <div class="form1">
                <h3>Project Information Details</h3>
                <hr>
                <div class="nextcolumn">
                    <div class="input-block">
                        <label>Nama Project </label><br>
                        <input class="inputbox" type="text" name="project_name" placeholder="" required>
                    </div>
                    <div class="input-block2">
                        <label>Perusahaan </label><br>
                        <input class="inputbox" type="text" name="perusahaan" required>
                    </div>
                </div>

                <div class="nextcolumn">
                    <div class="input-block">
                        <label>Project Code</label><br>
                        <input class="inputbox" type="text" name="project_code" placeholder="" required>
                    </div>
                    <div class="input-block2">
                        <label>Bidang Usaha</label><br>
                        <input class="inputbox" type="text" name="bidang_usaha" required>
                    </div>
                </div>

                <div class="input-block">
                    <label>Alamat</label><br>
                    <textarea class="textarea" name="alamat" id="" required></textarea>
                </div>
            </div>

            <div class="nextcolumn">
                <div class="input-block">
                    <label>Target Live Project</label><br>
                    <input class="inputbox" type="date" name="targetliveproject" required>
                </div>
                <div class="input-block2">
                    <label>Sistem Operasional</label><br>
                    <input class="inputbox" type="text" name="sistem_operasional" required>
                </div>
            </div>

            <div class="nextcolumn">
                <div class="input-block">
                    <label>Cashflow</label><br>
                    <input class="inputbox" type="text" name="cashflow" required>
                </div>
                <div class="input-block2">
                    <label>Jenis Kerjasama</label><br>
                    <input class="inputbox" type="text" name="jenis_kerjasama" required>
                </div>
            </div>

            <div class="nextcolumn">
                <div class="input-block">
                    <label>Status Asset</label><br>
                    <input class="inputbox" type="text" name="status_asset" required>
                </div>
                <div class="input-block2">
                    <label>Project Category</label><br>
                    <select class="select1" name="project_category" id="" required>
                        <option value="Bronze">Bronze</option>
                        <option value="Silver">Silver</option>
                        <option value="Gold">Gold</option>
                        <option value="Platinum">Platinum</option>
                    </select>
                </div>
            </div>
            <div class="input-block">
                <label>PIC</label><br>
                <input class="inputbox" type="text" name="pic" required>
            </div>

            <button class="submitbutton" type="submit">Submit</button>
        </form>
    </div>
    @endsection
</body>

</html>