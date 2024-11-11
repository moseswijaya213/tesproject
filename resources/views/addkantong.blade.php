<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kantong Parkir</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="addprojectpage">
    @extends('Layouts.app')

    @section('content')
    <h1 class="bolder">Data Kantong Parkir</h1>
    <hr>
    <div class="accform">
        <form class="accformm" action="" method="post">
            @csrf
            <div>
                <label class="bolder" for="project">Kode Project : {{$project_code}}</label>
                <input type="hidden" name="project_code" id="project_code" value="{{ $project_code }}">
                <hr>
            </div>
            <div class="kantong-parkir">
                <label for="">Nama Kantong Parkir</label>
                <input type="text" name="nama_kantong[]" placeholder="Nama Kantong Parkir" required>
            </div>
            <div class="addkantongparkir">
                <button type="button" class="addkantongbtn">+</button>
            </div>

            <button class="submitbutton" type="submit">Submit</button>
        </form>
    </div>

    <script>
        function attachAddKantongBtn(button) {
            button.addEventListener('click', function () {
                var container = document.querySelector('.kantong-parkir');
                var newKantong = document.createElement('div');
                newKantong.classList.add('kantong-parkir');
                newKantong.innerHTML = `
                    <label for="">Nama Kantong Parkir</label>
                    <input type="text" name="nama_kantong[]" placeholder="Nama Kantong Parkir" required>
                    <button type="button" class="deletebtn">-</button>
                `;
                container.insertAdjacentElement('afterend', newKantong);

                attachDeleteBtn(newKantong.querySelector('.deletebtn'));
            });
        }

        function attachDeleteBtn(button) {
            button.addEventListener('click', function () {
                this.closest('.kantong-parkir').remove();
            });
        }

        document.querySelectorAll('.addkantongbtn').forEach(attachAddKantongBtn);
        document.querySelectorAll('.deletebtn').forEach(attachDeleteBtn);
    </script>
    @endsection
</body>

</html>