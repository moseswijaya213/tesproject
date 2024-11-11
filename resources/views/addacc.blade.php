<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Access Kantong</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="addprojectpage">
    @extends('Layouts.app')

    @section('content')
    <h1 class="bolder">Data Access Kantong</h1>
    <hr>
    <div class="accform">
        <form class="accformm" method="post" action="{{ route('addacc') }}">
            @csrf
            <div class="acc-top">
                <h3>Form Access Kantong : {{ $project_code }}</h3>
                <input type="hidden" name="project_code" value="{{ $project_code }}">
            </div>
            @foreach ($kantongNames as $index => $nama_kantong)
                <div class>
                    <hr>
                    <h4>Kantong Parkir: {{ $nama_kantong }}</h4>
                    <input type="hidden" name="kantong[{{ $index }}][nama]" value="{{ $nama_kantong }}">
                    <div class="access-list" id="access-list-{{ $index }}">
                        <div class="access-item">
                            <select name="kantong[{{ $index }}][access][0][jenis]" required>
                                <option value="Car">Car</option>
                                <option value="Motorbike">Motorbike</option>
                                <option value="Box Truck">Box Truck</option>
                                <option value="Combo">Combo</option>
                            </select>
                            <input type="number" name="kantong[{{ $index }}][access][0][entry]" placeholder="Entry" min="1"
                                required>
                            <input type="number" name="kantong[{{ $index }}][access][0][exit]" placeholder="Exit" min="1"
                                required>
                            <button type="button" class="remove-access" onclick="removeAccess(this)">-</button>
                        </div>
                    </div>
                    <button type="button" class="add-access" onclick="addAccess({{ $index }})">+ Add Access</button>
                </div>
            @endforeach
            @if (session('success'))
                {{ session('success') }}
            @endif
            <button type="submit" class="submitbutton">Submit</button>
        </form>
    </div>

    <script>
        function addAccess(kantongIndex) {
            const accessList = document.getElementById(`access-list-${kantongIndex}`);
            const newAccessItem = document.createElement('div');
            newAccessItem.className = 'access-item';
            const accessCount = accessList.children.length;

            newAccessItem.innerHTML = `
        <select name="kantong[${kantongIndex}][access][${accessCount}][jenis]" required>
            <option value="Car">Car</option>
            <option value="Motorbike">Motorbike</option>
            <option value="Box Truck">Box Truck</option>
            <option value="Combo">Combo</option>
        </select>
        <input type="number" name="kantong[${kantongIndex}][access][${accessCount}][entry]" placeholder="Entry" min="1" required>
        <input type="number" name="kantong[${kantongIndex}][access][${accessCount}][exit]" placeholder="Exit" min="1" required>
        <button type="button" class="remove-access" onclick="removeAccess(this)">-</button>
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