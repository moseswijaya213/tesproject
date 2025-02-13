<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    @extends('Layouts.app')

    @section('content')
    <div class="homeheader">
        <h1 class="bolder">Locations</h1>
    </div>

    <main class="justify-content-center" style="display: flex;">
        <div class="container">
            <div class="wrapper" style="background: white;
            border: 1px solid #dee2e6;
            border-radius: 32px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);">
                <div class="row ms-3">
                    <div class="col">
                        <form method="GET" action="{{ route('projects.search') }}">
                            <div class="d-flex p-3" style="width: 500px;">
                                <div class="">
                                    <div class="input-group" style="width: 300px;">
                                        <span class="input-group-text">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Search Projects" value="{{ request('search') }}"
                                            style="height: 40px;">
                                    </div>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn submitbutton ms-3"
                                        style="height: 40px;">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive p-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Project Code</th>
                                <th>Project Category</th>
                                <th>Bidang Usaha</th>
                                <th>Company Name</th>
                                <th>PIC</th>
                                <th>Target Live Project</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="px-1">
                            @foreach($projects as $p)
                                <tr onclick="window.location='{{ route('location.page', ['project_name' => $p->project_name]) }}'"
                                    style="cursor: pointer;">
                                    <td>
                                        <a href="{{ route('location.page', ['project_name' => $p->project_name]) }}"
                                            style="text-decoration: none; color: inherit;">
                                            {{ $p->project_name }}
                                        </a>
                                    </td>
                                    <td>{{ $p->project_code }}</td>
                                    <td>{{ $p->project_category }}</td>
                                    <td>{{ $p->bidang_usaha }}</td>
                                    <td>{{ $p->perusahaan }}</td>
                                    <td>{{ $p->pic }}</td>
                                    <td>{{ $p->target_live_project }}</td>
                                    <td>
                                        @if ($p->status == 'Finished')
                                            <label class="success-label p-1 rounded-5">
                                                <i class="bi bi-check-lg"></i> {{$p->status}}
                                            </label>
                                        @elseif ($p->status == 'On-going')
                                            <label class="ongoing-label p-1 rounded-5">
                                                <i class="bi bi-arrow-repeat"></i></i> {{$p->status}}
                                            </label>
                                        @elseif ($p->status == 'New Project')
                                            <label class="newproject-label py-1 rounded-5">
                                                <i class="bi bi-exclamation-lg"></i><label class="fs-" for="">{{$p->status}}</label>
                                            </label>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="ms-4">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item {{ $projects->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $projects->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($projects->links()->elements[0] as $page => $url)
                                <li class="page-item {{ $page == $projects->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $projects->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $projects->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>


    @endsection

</body>

</html>