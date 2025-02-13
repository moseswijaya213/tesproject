<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media print {
            .submitbutton {
                display: none;
            }
        }
    </style>
</head>

<body class="invoice">
    <div class="invoicetitle d-flex align-items-center">
        <img src="logocpp.jpg" style="width: 150px; height: 70px;" alt="">
        <div style="margin-left: 160px; font-size: 20px;">Internal Request</div>
        <div class="d-block">
            <div style="margin-left: 100px; background-color: #f0ec00; border: 2px solid black; padding: 5px;">Tier
                {{$project->project_category}}
            </div>
            <div style="margin-left: 100px; margin-top: 7px;">IT.<?php echo date('Y.m.d'); ?>-</div>
        </div>
    </div>

    <div class="invoiceheader">
        <div class="invoiceleft">
            <div class="invoicee">
                <input type="checkbox">
                <label for="new-location">New Location Set Up</label>
            </div>
            <div class="invoicee">
                <input type="checkbox">
                <label for="existing-location">Existing Location Set Up (Mandatory Approval BD)</label>
            </div>
            <div class="invoicee">
                <input type="checkbox">
                <label for="repair">Repair / Replacement Existing Location (BA Attachment)</label>
            </div><br>
            <div class="invoicee">
                <input type="checkbox">
                <label>Location: {{ $project_code }}</label>
            </div>
        </div>

        <div class="invoiceright">
            <div>Submission Date : <?php echo date('d/m/Y'); ?></div>
            <div>Expected Date IR :</div>
            <div>Status : [Priority]</div>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Item</th>
                <th>Specification</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kantongs as $kantong)
                        @php
                            $Access = $accessData->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                            $itemEntry = $itemEntries->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                            $itemExit = $itemExits->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                            $itemAdmin = $itemAdmins->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                            $noEntry = 1;
                            $noExit = 1;
                            $noAdmin = 1;
                        @endphp
                        <tr>
                            <td></td>
                            <td>Entry </td>
                            <td>{{ $kantong->nama_kantong }}</td>
                            <td></td>
                            <td></td>
                            <td>
                                @foreach ($Access as $access)
                                    Access {{ $access->jenis_kendaraan }}
                                    {{ $access->kategori }}
                                    [{{ $access->quantity }} Unit] <br>
                                @endforeach
                            </td>
                        </tr>

                        @foreach ($itemEntry as $entry)
                            <tr>
                                <td>{{ $noEntry++ }}</td>
                                <td>{{$entry->nama_item}}</td>
                                <td></td>
                                <td>{{$entry->quantity}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                        <tr>
                            <td></td>
                            <td>Exit</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ $kantong->nama_kantong }}</td>
                        </tr>

                        @foreach ($itemExit as $exit)
                            <tr>
                                <td>{{ $noExit++ }}</td>
                                <td>{{$exit->nama_item}}</td>
                                <td></td>
                                <td>{{$exit->quantity}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach

                        @if ($itemAdmin->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code) == null)
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>Admin</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $kantong->nama_kantong }}</td>
                            </tr>

                            @foreach ($itemAdmin as $admin)
                                <tr>
                                    <td>{{ $noAdmin++ }}</td>
                                    <td>{{$admin->nama_item}}</td>
                                    <td></td>
                                    <td>{{$admin->quantity}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td>Rambu</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            @php
                $itemRambu = $itemRambus->where('project_code', $project_code);
                $noRambu = 1;
            @endphp

            @foreach ($itemRambu as $rambu)
                <tr>
                    <td>{{ $noRambu++ }}</td>
                    <td>{{$rambu->nama_item}}</td>
                    <td></td>
                    <td>{{$rambu->quantity}}</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
<button class="submitbutton btn" onclick="window.print()">Download PDF</button>

</html>