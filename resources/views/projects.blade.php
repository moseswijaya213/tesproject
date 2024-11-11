<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Active Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @extends('Layouts.app')

    @section('content')
    <h1 class="bolder">Database Active Projects</h1>
    <hr>
    <table class="table table-hover table-bordered">
        <thead class="">
            <tr>
                <th>Project Name</th>
                <th>Project Code</th>
                <th>Project Category</th>
                <th>Company Name</th>
                <th>PIC</th>
                <th>Target Live Project</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="table-group-divider table-hover">
            @foreach($allproject as $p)
                <tr>
                    <td>
                        <a href="{{ route('locationpage', ['project_name' => $p->project_name]) }}">
                            {{ $p->project_name }}
                        </a>
                    </td>
                    <td>{{ $p->project_code }}</td>
                    <td>{{ $p->project_category }}</td>
                    <td>{{ $p->perusahaan }}</td>
                    <td>{{ $p->pic }}</td>
                    <td>{{ $p->target_live_project }}</td>
                    <td>Status</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection

</body>

</html>
