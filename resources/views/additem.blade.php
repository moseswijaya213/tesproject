<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item Project</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    @extends('Layouts.app')

    @section('content')
    
    <div class="homeheader">
        <h1 class="bolder">Item Project Data</h1>
    </div>

    <main>

    <form class="itemform" method="post" action="">
        @csrf
        <div class="topproject">
            <p class="title-project">Project Code : {{ $project->project_code }}</p>
            <input type="hidden" name="project_code" value="{{ $project->project_code }}" readonly>
        </div>
        <div class="item-form-content">
            @foreach($kantongList as $kantong)
                            <div class="itemkantongform">
                                <div class="itemheader fw-bold">
                                    <label class="judulkantongitem">Access Requirements {{ $kantong->nama_kantong }}</label>
                                    <input type="hidden" name="nama_kantong[]" value="{{ $kantong->nama_kantong }}">
                                </div>

                                <div class="displayaccess">
                                    @if($accessData->has($kantong->nama_kantong))
                                                                            @foreach($accessData[$kantong->nama_kantong] as $access)
                                                                                <div class="tes">
                                                                                    Access {{$access->jenis_kendaraan}}, Entry [{{$access->entry_access}} Unit] Exit
                                                                                    [{{$access->exit_access}} Unit]
                                                                                </div>
                                                                            @endforeach
                                                                            @php
                                                                                $totalQuantityEntry = 0;
                                                                                $totalQuantityExit = 0;
                                                                                $noEntry = 1;
                                                                                $noExit = 1;
                                                                                $noRambu = 1;
                                                                                $noAdmin = 1;
                                                                            @endphp
                                                                            @foreach($accessData[$kantong->nama_kantong] as $access)
                                                                                                                            @php
                                                                                                                                $totalQuantityEntry += $access->entry_access;
                                                                                                                                $totalQuantityExit += $access->exit_access;
                                                                                                                            @endphp
                                                                            @endforeach
                                                                            <div class="total">
                                                                                Total Quantity (Entry): {{$totalQuantityEntry}}
                                                                                Total Quantity (Exit): {{$totalQuantityExit}}
                                                                            </div>
                                    @else
                                        <p>Tidak ada Access Line</p>
                                    @endif
                                </div>

                                <div class="kantong-item">
                                    <div class="d-flex" style="gap: 30px">
                                        <div class="entry-access card kategori-form">
                                            <Label class="bolder">ENTRY CONTROL SYSTEM & HARDWARE</Label>
                                            <div class="item-block">
                                                <button type="button" class="btn remove-item p-0" onclick=""><i
                                                        class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="Barrier Gate GS001 Including Loop Detector" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="Dispenser Cashless with LCD Monitor" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="Cpu Cashless / Industrial Mini PC + PCIO 4 Port" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="Thermal Printer EP-802 (Include Adaptor + Kabel Data)" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="UPS Manless 1200 va" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="Card Reader MSI Entry + Sam Brizzi (SAM disediakan oleh Smartpay)" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="IP Camera + Tiang PK + Housing for Face" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="IP Camera + Tiang PM + Housing for CCTV hardware Surveillance" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="Booster" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="Speaker + Amply" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="Intercom PA 2 Kit + Adaptor" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                {{$noEntry++}}.
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="VLD Loop Detector for Double Loop (Optional Double Loop)" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noEntry++}}.</label>
                                                <input class="item1" name="nama_item_entry[{{ $loop->index }}][]" type="text"
                                                    value="Canopy" required>
                                                <input class="iteminput" name="quantity_entry[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityEntry}}" required>
                                            </div>
                                            <button class="itembutton btn btn-sm">+ New Item</button>
                                        </div>
                                        <div class="exit-access card kategori-form">
                                            <Label class="bolder">EXIT CONTROL SYSTEM & HARDWARE</Label>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="Barrier Gate GS001 Including Loop Detector" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="Dispenser Cashless with LCD Monitor" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="Cpu Cashless / Industrial Mini PC + PCIO 4 Port" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                                        class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="Thermal Printer EP-802 (Include Adaptor + Kabel Data)" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="QR Barcode Scanner Honeywell" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="UPS Manless 1200 va" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="Card Reader STI Out" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="IP Camera + Tiang PK + Housing for Face" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="IP Camera + Tiang PM + Housing for CCTV hardware Surveillance" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="VLD Loop Detector for Double Loop (Optional Double Loop)" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                                        class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="Booster" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="Speaker + Amply">
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}">
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="Intercom PA 2 Kit + Adaptor" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noExit++}}.</label>
                                                <input class="item1" name="nama_item_exit[{{ $loop->index }}][]" type="text"
                                                    value="Canopy" required>
                                                <input class="iteminput" name="quantity_exit[{{ $loop->index }}][]" type="number"
                                                    min="0" value="{{$totalQuantityExit}}" required>
                                            </div>
                                            <button class="itembutton btn btn-sm">+ New Item</button>
                                        </div>

                                        <div id="admin" class="admin card kategori-form">
                                            <Label class="bolder">ADMINISTRATION & SERVER UNTUK CONTROL ROOM <button type="button"
                                                    class="button btn-sm" onclick="remove_admin_item()">Remove</button></Label>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" name="nama_item_admin[{{ $loop->index }}][]" type="text"
                                                    value="PC Server" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="PC Admin" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="CPU Workstation for Remote Server" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="Printer Admin Epson LX - 310" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="QR Barcode Scanner Honeywell" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="Card Reader MSI Entry" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="UPS 2000 VA for Server" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="UPS 1200 VA for Admin" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                                        class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="UPS 1200 VA for PC Remote Server" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="IP Camera Indoor for Hardware Surveillance" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="NVR 9 Channel" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="Harddisk 4 TB" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value='LCD TV 32" + Bracket' required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="Mouse Wireless for NVR" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="Kabel HDMI 15 M" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="Keyboard + Mouse Wireless for Remote Server" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="Converter HFMI to VGA Male" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="Fanvil X1 IP Phone" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <div>
                                            <button type="button" class="btn remove-item p-0" onclick=""><i
                                            class="bi bi-trash3 text-danger"></i></button>
                                                <label class="numlabel" for="">{{$noAdmin++}}.</label>
                                                <input class="item1" type="text" name="nama_item_admin[{{ $loop->index }}][]" class=""
                                                    value="Yeaster S20 IP PBX" required>
                                                <input class="iteminput" name="quantity_admin[{{ $loop->index }}][]" type="number"
                                                    min="0" value="1" required>
                                            </div>
                                            <button class="itembutton btn btn-sm">+ New Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
            @endforeach
        </div>
        <br>

        <div class="formrambu">
            <div class="rambuheader">
                <label class="bolder" for="">Rambu Parkir(*) + Lalu-Lintas + Estetika</label>
            </div>
            <div class="rambu">
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text" value="RAMBU TARIF IN/OUT (60x120) PLAT"
                        required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text"
                        value="RAMBU PARKIR PLAT (50x70) 1 MUKA + TIANG" required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text"
                        value="RAMBU PARKIR PLAT (50x70) 2 MUKA + TIANG" required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text"
                        value="RAMBU PARKIR GANTUNG PLAT (160x30) 1 MUKA RANTAI" required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text"
                        value="RAMBU PARKIR GANTUNG PLAT (80x30) 1 MUKA RANTAI" required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text"
                        value="RAMBU PARKIR GANTUNG PLAT (80x30) 2 MUKA RANTAI" required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text" value="RAMBU DISCLAIMER (60x65) PLAT"
                        required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text"
                        value="RAMBU BATAS KETINGGIAN (200x30) PLAT" required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text" value="SAFETY POLE TAPAK COR" required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text" value="TRAFFIC CONE + STIKER" required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <div>
                <button type="button" class="btn remove-item p-0" onclick=""><i
                                                class="bi bi-trash3 text-danger"></i></button>
                    <label class="numlabel" for="">{{$noRambu++}}.</label>
                    <input class="item1" name="nama_item_rambu[]" type="text" value="TALI TAMBANG (1 ROL = 200 Meter)"
                        required>
                    <input class="iteminput" name="quantity_rambu[]" type="number" min="0" value="1" required>
                </div>
                <button class="itembutton btn btn-sm">+ New Item</button>
            </div>
        </div><br>
        <button type="submit" class="submitbutton btn my-3" style="margin-left: 10px;">Submit</button>
    </form>
    </main>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', function () {
                    const itemDiv = this.closest('div');
                    if (itemDiv) {
                        itemDiv.remove();
                    }
                });
            });

            document.querySelectorAll('.entry-access .itembutton, .exit-access .itembutton, .admin .itembutton').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const lastItem = this.previousElementSibling;
                    const newItem = lastItem.cloneNode(true);

                    newItem.querySelectorAll('input').forEach(input => {
                        input.value = '';
                    });

                    const removeButton = newItem.querySelector('.remove-item');
                    removeButton.addEventListener('click', function () {
                        this.closest('div').remove();
                    });

                    this.parentNode.insertBefore(newItem, this);
                });
            });

            const rambuButton = document.querySelector('.rambu .itembutton');
            if (rambuButton) {
                rambuButton.addEventListener('click', function (e) {
                    e.preventDefault();
                    const lastItem = this.previousElementSibling;
                    const newItem = lastItem.cloneNode(true);

                    newItem.querySelectorAll('input').forEach(input => {
                        input.value = '';
                    });

                    const removeButton = newItem.querySelector('.remove-item');
                    removeButton.addEventListener('click', function () {
                        this.closest('div').remove();
                    }); f

                    this.parentNode.insertBefore(newItem, this);
                });
            }
        });

        function remove_admin_item() {
            let form =
                document.getElementById("admin");
            form.parentNode.removeChild(admin);
        }
    </script>
</body>

</html>