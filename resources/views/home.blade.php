<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Tracking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>

<body>
    @extends('Layouts.app')

    @section('content')
    <div class="homeheader">
        <h1 class="bolder">Dashboard</h1>
    </div>

    <main>
        <header>
            <div class="row g-5 d-flex" style="margin-bottom: 10px;">
                <div class="col">
                    <div class="projectlabel" style="background-color: #2563eb;">
                        <div class="project-label">
                            <div class="text-start projecttlabel">
                                {{$newProject}}
                            </div>
                            <div class="text-start projecttlabel1">
                                New Project
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="projectlabel" style="background-color: #3b82f6;">
                        <div class="project-label">
                            <div class="text-start projecttlabel">
                                {{$ongoingProject}}
                            </div>
                            <div class="text-start projecttlabel1">
                                On-going
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="projectlabel" style="background-color: #059669;">
                        <div class="project-label">
                            <div class="text-start projecttlabel">
                                {{$finishedProject}}
                            </div>
                            <div class="text-start projecttlabel1">
                                Finished
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="projectlabel" style="background-color:#d97706;">
                        <div class="project-label">
                            <div class="text-start projecttlabel">
                                {{$totalProject}}
                            </div>
                            <div class="text-start projecttlabel1">
                                Total Project
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div
                        style="width: auto; height: 400px; border: 1px solid rgb(235, 235, 235) ; border-radius: 10px; background-color: white; padding: 10px;">
                        Active Project Distribution
                        <div class="d-flex">
                            <canvas id="myChart" style="width: 900px; height: 340px;"></canvas>
                            <div class="card ms-5 mt-5" style="width: 200px; height: 60%; padding: 0px;">
                                <div class="d-flex justify-content-center p-2 bg-secondary" style=" color: white;">
                                    Project Calculation
                                </div>
                                <hr class="" style="margin: 0;">
                                <div class="p-2">
                                    <div class="d-flex">
                                        <label class="chart-label">Mall</label> : {{$countMall}}
                                    </div>
                                    <div class="d-flex">
                                        <label class="chart-label">Office</label> : {{$countOffice}} <br>
                                    </div>
                                    <div class="d-flex">
                                        <label class="chart-label">Pelabuhan</label> : {{$countPelabuhan}} <br>
                                    </div>
                                    <div class="d-flex">
                                        <label class="chart-label">Retail</label> : {{$countRetail}} <br>
                                    </div>
                                    <div class="d-flex">
                                        <label class="chart-label">Bandara</label> : {{$countBandara}} <br>
                                    </div>
                                    <div class="d-flex">
                                        <label class="chart-label">Others</label> : {{$countOthers}} <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            const xValues = ["Mall", "Office", "Pelabuhan", "Retail", "Bandara", "Others"];
                            const yValues = [{{$countMall}}, {{$countOffice}}, {{$countPelabuhan}}, {{$countRetail}}, {{$countBandara}}, {{$countOthers}}];
                            const barColors = ["#3b82f6", "#3b82f6", "#3b82f6", "#3b82f6", "#3b82f6", "#3b82f6"];

                            new Chart("myChart", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    responsive: false,
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </header>

        <div style="margin-top: 10px;">
            <div class="row g-3 row-cols-md-4">
                @php
                    $index = 0;
                @endphp
                @foreach ($ongoingProjects as $p)
                                @php
                                    $progressDisplay = number_format($p->totalprogress, 2, ',', '');
                                    $progressItemDisplay = number_format($p->totalprogresItem, 2, ',', '');
                                @endphp
                                <div class="col">
                                    <div onclick="window.location='{{ route('location.page', ['project_name' => $p->project_name]) }}'"
                                        style="cursor: pointer;" class="card" style="width: 400px; height: auto;">
                                        <div class="d-flex">
                                            <div>
                                                <strong>
                                                    <a>
                                                        {{ $p->project_name }}
                                                    </a>
                                                </strong>
                                                <div>
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
                                                            <i class="bi bi-exclamation-lg"></i><label class="fs-"
                                                                for="">{{$p->status}}</label>
                                                        </label>
                                                    @endif
                                                </div>
                                                <div><br>
                                                    Item : {{$p->totalItemCountSesuai}} of {{$p->totalItemCount}} <br>
                                                    Task : {{$p->countFinishedTasksProject}} of {{$p->countTasksProject}}<br>
                                                </div>
                                            </div>
                                            <div class="d-flex ms-auto">
                                                <div
                                                    class="wrapping d-flex flex-column justify-content-center align-items-center align-self-end me-2">
                                                    <div class="mb-2">Checklist</div>
                                                    <div class="progress-container">
                                                        <div class="progress-circle" style="--percent: {{$p->totalprogresItem}};"></div>
                                                        <div class="progress-text">{{$progressItemDisplay}}%</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="wrapping d-flex flex-column justify-content-center align-items-center align-self-end">
                                                    <div class="mb-2">Task</div>
                                                    <div class="progress-container">
                                                        <div class="progress-circle" style="--percent: {{$p->totalprogress}};"></div>
                                                        <div class="progress-text">{{$progressDisplay}}%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                @endforeach
            </div>
        </div>
    </main>

    @endsection
    <script>
        const progressContainers = document.querySelectorAll('.progress-container');
        progressContainers.forEach(container => {
            const circle = container.querySelector('.progress-circle');
            const text = container.querySelector('.progress-text');

            const percent = parseInt(circle.style.getPropertyValue('--percent')) || 0;
            text.textContent = `${percent}%`;
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            setInterval(function () {
                $.ajax({
                    url: '/check-status',
                    type: 'GET',
                    success: function (response) {
                        console.log(response.message);
                    },
                    error: function (xhr, status, error) {
                        console.error('Terjadi kesalahan: ' + error);
                    }
                });
            }, 10000);
        });

    </script>

</body>

</html>