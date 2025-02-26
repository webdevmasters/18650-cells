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
            </div>
        </div>
    </div>
@endsection
