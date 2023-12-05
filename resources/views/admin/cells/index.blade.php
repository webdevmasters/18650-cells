@extends("admin.layouts.master")
@section('title')
    Cells
@endsection
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap  cells_table">
                                <thead>
                                <tr>
                                    <th>Model</th>
                                    <th>Brand</th>
                                    <th>Wrap color</th>
                                    <th>Ring color</th>
                                    <th>Capacity</th>
                                    <th>Tested</th>
                                    <th>Percent</th>
                                    <th>Resistance</th>
                                    <th>Current</th>
                                    <th>Price</th>
                                    <th>Sold</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($cells as $cell)
                                    <tr>
                                        <td>{{$cell->model}}</td>
                                        <td>{{$cell->brand}}</td>
                                        <td>
                                            <div class="col-auto">
                                                <div class="col-12 col-lg-auto" hidden>{{$cell->wrapColor->code}} </div>
                                                <label class="form-colorinput">
                                                    <input name="color" type="text" value="{{$cell->wrapColor->code}}" class="form-colorinput-input"/>
                                                    <span class="form-colorinput-color" style="background-color: {{$cell->wrapColor->code}};width: 60px;border-radius: 10%"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-auto">
                                                <div class="col-12 col-lg-auto" hidden>{{$cell->ringColor->code}} </div>
                                                <label class="form-colorinput">
                                                    <input name="color-rounded" type="text" value="{{$cell->ringColor->code}}" class="form-colorinput-input"/>
                                                    <span class="form-colorinput-color rounded-circle" style="background-color: {{$cell->ringColor->code}}"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{$cell->capacity}}</td>
                                        <td>{{$cell->tested_capacity}}</td>
                                        <td class="sort-progress" data-progress="{{$cell->remaining_capacity}}">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-lg-auto" hidden>{{$cell->remaining_capacity}}%
                                                </div>
                                                <div class="col">
                                                    <div class="progress" style="width: 5rem">
                                                        <div class="progress-bar"
                                                             style="width: {{$cell->remaining_capacity}}%"
                                                             role="progressbar"
                                                             aria-valuenow="{{$cell->remaining_capacity}}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"
                                                             aria-label="30% Complete">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$cell->resistance}}</td>
                                        <td>{{$cell->discharge_current}}</td>
                                        <td>{{$cell->price}}</td>
                                        <td>
                                            <div class="col-12 col-lg-auto" hidden>{{$cell->sold}}%</div>
                                            <label>
                                                <input class="form-check-input" type="checkbox" value="{{$cell->sold}}" onclick="sellCell('{{$cell->id}}','{{$cell->sold}}')"
                                                    @checked($cell->sold)>
                                            </label>
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($cell->created_at)->format('d/m/Y')}}</td>
                                        <td>{{\Carbon\Carbon::parse($cell->updated_at)->format('d/m/Y')}}</td>
                                        <td style="text-align: center">
                                            <ul class="list-unstyled hstack gap-1 mb-0" style="justify-content: center; ">
                                                <li>
                                                    <input type="hidden" name="id" id="{{$cell->id}}">
                                                    <a href="javascript:void(0);" onclick="editCell('{{$cell->id}}')" style="width: 34px; height: 34px" class="btn btn-warning">
                                                        <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form class="d-inline remove-cell-form" method="post">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="text" name="id" value="{{$cell->id}}" hidden/>
                                                        <button class="btn btn-danger" style="width: 34px; height: 34px"><i class="fa-solid fa-xmark fa-sm"></i></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Model</th>
                                    <th>Brand</th>
                                    <th>Wrap color</th>
                                    <th>Ring color</th>
                                    <th>Capacity</th>
                                    <th>Tested capacity</th>
                                    <th>Percent</th>
                                    <th>Resistance</th>
                                    <th>Current</th>
                                    <th>Price</th>
                                    <th>Sold</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="cell_form" method="post" action="{{route('admin.cells.store')}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">New cell</h5>
                        <div class="mb-3" style="margin-right: 180px;width: 250px;margin-top: 10px;">
                            <select class="form-select" id="modelDropdown">
                                @foreach($models as $id => $model)
                                    @if($loop->index===0)
                                        <option value="0">Choose model</option>
                                    @endif
                                    <option value="{{$id}}">{{$model}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id">
                    <input type="hidden" class="form-control" name="route" id="route" value="create">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Model</label>
                                    <input type="text" class="form-control" name="model" id="model" placeholder="Your model name" value="{{old('model')}}">
                                    @error('model')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Brand</label>
                                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Your brand name" value="{{old('brand')}}">
                                    @error('brand')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Capacity</label>
                                    <input type="text" class="form-control" name="capacity" id="capacity" placeholder="Your capacity" value="{{old('capacity')}}">
                                    @error('capacity')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tested capacity</label>
                                    <input type="text" class="form-control" name="tested_capacity" id="tested_capacity" placeholder="Your tested capacity"
                                           value="{{old('tested_capacity')}}">
                                    @error('tested_capacity')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Resistance</label>
                                    <input type="text" class="form-control" name="resistance" id="resistance" placeholder="Your resistance" value="{{old('resistance')}}">
                                    @error('resistance')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Discharge current</label>
                                    <input type="text" class="form-control" name="discharge_current" id="discharge_current" placeholder="Your discharge current"
                                           value="{{old('discharge_current')}}">
                                    @error('discharge_current')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Your price" value="{{old('price')}}">
                                    @error('price')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label class="form-label">Wrap color</label>
                                    <input type="color" class="form-control form-control-color" value="#0054a6" name="wrap_color" id="wrap_color"
                                           colorpick-eyedropper-active="false" title="Choose your wrap color">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label class="form-label">Ring color</label>
                                    <input type="color" class="form-control form-control-color" value="#0054a6" name="ring_color" id="ring_color"
                                           colorpick-eyedropper-active="false" title="Choose your ring color">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3" style="margin-top: 37px">
                                    <div class="mb-3">
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" name="sold" id="sold">
                                            <span class="form-check-label">Sold</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h3 class="card-title">Place image here</h3>
                                <input id="imagesUpload" type="file" class="filepond" name="image" data-max-file-size="5MB">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">Additional information</label>
                                    <textarea id="note" name="note" class="form-control" rows="1" value="{{old('note')}}"></textarea>
                                    @error('note')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
                        <button id="submitBtn" type="submit" class="btn btn-primary ms-auto">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts-bottom')
    @if (count($errors) > 0)
        <script type="text/javascript">
            $(document).ready(function () {
                $('#modal-report').modal('show');
            });
        </script>
    @endif
    <script type="text/javascript">

        $(document).ready(function () {

            toastr.options = {
                closeButton: false,
                preventDuplicates: true,
                "positionClass": "toast-top-center",
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 3000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            @if(Session::has('message'))
            toastr.success("{{ session('message') }}").css({"width": "500px"});
            @endif

            @if(Session::has('error'))
            toastr.error("{{ session('error') }}").css({"width": "500px"});
            @endif

            if (sessionStorage.getItem("message")) toastr.success(sessionStorage.getItem("message")).css({"width": "500px"});
            if (sessionStorage.getItem("error")) toastr.error(sessionStorage.getItem("error")).css({"width": "500px"});

            sessionStorage.clear();

            $('.cells_table').DataTable({
                "order": [11, 'asc'],
                initComplete: function () {
                    this.api()
                        .columns()
                        .every(function () {
                            let column = this;
                            let title = column.footer().textContent;
                            if (title !== 'Action' && title !== 'Percent' && title !== 'Wrap color' && title !== 'Ring color') {
                                // Create input element and add event listener
                                $('<input type="text" style="width: 100%; padding: 3px; box-sizing: border-box;" placeholder="Search ' + title + '" />')
                                    .appendTo($(column.footer()).empty())
                                    .on('keyup change clear', function () {
                                        if (column.search() !== this.value) {
                                            column.search(this.value).draw();
                                        }
                                    });
                            } else {
                                $('<span />').appendTo($(column.footer()).empty())
                            }
                        });
                },
                dom: "Bflrtip",
                buttons: ['colvis', 'excel'],
                // language: {
                //     "url": "/load/datatables/locale/"
                // },
                "autoWidth": false,
                "columnDefs": [{"visible": false, "targets": [4, 7, 11]},
                    {
                        className: "dt-center",
                        targets: [2, 3, 5, 6, 7, 8, 9, 10]
                    }, {
                        "width": "15",
                        "targets": [0, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                    }, {
                        "width": "60",
                        "targets": 1
                    }, {
                        "width": "30",
                        "targets": 2
                    }]
            });

            $('.cells_table tfoot tr').appendTo('.cells_table thead');

            $('#route').val('create');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".cell_form").on('submit', function (e) {
                if ($("input[name='route']").val() === 'edit') {
                    e.preventDefault();
                    updateCell($(this));
                } else {
                    e.preventDefault();
                    saveCell($(this));
                }
            });

            $(".remove-cell-form").submit(function (e) {
                e.preventDefault();
                removeCell($(this))
            });

            $('#modelDropdown').change(function () {
                findCellById($(this).val())
            });

            $('#modal-report').on('hidden.bs.modal', function (event) {
                $(".cell_form").trigger('reset');
                $(".cell_form").trigger('reset');
                $('#route').val('create');
                $('#submitBtn').html('Save');
                $('.modal-title').html('New cell');
            });

            $('#modal-report').on('show.bs.modal', function (event) {
                if ($('#submitBtn').html() === 'Save') $("#modelDropdown").removeClass('d-none');
                $('.invalid-feedback').remove();
            });
        });

        function sellCell(id, sold) {
            let data = JSON.stringify({
                id: id,
                sold: sold === "1" ? "0" : "1",
            });

            $.ajax({
                type: "POST",
                url: '{{url('/admin/cells/sell')}}' + '/' + data,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if (response['message']) sessionStorage.setItem("message", response['message'])
                    else sessionStorage.setItem("error", response['error'])
                    location.href = location.href;
                }
            })
        }

        function editCell(cellId) {
            $.ajax({
                type: "get",
                url: '{{url('/admin/cells')}}' + '/' + cellId + '/edit',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['error']) toastr.error(data['error']).css({"width": "500px"});
                    else {
                        $('#modal-report').modal('show');
                        $("#modelDropdown").addClass('d-none');
                        $('#route').val('edit');
                        $('#submitBtn').html('Update');
                        $('.modal-title').html('Update cell');
                        $('#id').val(data.id);
                        $('#model').val(data.model);
                        $('#brand').val(data.brand);
                        $('#capacity').val(data.capacity);
                        $('#price').val(data.price);
                        $('#discharge_current').val(data.discharge_current);
                        $('#resistance').val(data.resistance);
                        $('#wrap_color').val(data.wrap_color.code);
                        $('#ring_color').val(data.ring_color.code);
                        $('#sold').prop('checked', data.sold === 1);
                        $('#note').val(data.note);
                        $('#tested_capacity').val(data.tested_capacity);
                    }
                }
            });
        }

        function findCellById(cellId) {
            $.ajax({
                type: "get",
                url: '{{url('/admin/cells')}}' + '/' + cellId + '/edit',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['error']) toastr.error(data['error']).css({"width": "500px"});
                    else {
                        $('#model').val(data.model);
                        $('#brand').val(data.brand);
                        $('#capacity').val(data.capacity);
                        $('#price').val(data.price);
                        $('#discharge_current').val(data.discharge_current);
                        $('#wrap_color').val(data.wrap_color.code);
                        $('#ring_color').val(data.ring_color.code);
                    }
                }
            });
        }

        function saveCell(save_form) {
            $.ajax({
                type: "POST",
                url: '{{route('admin.cells.store')}}',
                data: save_form.serialize(),
                success: function (response) {
                    $('#modal-report').modal('hide');
                    $('#route').val('create');
                    if (response['message']) sessionStorage.setItem("message", response['message'])
                    else sessionStorage.setItem("error", response['error'])
                    window.location.reload();
                }, error: function (xhr, status, error) {
                    let errors = xhr.responseJSON.errors;
                    $('.invalid-feedback').remove();

                    // Display errors next to corresponding input fields
                    $.each(errors, function (field, messages) {
                        let input = $('[name="' + field + '"]');
                        input.after('<div class="invalid-feedback d-block">' + messages[0] + '</div>');
                    });
                }
            });
        }

        function updateCell(edit_form) {
            $.ajax({
                type: "POST",
                url: '{{route('admin.cells.update')}}',
                data: edit_form.serialize(),
                success: function (response) {
                    $('#modal-report').modal('hide');
                    $('#route').val('create');
                    if (response['message']) sessionStorage.setItem("message", response['message'])
                    else sessionStorage.setItem("error", response['error'])
                    window.location.reload();
                }, error: function (xhr, status, error) {
                    let errors = xhr.responseJSON.errors;
                    $('.invalid-feedback').remove();

                    // Display errors next to corresponding input fields
                    $.each(errors, function (field, messages) {
                        let input = $('[name="' + field + '"]');
                        input.after('<div class="invalid-feedback d-block">' + messages[0] + '</div>');
                    });
                }
            });
        }

        function removeCell(delete_form) {
            Swal.fire({
                title: '@lang('messages.book_remove')',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: '{{route('admin.cells.destroy')}}',
                        data: delete_form.serialize(),
                        success: function (response) {
                            if (response['message']) sessionStorage.setItem("message", response['message'])
                            else sessionStorage.setItem("error", response['error'])
                            window.location.reload();
                        },
                        error: function (xhr, error, response) {
                            if (response['error']) toastr.error(response['error']).css({"width": "500px"});
                        },
                    });
                }
            })
        }

        FilePond.registerPlugin(FilePondPluginImagePreview);

        $('#imagesUpload').filepond();

    </script>
@endsection
