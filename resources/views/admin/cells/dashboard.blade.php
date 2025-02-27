@extends("admin.layouts.master")
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-2">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                   stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                      d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"/><path
                                                      d="M12 3v3m0 12v3"/>
                                              </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">{{number_format($equipment, 2)}} Din</div>
                                            <div class="text-secondary">Equipment</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-2">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                   stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                      d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"/><path
                                                      d="M12 3v3m0 12v3"/>
                                              </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">{{number_format($batteries, 2)}} Din</div>
                                            <div class="text-secondary">Batteries</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-2">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-orange text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                   stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                      d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"/><path
                                                      d="M12 3v3m0 12v3"/>
                                              </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">{{number_format($kp, 2)}} Din</div>
                                            <div class="text-secondary">KP</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                   stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                      d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"/><path
                                                      d="M12 3v3m0 12v3"/>
                                              </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">{{number_format($income, 2)}} Din</div>
                                            <div class="text-secondary">Income</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                   stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                      d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"/><path
                                                      d="M12 3v3m0 12v3"/></svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">{{number_format($profit, 2)}} Din</div>
                                            <div class="text-secondary">Profit</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Current cells status</h3>
                        </div>
                        <table class="table card-table table-vcenter">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Sold</th>
                                <th>Left</th>
                                <th>Total</th>
                                <th>Percent</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cellGroups as $group)
                                <tr>
                                    <td style="font-weight: bold">{{ $group->capacity_range }}</td>
                                    <td style="color: #0a66c2">{{ $group->sold_cells }}</td>
                                    <td style="color: #0cbd64;font-weight: bold">{{ $group->left_cells }}</td>
                                    <td>{{ $group->total_cells }}</td>
                                    <td class="w-50">
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-primary" style="width: {{ $group->total_cells / $cellGroups->sum('total_cells') * 100 }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td style="font-weight: bold;color: #c20a19">TOTAL</td>
                                <td style="font-weight: bold;color: #c20a19">{{ $cellGroups->sum('sold_cells') }}</td>
                                <td style="font-weight: bold;color: #c20a19">{{ $cellGroups->sum('left_cells') }}</td>
                                <td style="font-weight: bold;color: #c20a19">{{ $cellGroups->sum('total_cells') }}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6">
                    <div class="card">
                        <div class="row mb-3">
                            <div class="card-header col-md-8 col-lg-6">
                                <h3 class="card-title">Top 10 available cells by model</h3>
                            </div>
                            <div class="col-sm-3 col-lg-5 mt-3">
                                <div class="mb-3">
                                    <select name="capacity" id="capacitySelect" class="form-select">
                                        <option value="1000-1200">1000-1200</option>
                                        <option value="1200-1400">1200-1400</option>
                                        <option value="1400-1600">1400-1600</option>
                                        <option value="1600-1800">1600-1800</option>
                                        <option value="1800-2000">1800-2000</option>
                                        <option value="2000-2200">2000-2200</option>
                                        <option value="2200-2400">2200-2400</option>
                                        <option value="2400-2600">2400-2600</option>
                                        <option value="2600-2800">2600-2800</option>
                                        <option value="2800-3000">2800-3000</option>
                                        <option value="3000-3200">3000-3200</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <table class="table card-table table-vcenter">
                                <thead>
                                <tr>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Wrap Color</th>
                                    <th>Ring Color</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody id="unsoldCellsTable">
                                <!-- Data will be inserted here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 d-block">
                    <div class="row mb-3">
                        <div class="col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Revenue in this month</div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h1 mb-0 me-2">{{number_format($this_month->sum('price'), 2).' din'}}</div>
                                        <div class="me-auto">
                                            <span class="text-green d-inline-flex align-items-center lh-1">{{$this_month->count().' kom'}}
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                                                   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                   stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                      d="M3 17l6 -6l4 4l8 -8"/><path d="M14 7l7 0l0 7"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-revenue-bg" class="chart-sm"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Revenue in last month</div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h1 mb-0 me-2">{{number_format($last_month->sum('price'), 2).' din'}}</div>
                                        <div class="me-auto">
                                            <span class="text-green d-inline-flex align-items-center lh-1">{{$last_month->count().' kom'}}
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                                                   viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                   stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                      d="M3 17l6 -6l4 4l8 -8"/><path d="M14 7l7 0l0 7"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-revenue-bg" class="chart-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Revenue in last 3 months</div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h1 mb-0 me-2">{{number_format($last_3_months->sum('price'), 2).' din'}}</div>
                                        <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">{{$last_3_months->count().' kom'}}
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                  d="M3 17l6 -6l4 4l8 -8"/><path d="M14 7l7 0l0 7"/></svg>
                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-revenue-bg" class="chart-sm"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Revenue in last 6 months</div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h1 mb-0 me-2">{{number_format($last_6_months->sum('price'), 2).' din'}}</div>
                                        <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">{{$last_6_months->count().' kom'}}
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                  d="M3 17l6 -6l4 4l8 -8"/><path d="M14 7l7 0l0 7"/></svg>
                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-revenue-bg" class="chart-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Revenue in this year</div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h1 mb-0 me-2">{{number_format($this_year->sum('price'), 2).' din'}}</div>
                                        <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">{{$this_year->count().' kom'}}
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                  d="M3 17l6 -6l4 4l8 -8"/><path d="M14 7l7 0l0 7"/></svg>
                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-revenue-bg" class="chart-sm"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Revenue in last year</div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h1 mb-0 me-2">{{number_format($last_year->sum('price'), 2).' din'}}</div>
                                        <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">{{$last_year->count().' kom'}}
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                               stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                  d="M3 17l6 -6l4 4l8 -8"/><path d="M14 7l7 0l0 7"/></svg>
                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-revenue-bg" class="chart-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Top 10 cell models by quantity</h3>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <table  class="table card-table table-vcenter">
                                <thead>
                                <tr>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Wrap Color</th>
                                    <th>Ring Color</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody id="topModelsTable">
                                <!-- Data will be inserted here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts-bottom')

    <script type="text/javascript">

        $(document).ready(function () {
            // Trigger the first option on page load
            let initialCapacity = $('select[name="capacity"] option:first').val();

            loadTopModels();
            loadCells(initialCapacity);

            // Handle capacity selection change
            $('select[name="capacity"]').on('change', function () {
                let capacity = $(this).val();
                loadCells(capacity);
            });

            function loadCells(capacity) {
                $.ajax({
                    url: '{{ route('dashboard.cells.filter') }}',
                    method: 'POST',
                    data: {capacity: capacity},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        var tableBody = $('#unsoldCellsTable');
                        tableBody.empty();

                        if (data) {
                            $.each(data, function (index, cell) {
                                tableBody.append(`
                                    <tr>
                                        <td>${cell.brand}</td>
                                        <td>${cell.model}</td>
                                        <td>
                                            <div class="col-auto">
                                                <div class="col-12 col-lg-auto" hidden>${cell.wrap_color ?? 'N/A'} </div>
                                                <label class="form-colorinput">
                                                    <input name="color" type="text" value="${cell.wrap_color ?? 'N/A'}" class="form-colorinput-input"/>
                                                    <span class="form-colorinput-color" style="background-color: ${cell.wrap_color ?? 'N/A'};width: 60px;border-radius: 10%"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-auto">
                                                <div class="col-12 col-lg-auto" hidden>${cell.ring_color ?? 'N/A'} </div>
                                                <label class="form-colorinput">
                                                    <input name="color" type="text" value="${cell.ring_color ?? 'N/A'}" class="form-colorinput-input"/>
                                                    <span class="form-colorinput-color" style="background-color: ${cell.ring_color ?? 'N/A'};width: 60px;border-radius: 10%"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>${cell.quantity}</td>
                                    </tr>
                                `);
                            });
                        } else {
                            tableBody.append(`
                                <tr>
                                    <td colspan="5" class="text-center">No cells found for this range</td>
                                </tr>
                            `);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            }

            function loadTopModels() {
                $.ajax({
                    url: '{{ route('cells.topModels') }}',
                    method: 'GET',
                    success: function (data) {
                        var tableBody = $('#topModelsTable');
                        tableBody.empty();

                        if (data.length > 0) {
                            $.each(data, function (index, cell) {
                                tableBody.append(`
                            <tr>
                                <td>${cell.model}</td>
                                <td>${cell.brand}</td>
                                <td>
                                            <div class="col-auto">
                                                <div class="col-12 col-lg-auto" hidden>${cell.wrap_color ?? 'N/A'} </div>
                                                <label class="form-colorinput">
                                                    <input name="color" type="text" value="${cell.wrap_color ?? 'N/A'}" class="form-colorinput-input"/>
                                                    <span class="form-colorinput-color" style="background-color: ${cell.wrap_color ?? 'N/A'};width: 60px;border-radius: 10%"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-auto">
                                                <div class="col-12 col-lg-auto" hidden>${cell.ring_color ?? 'N/A'} </div>
                                                <label class="form-colorinput">
                                                    <input name="color" type="text" value="${cell.ring_color ?? 'N/A'}" class="form-colorinput-input"/>
                                                    <span class="form-colorinput-color" style="background-color: ${cell.ring_color ?? 'N/A'};width: 60px;border-radius: 10%"></span>
                                                </label>
                                            </div>
                                        </td>
                                <td>${cell.quantity}</td>
                            </tr>
                        `);
                            });
                        } else {
                            tableBody.append(`
                        <tr>
                            <td colspan="5" class="text-center">No models found</td>
                        </tr>
                    `);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            }
        });

    </script>
@endsection
