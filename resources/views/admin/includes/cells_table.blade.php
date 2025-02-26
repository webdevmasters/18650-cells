<div class="col-10" id="cells_table">
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
                        <td>{{ $cell->created_at ? \Carbon\Carbon::parse($cell->created_at)->format('d/m/Y') : '/' }}</td>
                        <td>{{ $cell->updated_at ? \Carbon\Carbon::parse($cell->updated_at)->format('d/m/Y') : '/' }}</td>
                        <td style="text-align: center">
                            <ul class="list-unstyled hstack gap-1 mb-0" style="justify-content: center; ">
                                <li>
                                    <input type="hidden" name="id" id="{{$cell->id}}">
                                    <a href="javascript:void(0);" onclick="editCell('{{$cell->id}}')" style="width: 34px; height: 34px" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                    </a>
                                </li>
                                <li>
                                    <form class="remove-cell-form" method="post">
                                        @csrf
                                        @method('DELETE') <!-- Match the DELETE request method -->
                                        <input type="text" name="id" value="{{ $cell->id }}" hidden />
                                        <button type="submit" class="btn btn-danger" style="width: 34px; height: 34px">
                                            <i class="fa-solid fa-xmark fa-sm"></i>
                                        </button>
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
