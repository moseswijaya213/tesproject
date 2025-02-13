<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Access Kantong</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="addprojectpage">
    @extends('Layouts.app')

    @section('content')

    <div class="homeheader">
        <h1 class="bolder">Data Access Kantong</h1>
    </div>

    <hr>
    <div class="accform">
        <form class="accformm" method="post" action="{{ route('addaccess.store') }}">
            @csrf
            <div class="acc-top">
                <h3 class="fw-bold">Project Code : {{ $project_code }}</h3>
                <input type="hidden" name="project_code" value="{{ $project_code }}">
            </div>
            @foreach ($kantongNames as $index => $nama_kantong)
                <div>
                    <hr>
                    <h4>Kantong Parkir : {{ $nama_kantong }}</h4>
                    <input type="hidden" name="kantong[{{ $index }}][nama]" value="{{ $nama_kantong }}">
                    <div class="access-list" id="access-list-{{ $index }}">
                        <div class="access-item row g-0 mb-2">
                            <div class="col-4">
                                <select class="form-select acc-select-box" name="kantong[{{ $index }}][access][0][jenis]"
                                    required>
                                    <option value="Car">Car</option>
                                    <option value="Motorbike">Motorbike</option>
                                    <option value="Box Truck">Box Truck</option>
                                    <option value="Combo">Combo</option>
                                </select>
                            </div>
                            <div class="col">
                                <input class="form-control" type="number" name="kantong[{{ $index }}][access][0][entry]"
                                    placeholder="Quantity Entry" min="1" required>
                            </div>
                            <div class="col">
                                <input class="form-control" type="number" name="kantong[{{ $index }}][access][0][exit]"
                                    placeholder="Quantity Exit" min="1" required>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn remove-access" onclick="removeAccess(this)"><i
                                        class="bi bi-trash3 text-danger"></i></button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-dark add-access" onclick="addAccess({{ $index }})">+ Add Access</button>
                </div>
            @endforeach
            @if (session('success'))
                {{ session('success') }}
            @endif
            <button type="submit" class="submitbutton btn mt-5">Submit</button>
        </form>
    </div>

    <script>
        function addAccess(kantongIndex) {
            const accessList = document.getElementById(`access-list-${kantongIndex}`);
            const newAccessItem = document.createElement('div');
            newAccessItem.className = 'access-item';

            const accessCount = accessList.children.length;

            newAccessItem.innerHTML = `
        <div class="access-item row g-0 mb-2">
                            <div class="col-4">
                                <select class="form-select acc-select-box" name="kantong[{{ $index }}][access][0][jenis]"
                                    required>
                                    <option value="Car">Car</option>
                                    <option value="Motorbike">Motorbike</option>
                                    <option value="Box Truck">Box Truck</option>
                                    <option value="Combo">Combo</option>
                                </select>
                            </div>
                            <div class="col">
                                <input class="form-control" type="number" name="kantong[{{ $index }}][access][0][entry]"
                                    placeholder="Quantity Entry" min="1" required>
                            </div>
                            <div class="col">
                                <input class="form-control" type="number" name="kantong[{{ $index }}][access][0][exit]"
                                    placeholder="Quantity Exit" min="1" required>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn remove-access" onclick="removeAccess(this)"><i
                                        class="bi bi-trash3 text-danger"></i></button>
                            </div>
                        </div>
    `;

            accessList.appendChild(newAccessItem);
        }


        function removeAccess(button) {
            button.closest('.access-item').remove();
        }
    </script>
    @endsection
</body>

</html>