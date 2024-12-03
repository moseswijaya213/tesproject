<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Active Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="locationpage">
    @extends('Layouts.app')

    @section('content')
    <h1 class="bolder">Location {{ $project_name }}</h1>

    <div class="d-flex">
        <div class="card" style="width: 600px;">
            <div class="row">
                <div class="col-3 fw-bold">
                    Nama project
                </div>
                <div class="col">
                    : {{$project_name}}
                </div>
            </div>
            <div class="row">
                <div class="col-3 fw-bold">
                    Project Code
                </div>
                <div class="col">
                    : {{$project_code}}
                </div>
            </div>
            <div class="row">
                <div class="col-3 fw-bold">
                    Perusahaan
                </div>
                <div class="col">
                    : {{$perusahaan}}
                </div>
            </div>
            <div class="row">
                <div class="col-3 fw-bold">
                    Target Live
                </div>
                <div class="col">
                    : {{$target_live_project}}
                </div>
            </div>
            <div class="row">
                <div class="col-3 fw-bold">
                    PIC
                </div>
                <div class="col">
                    : {{$pic}}
                </div>
            </div>
            <div class="row">
                <div class="col-3 fw-bold">
                    Alamat
                </div>
                <div class="col">
                    : {{$alamat}}
                </div>
            </div>
        </div>

        <div class="card flex-nowrap" style="margin-left: 50px; width: 600px;">
            <div class="d-flex">
                <div class="col-3 fw-bold">
                    Sistem Operasional
                </div>
                <div class="col">
                    : {{$sistem_operasional}}
                </div>
            </div>
            <div class="row">
                <div class="col-3 fw-bold">
                    Cashflow
                </div>
                <div class="col">
                    : {{$cashflow}}
                </div>
            </div>
            <div class="row">
                <div class="col-3 fw-bold">
                    Jenis Kerjasama
                </div>
                <div class="col">
                    : {{$jenis_kerjasama}}
                </div>
            </div>
            <div class="row">
                <div class="col-3 fw-bold">
                    Status Asset
                </div>
                <div class="col">
                    : {{$status_asset}}
                </div>
            </div>
            <div class="row">
                <div class="col-3 fw-bold">
                    Bidang Usaha
                </div>
                <div class="col">
                    : {{$bidang_usaha}}
                </div>
            </div>
            <div class="row flex-nowrap">
                <div class="col-3 fw-bold">
                    Project Category
                </div>
                <div class="col">
                    : {{$project_category}}
                </div>
            </div>
        </div>
    </div><br>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ChecklistModal">View
        Checklist</button><br><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error) 
                {{ $error }}
            @endforeach
        </div>
    @endif

    <div class="card">
        <p style="font-weight: bold;">Task Access Kantong Parkir</p>
        <hr>
        @foreach ($kantongs as $kantong)
                        <div>{{ $kantong->nama_kantong }}</div>

                        @php
                            $Access = $accessData->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                            $no = 1;
                        @endphp

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Access</th>
                                    <th>Task</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            @foreach ($Access as $access)

                                @for ($i = 1; $i <= $access->entry_access; $i++)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>Access {{ $access->jenis_kendaraan }} Entry [{{$i}}]</td>
                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#EntryTaskModal">View Task</button></td>
                                    </tr>
                                @endfor

                                @for ($i = 1; $i <= $access->exit_access; $i++)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>Access {{ $access->jenis_kendaraan }} Exit [{{$i}}]</td>
                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#ExitTaskModal">View Task</button></td>
                                    </tr>
                                @endfor
                                </tbody>
                            @endforeach
                        </table>
                        <br>
        @endforeach
    </div>

    <div class="modal fade" id="ChecklistModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <form method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-header float-right">
                        <h4>Item Checklist</h4>
                        <button style="margin-left: 1650px;" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @php
                            $no = 1;
                        @endphp
                        <table id="myDataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">No</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Kategori</th>
                                    <th>Kantong Parkir</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kantongs as $kantong)
                                                                                                @php
                                                                                                    $itemEntry = $itemEntries->where(
                                                                                                        'nama_kantong',
                                                                                                        $kantong->nama_kantong
                                                                                                    )->where('project_code', $project_code);
                                                                                                    $itemExit = $itemExits->where(
                                                                                                        'nama_kantong',
                                                                                                        $kantong->nama_kantong
                                                                                                    )->where('project_code', $project_code);
                                                                                                    $itemAdmin = $itemAdmins->where(
                                                                                                        'nama_kantong',
                                                                                                        $kantong->nama_kantong
                                                                                                    )->where('project_code', $project_code);
                                                                                                @endphp

                                                                                                @foreach ($itemEntry as $entry)
                                                                                                    <tr>
                                                                                                        <td>{{$no++}}</td>
                                                                                                        <td>{{$entry->nama_item}}</td>
                                                                                                        <td>{{$entry->quantity}}</td>
                                                                                                        <td>Entry</td>
                                                                                                        <td>{{ $kantong->nama_kantong }}</td>
                                                                                                        <td></td>
                                                                                                        <td>
                                                                                                            @if ($entry->status == null)
                                                                                                                Pending
                                                                                                            @else
                                                                                                                {{$entry->status}}
                                                                                                            @endif
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                                                                                                data-bs-toggle="modal" data-bs-target="#UpdateItemModal"
                                                                                                                data-item-name="{{$entry->nama_item}}" data-quantity="{{$entry->quantity}}"
                                                                                                                data-item-id="{{$entry->id}}" data-item-type="entry">
                                                                                                                Update
                                                                                                            </button>
                                                                                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach

                                                                                                @foreach ($itemExit as $exit)
                                                                                                    <tr>
                                                                                                        <td>{{$no++}}</td>
                                                                                                        <td>{{$exit->nama_item}}</td>
                                                                                                        <td>{{$exit->quantity}}</td>
                                                                                                        <td>Exit</td>
                                                                                                        <td>{{ $kantong->nama_kantong }}</td>
                                                                                                        <td></td>
                                                                                                        <td></td>
                                                                                                        <td>
                                                                                                            <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                                                                                                data-bs-toggle="modal" data-bs-target="#UpdateItemModal"
                                                                                                                data-item-name="{{$exit->nama_item}}" data-quantity="{{$exit->quantity}}"
                                                                                                                data-item-id="{{$exit->id}}" data-item-type="exit">
                                                                                                                Update
                                                                                                            </button>
                                                                                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach

                                                                                                @foreach ($itemAdmin as $admin)
                                                                                                    <tr>
                                                                                                        <td>{{$no++}}</td>
                                                                                                        <td>{{$admin->nama_item}}</td>
                                                                                                        <td>{{$admin->quantity}}</td>
                                                                                                        <td>Admin</td>
                                                                                                        <td>{{ $kantong->nama_kantong }}</td>
                                                                                                        <td></td>
                                                                                                        <td></td>
                                                                                                        <td>
                                                                                                            <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                                                                                                data-bs-toggle="modal" data-bs-target="#UpdateItemModal"
                                                                                                                data-item-name="{{$admin->nama_item}}" data-quantity="{{$admin->quantity}}"
                                                                                                                data-item-id="{{$admin->id}}" data-item-type="admin">
                                                                                                                Update
                                                                                                            </button>
                                                                                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endforeach
                                @endforeach

                                @php
                                    $itemRambu = $itemRambus->where('project_code', $project_code);
                                @endphp
                                @foreach ($itemRambu as $rambu)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$rambu->nama_item}}</td>
                                        <td>{{$rambu->quantity}}</td>
                                        <td>Rambu</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                                data-bs-toggle="modal" data-bs-target="#UpdateItemModal"
                                                data-item-name="{{$rambu->nama_item}}" data-quantity="{{$rambu->quantity}}"
                                                data-item-id=" {{$rambu->id}}" data-item-type="rambu">
                                                Update
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="UpdateItemModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Item</h5>
                </div>
                <form method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div>
                            <label for="nama_item" class="form-label">Nama Item:</label>
                            <input type="text" class="form-control" id="nama_item" name="nama_item">
                        </div>
                        <div>
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div>
                            <label for="bukti" class="form-label">Bukti Foto:</label>
                            <input type="file" class="form-control" id="bukti" name="bukti_foto" required>
                        </div>
                        <div>
                            <label for="status" class="form-label">Status:</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Sesuai">Sesuai</option>
                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="EntryTaskModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-header float-right">
                        <h4>Task</h4>
                        <button style="margin-left: 1650px;" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Task</th>
                                <th>Bukti Pekerjaan</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Instalasi pc server</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Instalasi pc admin</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Instalasi pc remote</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Instalasi granstream/ip phone</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Instalasi NVR/CCTV</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ExitTaskModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-header float-right">
                        <h4>Task</h4>
                        <button style="margin-left: 1650px;" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Task</th>
                                <th>Bukti Pekerjaan</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Instalasi pc server</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Instalasi pc admin</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Instalasi pc remote</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Instalasi granstream/ip phone</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Instalasi NVR/CCTV</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-item-btn"
                                        data-bs-toggle="modal" data-bs-target="#UpdateTaskModal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="UpdateTaskModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Task Progress</h5>
                </div>
                <form method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div>
                            <label for="nama_item" class="form-label">Nama Task:</label>
                            <input type="text" class="form-control" name="task">
                        </div>
                        <div>
                            <label for="bukti" class="form-label">Bukti Pekerjaan:</label>
                            <input type="file" class="form-control" name="bukti_pekerjaan" required>
                        </div>
                        <div>
                            <label for="status" class="form-label">Value:</label>
                            <select class="form-select" name="value">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-item-btn');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const itemName = this.getAttribute('data-item-name');
                    const quantity = this.getAttribute('data-quantity');
                    const itemId = this.getAttribute('data-item-id');
                    const itemType = this.getAttribute('data-item-tFype');

                    document.getElementById('nama_item').value = itemName;
                    document.getElementById('quantity').value = quantity;
                    document.getElementById('item_id').value = itemId;
                    document.getElementById('item_type').value = itemType;
                });
            });
        });
    </script>
</body>

</html>