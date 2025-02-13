<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kantong Parkir</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="addprojectpage">
    @extends('Layouts.app')

    @section('content')

    <div class="homeheader">
        <h1 class="bolder">Data Kantong Parkir</h1>
    </div>

    <hr>
    <div class="accform">
        <form class="accformm shadow" action="{{route('addkantong')}}" method="post" style="width: 700px;">
            @csrf
            <div>
                <label class="bolder" for="project">Project Code : {{$project_code}}</label>
                <input type="hidden" name="project_code" id="project_code" value="{{ $project_code }}">
            </div>
            <hr>
            <div class="kantong-parkir row mb-2">
                <div class="col-4">
                    <label for="">Nama Kantong Parkir</label>
                </div>
                <div class="col-7">
                    <input class="form-control" type="text" name="nama_kantong[]" placeholder="Nama Kantong Parkir"
                        required>
                </div>
                <div class="col-1">
                    <button type="button" class="deletekantongbtn btn btn-link p-0"><i class="bi bi-trash3 text-danger"></i></button>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-dark addkantongbtn">+ Add Kantong Parkir</button>
            </div>

            <button class="btn submitbutton mt-5" type="submit">Submit</button>
        </form>
    </div>

    <script>
        function attachAddKantongBtn(button) {
            button.addEventListener('click', function () {
                var container = document.querySelector('.kantong-parkir');
                var newKantong = document.createElement('div');
                newKantong.classList.add('kantong-parkir');
                newKantong.innerHTML = `
                    <div class="kantong-parkir row mb-2">
                        <div class="col-4">
                            <label for="">Nama Kantong Parkir</label>
                        </div>
                        <div class="col-7">
                            <input class="form-control" type="text" name="nama_kantong[]" placeholder="Nama Kantong Parkir"
                            required>
                        </div>
                        <div class="col-1">
                            <button type="button" class="deletekantongbtn btn btn-link p-0"><i class="bi bi-trash3 text-danger"></i></button>
                        </div>
                    </div>
                `;
                container.insertAdjacentElement('afterend', newKantong);

                attachDeleteBtn(newKantong.querySelector('.deletekantongbtn'));
            });
        }

        function attachDeleteBtn(button) {
            button.addEventListener('click', function () {
                this.closest('.kantong-parkir').remove();
            });
        }

        document.querySelectorAll('.addkantongbtn').forEach(attachAddKantongBtn);
        document.querySelectorAll('.deletekantongbtn').forEach(attachDeleteBtn);
    </script>
    @endsection
</body>

</html>