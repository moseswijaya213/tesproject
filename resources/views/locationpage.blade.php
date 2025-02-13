<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Location Page</title>
   <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="locationpage">
   @extends('Layouts.app')
   @section('content')

   <div class="homeheader">
      <h1 class="bolder">Location {{ $project_name }}</h1>
   </div>

   <main>
      <div class="d-flex">
         <div class="card rounded-5 location-label" style="">
            <div class="ms-3">
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
         </div>
         <div class="card rounded-5 flex-nowrap location-label" style="margin-left: 50px;">
            <div class="ms-3">
               <div class="row">
                  <div class="col-4 fw-bold">
                     Sistem Operasional
                  </div>
                  <div class="col">
                     : {{$sistem_operasional}}
                  </div>
               </div>
               <div class="row">
                  <div class="col-4 fw-bold">
                     Cashflow
                  </div>
                  <div class="col">
                     : {{$cashflow}}
                  </div>
               </div>
               <div class="row">
                  <div class="col-4 fw-bold">
                     Jenis Kerjasama
                  </div>
                  <div class="col">
                     : {{$jenis_kerjasama}}
                  </div>
               </div>
               <div class="row">
                  <div class="col-4 fw-bold">
                     Status Asset
                  </div>
                  <div class="col">
                     : {{$status_asset}}
                  </div>
               </div>
               <div class="row">
                  <div class="col-4 fw-bold">
                     Bidang Usaha
                  </div>
                  <div class="col">
                     : {{$bidang_usaha}}
                  </div>
               </div>
               <div class="row flex-nowrap">
                  <div class="col-4 fw-bold">
                     Project Category
                  </div>
                  <div class="col">
                     : {{$project_category}}
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>

      <div class="row p-1 mb-3 d-flex" style="width: auto; height: auto; align-items: center;">
         <div style="width: 170px;">
            <button type="button" class="btn submitbutton px-3" data-bs-toggle="modal"
               data-bs-target="#ChecklistModal">View
               Checklist</button>
         </div>

         <div style="width: 500px;">
            @if ($task->where('project_code', $project_code)->isEmpty())
            <button type="button" class="btn submitbutton px-3" data-bs-toggle="modal"
               data-bs-target="#CreateTaskModal">Create
               Tasks</button>
         @else
         Task : {{$countFinishedTasksProject}} (Done) of {{$countTasksProject}}<br>
         <div class="progress" style="width: 430px;">
            <div class="progress-bar bg-success" role="progressbar" style="width: {{$totalprogress}}%;"
              aria-valuenow="{{$totalprogress}}" aria-valuemin="0" aria-valuemax="100">
              {{$progressDisplay}}%
            </div>
         </div>
      @endif
         </div>
      </div>

      <div>
         @php
         $kantong = $kantongs->where('project_code', $project_code);
         @endphp
         @foreach ($kantong as $k)
                @php
               $tasks = $task->where('nama_kantong', $k->nama_kantong)
                 ->where('project_code', $project_code)
                 ->groupBy('nama_access');
              @endphp
                <div class="card rounded-5 px-4" style="max-width: 1000px;">
                  <h3 class="ms-3"><strong>Task Kantong {{$k->nama_kantong}}</strong></h3><br>
                  @foreach ($tasks as $nama_access => $taskGroup)
                    @php
                   $totalTasks = count($taskGroup);
                   $finishedTasks = $taskGroup->whereIn('status', ['Finished', 'Tidak ada pekerjaan'])->count();
                   $progress = $totalTasks > 0 ? ($finishedTasks / $totalTasks) * 100 : 0;
                   $progressDisplay = number_format($progress, 2, ',', '');
               @endphp
                    <div class="card rounded-5 shadow-sm mb-4 px-4 py-2" style="width: auto;">
                      <div class="py-2">
                        <strong>{{$nama_access}}</strong>
                        <div class="progress">
                         <div class="progress-bar bg-success" role="progressbar" style="width: {{$progress}}%;"
                           aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100">
                           {{$progressDisplay}}%
                         </div>
                        </div>
                      </div>
                      <table class="table table-hover mt-3" style="border-collapse: collapse; border: 1px solid #b3b3b3;">
                        <thead>
                         <tr class="table-secondary">
                           <th style="width: 30px;">No</th>
                           <th style="width: 250px;">Task</th>
                           <th style="width: 220px;">Nama Gate</th>
                           <th>Bukti Pekerjaan</th>
                           <th>Action</th>
                         </tr>
                        </thead>
                        <tbody>
                         @php        
                        $no = 1; 
                  @endphp
                         @foreach ($taskGroup as $t)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$t->task}}</td>
                        <td>{{$t->nama_gate}}</td>
                        <td>
                           @if ($t->status != 'Tidak ada pekerjaan')
                              @if ($t->status == 'In Progress')
                                 <a href="{{ asset('storage/bukti_pekerjaan/' . $t->bukti_pekerjaan) }}"
                                 class="btn submitbutton btn-sm" target="_blank"><i class="bi bi-images me-1"></i> View Image</a><i class="bi bi-x-square ms-3" style="color:rgb(161, 28, 18);"></i>
                              @elseif($t->status == 'Finished')
                                 <a href="{{ asset('storage/bukti_pekerjaan/' . $t->bukti_pekerjaan) }}"
                                 class="btn submitbutton btn-sm" target="_blank"><i class="bi bi-images me-1"></i> View Image</a>
                              @endif
                           @else
                              <label for="" class="rounded-5 p-1">Tidak ada pekerjaan</label>
                           @endif
                        </td>
                        <td>
                           @if ($t->status != 'Finished' && $t->status != 'Tidak ada pekerjaan')
                           <button type="button" class="btn submitbutton btn-sm edit-item-btn" data-bs-toggle="modal"
                          data-bs-target="#UpdateTaskModal" data-name-access="{{$nama_access}}"
                          data-task="{{$t->task}}" data-id-task="{{$t->id_task}}"><i
                           class="bi bi-pencil me-1"></i>Update</button>
                           @else
                           <i class="bi bi-check2-square ms-3" style="color: #12a150;"></i>
                           @endif
                        </td>
                      </tr>
                   @endforeach
                        </tbody>
                      </table>
                    </div>
              @endforeach
                </div>
                <br>
       @endforeach
      </div>

      <div class="modal fade modal-xl" id="CreateTaskModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h1 class="modal-title" id="exampleModalLabel">Create Tasks</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form action="{{route('create.task')}}" method="POST">
                     @csrf
                     @foreach ($kantongs as $index => $kantong)
                                  <div class="fw-bold">{{ $kantong->nama_kantong }}</div>
                                  @php
                            $Access = $accessData->where('nama_kantong', $kantong->nama_kantong)->where('project_code', $project_code);
                            $no = 1;
                            $index += 0;
                        @endphp
                                  @foreach ($Access as $access)
                             @for ($i = 1; $i <= $access->entry_access; $i++)
                         Access Entry {{ $access->jenis_kendaraan}} No [{{ $i }}]<br>
                         @for ($j = 1; $j <= 4; $j++)
                      <div class="d-none">
                       <input type="text" name="project_code[]" value="{{$project_code}}">
                       <input type="text" name="nama_kantong[]" value="{{$kantong->nama_kantong}}">
                       <input type="text" name="nama_access[]"
                        value="Access Entry {{ $access->jenis_kendaraan}} No [{{ $i }}]">
                       @if ($j == 1)
                     <input type="text" name="task[]" value="Instalasi Client Gate"><br>
                  @elseif ($j == 2)
                  <input type="text" name="task[]" value="Instalasi Intercom"><br>
               @elseif ($j == 3)
               <input type="text" name="task[]" value="Instalasi ipcam nopol/wajah"><br>
            @elseif ($j == 4)
               <input type="text" name="task[]" value="Trial System"><br>
            @endif
                      </div>
                   @endfor
                      @endfor

                             @for ($i = 1; $i <= $access->exit_access; $i++)
                         Access Exit {{ $access->jenis_kendaraan}} No [{{ $i }}]<br>
                         @for ($j = 1; $j <= 4; $j++)
                      <div class="d-none">
                       <input type="text" name="project_code[]" value="{{$project_code}}">
                       <input type="text" name="nama_kantong[]" value="{{$kantong->nama_kantong}}">
                       <input type="text" name="nama_access[]"
                        value="Access Exit {{ $access->jenis_kendaraan}} No [{{ $i }}]">
                       @if ($j == 1)
                     <input type="text" name="task[]" value="Instalasi Client Gate"><br>
                  @elseif ($j == 2)
                  <input type="text" name="task[]" value="Instalasi Intercom"><br>
               @elseif ($j == 3)
               <input type="text" name="task[]" value="Instalasi ipcam nopol/wajah"><br>
            @elseif ($j == 4)
               <input type="text" name="task[]" value="Trial System"><br>
            @endif
                      </div>
                   @endfor
                      @endfor
                          @endforeach
                                  <div id="add-admin-task-{{ $index }}" data-nama-kantong="{{ $kantong->nama_kantong }}">
                                    <button class="btn btn-sm btn-secondary" type="button" onclick="addAdminTask({{ $index }})">Add
                                       Admin
                                       Task</button>
                                  </div><br>
                @endforeach
                     <br>
                     <button class="btn submitbutton" type="submit">Create Task</button>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="ChecklistModal">
         <div class="modal-dialog modal-xl">
            <div class="modal-content">
               <form method="post">
                  @csrf
                  @method('PUT')
                  <div class="modal-header float-right">
                     <h2 class="fw-bold">Item Checklist [{{$totalItemSesuaiCount}}] of [{{$totalItemCount}}]</h2>
                  </div>
                  <div class="modal-body">
                     @php
                  $no = 1;
                 @endphp
                     <table id="myDataTable" class="table table-hover"
                        style="max-width: 1500px; border-collapse: collapse; border: 1px solid #b3b3b3;"">
                        <thead>
                           <tr class=" table-secondary">
                        <th>No</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Kategori</th>
                        <th>Kantong</th>
                        <th>Bukti</th>
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
                                   <tr class="{{ $entry->status == 'Tidak Sesuai' ? 'table-danger' : ''}}">
                                    <td>{{$no++}}</td>
                                    <td>{{$entry->nama_item}}</td>
                                    <td>{{$entry->quantity}}</td>
                                    <td>Entry</td>
                                    <td>{{ $kantong->nama_kantong }}</td>
                                    <td>
                                      @if ($entry->bukti_foto != null)
                                <a href="{{ asset('storage/bukti_foto/' . $entry->bukti_foto) }}"
                                 class="btn submitbutton btn-sm" target="_blank"><i class="bi bi-images me-1"></i>
                                 View
                                 Image</a>
                             @endif
                                    </td>
                                    <td>
                                      <button type="button" class="btn submitbutton btn-sm edit-item-btn"
                                       data-bs-toggle="modal" data-bs-target="#UpdateItemEntryModal"
                                       data-item-name-entry="{{$entry->nama_item}}"
                                       data-quantity-entry="{{$entry->quantity}}" data-id-entry="{{$entry->id_entry}}">
                                       <i class="bi bi-pencil me-1"></i>Update
                                      </button>
                                    </td>
                                   </tr>
                                @endforeach
                                          @foreach ($itemExit as $exit)
                                   <tr class="{{ $exit->status == 'Tidak Sesuai' ? 'table-danger' : ''}}">
                                    <td>{{$no++}}</td>
                                    <td>{{$exit->nama_item}}</td>
                                    <td>{{$exit->quantity}}</td>
                                    <td>Exit</td>
                                    <td>{{ $kantong->nama_kantong }}</td>
                                    <td>
                                      @if ($exit->bukti_foto != null)
                                <a href="{{ asset('storage/bukti_foto/' . $exit->bukti_foto) }}"
                                 class="btn submitbutton btn-sm" target="_blank"><i class="bi bi-images me-1"></i>
                                 View
                                 Image</a>
                             @endif
                                    </td>
                                    <td>
                                      <button type="button" class="btn submitbutton btn-sm edit-item-btn"
                                       data-bs-toggle="modal" data-bs-target="#UpdateItemExitModal"
                                       data-item-name-exit="{{$exit->nama_item}}" data-quantity-exit="{{$exit->quantity}}"
                                       data-id-exit="{{$exit->id_exit}}"><i class="bi bi-pencil me-1"></i>
                                       Update
                                      </button>
                                    </td>
                                   </tr>
                                @endforeach
                                          @foreach ($itemAdmin as $admin)
                                   <tr class="{{ $admin->status == 'Tidak Sesuai' ? 'table-danger' : ''}}">
                                    <td>{{$no++}}</td>
                                    <td>{{$admin->nama_item}}</td>
                                    <td>{{$admin->quantity}}</td>
                                    <td>Admin</td>
                                    <td>{{ $kantong->nama_kantong }}</td>
                                    <td>
                                      @if ($admin->bukti_foto != null)
                                <a href="{{ asset('storage/bukti_foto/' . $admin->bukti_foto) }}"
                                 class="btn submitbutton btn-sm" target="_blank"><i class="bi bi-images me-1"></i>
                                 View
                                 Image</a>
                             @endif
                                    </td>
                                    <td>
                                      <button type="button" class="btn submitbutton btn-sm edit-item-btn"
                                       data-bs-toggle="modal" data-bs-target="#UpdateItemAdminModal"
                                       data-item-name-admin="{{$admin->nama_item}}"
                                       data-quantity-admin="{{$admin->quantity}}" data-id-admin="{{$admin->id_admin}}">
                                       <i class="bi bi-pencil me-1"></i>Update
                                      </button>
                                    </td>
                                   </tr>
                                @endforeach
                     @endforeach
                           @php
                     $itemRambu = $itemRambus->where('project_code', $project_code);
                   @endphp
                           @foreach ($itemRambu as $rambu)
                        <tr class="{{ $rambu->status == 'Tidak Sesuai' ? 'table-danger' : ''}}">
                          <td>{{$no++}}</td>
                          <td>{{$rambu->nama_item}}</td>
                          <td>{{$rambu->quantity}}</td>
                          <td>Rambu</td>
                          <td>-</td>
                          <td>
                            @if ($rambu->bukti_foto != null)
                        <a href="{{ asset('storage/bukti_foto/' . $rambu->bukti_foto) }}"
                          class="btn submitbutton btn-sm" target="_blank"><i class="bi bi-images me-1"></i>
                          View
                          Image</a>
                     @endif
                          </td>
                          <td>
                            <button type="button" class="btn submitbutton btn-sm edit-item-btn"
                              data-bs-toggle="modal" data-bs-target="#UpdateItemRambuModal"
                              data-item-name-rambu="{{$rambu->nama_item}}"
                              data-quantity-rambu="{{$rambu->quantity}}" data-id-rambu=" {{$rambu->id_rambu}}">
                              <i class="bi bi-pencil me-1"></i>Update
                            </button>
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
      <div class="modal fade" id="UpdateItemEntryModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Edit Item Entry</h5>
               </div>
               <form method="POST" action="{{ route('update.item.entry')}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                     <input type="hidden" id="id_entry" name="id_entry">
                     <div>
                        <label for="nama_item" class="form-label">Nama Item:</label>
                        <input type="text" class="form-control" id="nama_item_entry" name="nama_item">
                     </div>
                     <div>
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" id="quantity_entry" name="quantity">
                     </div>
                     <div>
                        <label for="bukti" class="form-label">Bukti Foto:</label>
                        <input type="file" class="form-control" id="bukti" name="bukti_foto" required>
                     </div>
                     <div>
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" id="status" name="status">
                           <option value="Tidak Sesuai">Tidak Sesuai</option>
                           <option value="Sesuai">Sesuai</option>
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
      <div class="modal fade" id="UpdateItemExitModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Edit Item Exit</h5>
               </div>
               <form method="POST" action="{{ route('update.item.exit')}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                     <input type="hidden" class="form-control" id="id_exit" name="id_exit">
                     <div>
                        <label for="nama_item" class="form-label">Nama Item:</label>
                        <input type="text" class="form-control" id="nama_item_exit" name="nama_item">
                     </div>
                     <div>
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" id="quantity_exit" name="quantity">
                     </div>
                     <div>
                        <label for="bukti" class="form-label">Bukti Foto:</label>
                        <input type="file" class="form-control" id="bukti" name="bukti_foto" required>
                     </div>
                     <div>
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" id="status" name="status">
                           <option value="Tidak Sesuai">Tidak Sesuai</option>
                           <option value="Sesuai">Sesuai</option>
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
      <div class="modal fade" id="UpdateItemAdminModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Edit Item Admin</h5>
               </div>
               <form method="POST" action="{{ route('update.item.admin')}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                     <input type="hidden" class="form-control" id="id_admin" name="id_admin">
                     <div>
                        <label for="nama_item" class="form-label">Nama Item:</label>
                        <input type="text" class="form-control" id="nama_item_admin" name="nama_item">
                     </div>
                     <div>
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" id="quantity_admin" name="quantity">
                     </div>
                     <div>
                        <label for="bukti" class="form-label">Bukti Foto:</label>
                        <input type="file" class="form-control" id="bukti" name="bukti_foto" required>
                     </div>
                     <div>
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" id="status" name="status">
                           <option value="Tidak Sesuai">Tidak Sesuai</option>
                           <option value="Sesuai">Sesuai</option>
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
      <div class="modal fade" id="UpdateItemRambuModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Edit Item Rambu</h5>
               </div>
               <form method="POST" action="{{ route('update.item.rambu')}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                     <input type="hidden" class="form-control" id="id_rambu" name="id_rambu">
                     <div>
                        <label for="nama_item" class="form-label">Nama Item:</label>
                        <input type="text" class="form-control" id="nama_item_rambu" name="nama_item">
                     </div>
                     <div>
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" id="quantity_rambu" name="quantity">
                     </div>
                     <div>
                        <label for="bukti" class="form-label">Bukti Foto:</label>
                        <input type="file" class="form-control" id="bukti" name="bukti_foto" required>
                     </div>
                     <div>
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" id="status" name="status">
                           <option value="Tidak Sesuai">Tidak Sesuai</option>
                           <option value="Sesuai">Sesuai</option>
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
      <div class="modal fade" id="UpdateTaskModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Update Task Progress</h5>
               </div>
               <form method="POST" action="{{ route('update.task')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                     <div>
                        <input type="hidden" name="id_task" id="idtask">
                        <div>
                           <label for="nama_task" class="form-label">Nama Task:</label>
                           <input type="text" class="form-control" name="task" id="nama_task" required>
                        </div>
                     </div>
                     <div class="d-none">
                        <label for="nama_item" class="form-label">Nama Access:</label>
                        <input type="text" class="form-control" name="nama_access" id="nama_akses" required>
                     </div>
                     <div>
                        <label for="nama_item" class="form-label">Nama gate:</label>
                        <input type="text" class="form-control" name="nama_gate" required>
                     </div>
                     <div>
                        <label for="bukti" class="form-label">Bukti Pekerjaan:</label>
                        <input type="file" class="form-control" name="bukti_pekerjaan" id="bukti">
                     </div>
                     <div>
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" name="status">
                           <option value="In Progress">In Progress</option>
                           <option value="Finished">Finished</option>
                           <option value="Tidak ada pekerjaan">Tidak ada pekerjaan</option>
                        </select>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      @if ($errors->any())
        <div class="toast-container position-fixed top-0 end-0">
          @foreach ($errors->all() as $error)
           <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
               <strong class="me-auto">Error</strong>
               <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
               {{ $error }}
            </div>
           </div>
        @endforeach
        </div>
     @endif
   </main>

   @endsection
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script>
      document.addEventListener('DOMContentLoaded', function () {
         const statusSelect = document.getElementById('status');
         const fileInput = document.getElementById('bukti');

         statusSelect.addEventListener('change', function () {
            if (this.value === "Tidak ada pekerjaan") {
               fileInput.removeAttribute('required');
            } else {
               fileInput.setAttribute('required', 'required');
            }
         });
      });

      function addAdminTask(index) {
         const accessList = document.getElementById(`add-admin-task-${index}`);
         const namaKantong = accessList.getAttribute('data-nama-kantong');
         const newAdminTask = document.createElement('div');
         newAdminTask.className = '';

         newAdminTask.innerHTML = `
        <div>
    Access Admin ${namaKantong}<br>
    @if($kantongs->get($index))
            @php   $kantong = $kantongs->get($index); @endphp
            <div class="d-none">
            @for ($k = 1; $k <= 5; $k++)
                       <input type="text" name="project_code[]" value="{{ $project_code }}">
                       <input type="text" name="nama_kantong[]" value="${namaKantong}">
                       <input type="text" name="nama_access[]" value="Access Admin ${namaKantong}">
                       @if ($k == 1)
                   <input type="text" name="task[]" value="Instalasi pc server"><br>
                @elseif ($k == 2)
                <input type="text" name="task[]" value="Instalasi pc admin"><br>
            @elseif ($k == 3)
            <input type="text" name="task[]" value="Instalasi pc remote"><br>
           @elseif ($k == 4)
           <input type="text" name="task[]" value="Instalasi granstream/ip phone"><br>
         @elseif ($k == 5)
            <input type="text" name="task[]" value="Instalasi NVR/CCTV"><br>
        @endif
         @endfor
            </div>
    @else
       <p>Error: Kantong tidak ditemukan untuk indeks {{ $index }}</p>
   @endif
</div>

    `;

         accessList.appendChild(newAdminTask);
         const button = accessList.querySelector('button');
         button.disabled = true;
         button.style.display = 'none';

      }
   </script>

   <script>
      document.addEventListener('DOMContentLoaded', function () {
         const editButtons = document.querySelectorAll('.edit-item-btn');

         editButtons.forEach(button => {
            button.addEventListener('click', function () {
               const itemEntry = this.getAttribute('data-item-name-entry');
               const itemExit = this.getAttribute('data-item-name-exit');
               const itemAdmin = this.getAttribute('data-item-name-admin');
               const itemRambu = this.getAttribute('data-item-name-rambu');

               const namaAccess = this.getAttribute('data-name-access');
               const namaTask = this.getAttribute('data-task');

               const quantityEntry = this.getAttribute('data-quantity-entry');
               const quantityExit = this.getAttribute('data-quantity-exit');
               const quantityAdmin = this.getAttribute('data-quantity-admin');
               const quantityRambu = this.getAttribute('data-quantity-rambu');

               const idEntry = this.getAttribute('data-id-entry');
               const idExit = this.getAttribute('data-id-exit');
               const idAdmin = this.getAttribute('data-id-admin');
               const idRambu = this.getAttribute('data-id-rambu');
               const idTask = this.getAttribute('data-id-task');

               document.getElementById('nama_item_entry').value = itemEntry;
               document.getElementById('nama_item_exit').value = itemExit;
               document.getElementById('nama_item_admin').value = itemAdmin;
               document.getElementById('nama_item_rambu').value = itemRambu;

               document.getElementById('nama_akses').value = namaAccess;
               document.getElementById('nama_task').value = namaTask;

               document.getElementById('quantity_entry').value = quantityEntry;
               document.getElementById('quantity_exit').value = quantityExit;
               document.getElementById('quantity_admin').value = quantityAdmin;
               document.getElementById('quantity_rambu').value = quantityRambu;

               document.getElementById('id_entry').value = idEntry;
               document.getElementById('id_exit').value = idExit;
               document.getElementById('id_admin').value = idAdmin;
               document.getElementById('id_rambu').value = idRambu;
               document.getElementById('idtask').value = idTask;
            });
         });
      });
   </script>
</body>

</html>