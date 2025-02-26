@extends("admin.layouts.master")
@section('title')
    Investments
@endsection
@section('content')
    <div class="page-body">
        <div class="container-xl" style="margin-left: 20px;max-width: 1470px;">
            <div class="row row-deck row-cards">
                <div class="container">
                    <!-- First Row: Equipment -->
                    <form action="{{ route('admin.investments.update') }}" method="POST">
                        @csrf

                        <!-- Equipment Row -->
                        <div class="row mb-3">
                            <div class="col-lg-1">
                                <label class="form-label">Equipment</label>
                                <input type="text" class="form-control" name="equipment_current" value="{{ $investment->equipment ?? 0 }}" readonly>
                            </div>
                            <div class="col-lg-1">
                                <label class="form-label">Value</label>
                                <input type="text" class="form-control" name="equipment" id="equipment">
                                @error('equipment')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Batteries Row -->
                        <div class="row mb-3">
                            <div class="col-lg-1">
                                <label class="form-label">Batteries</label>
                                <input type="text" class="form-control" name="batteries_current" value="{{ $investment->batteries ?? 0 }}" readonly>
                            </div>
                            <div class="col-lg-1">
                                <label class="form-label">Value</label>
                                <input type="text" class="form-control" name="batteries" id="batteries">
                                @error('batteries')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- KP Row -->
                        <div class="row mb-3">
                            <div class="col-lg-1">
                                <label class="form-label">KP</label>
                                <input type="text" class="form-control" name="kp_current" value="{{ $investment->kp ?? 0 }}" readonly>
                            </div>
                            <div class="col-lg-1">
                                <label class="form-label">Value</label>
                                <input type="text" class="form-control" name="kp" id="kp">
                                @error('kp')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-4">Update Investments</button>
                    </form>
                    <!-- Third Row: KP -->
                    <div class="row mb-3">
                        <!-- Price dropdown (3 columns) -->
                        <div class="col-lg-2">
                            <label class="form-label">Capacity group</label>
                            <select name="capacity" id="capacity" class="form-select">
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

                        <!-- Price Input -->
                        <div class="col-lg-1">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value="0">
                        </div>

                        <!-- Set Price Button -->
                        <div class="col-lg-2 d-flex align-items-end">
                            <button type="button" class="btn btn-primary" id="setPriceBtn">Set Price</button>
                        </div>
                    </div>
                    <div id="resultMessage" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-bottom')
    <script type="text/javascript">
        document.getElementById('capacity').addEventListener('change', function () {
            const capacity = this.value;

            // Fetch the current price for the selected capacity range
            fetch(`/cells/price?capacity=${capacity}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('price').value = data.price || 0;
                });
        });

        document.getElementById('setPriceBtn').addEventListener('click', function () {
            const capacity = document.getElementById('capacity').value;
            const price = document.getElementById('price').value;

            // Update the price for unsold cells
            fetch('/cells/update-price', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({capacity, price})
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('resultMessage').innerHTML =
                        `<div class="alert alert-success">${data.message}</div>`;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>

@endsection
