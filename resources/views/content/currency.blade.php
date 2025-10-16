@extends('layouts.app')

@section('content')
<div id="layout-wrapper">
	@include('partials.topheader')
	@include('partials.header')
	@include('partials.sidebar')

	<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
              <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Grid Js</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Grid Js</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            {{-- <div class="col-lg-12">
                                <div class="card"> --}}
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 flex-grow-1">Base Example</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="row">

										<div class="col-sm-12 col-md-8">
                                             <div class="card">
                                                <div class="table-responsive">
                                               <div id="currency-gridjs"></div>
                                                </div>
                                             </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="card">

												<div class="card-body">
													<form class="row g-3 needs-validation" novalidate method="POST" name="storepayment" action="{{ isset($currencyedit) && isset($currencyedit['id']) ? route('storeeditcurrency', $currencyedit['id']) : route('storecurrency')  }}" enctype="multipart/form-data" >
													@csrf
													@if(isset($currencyedit) && isset($currencyedit['id']))
														@method('PUT')
													@endif

														<div class="col-12">
															<label for="validationCustom01" class="form-label">Currency Name</label>
															<input type="text" class="form-control" name="name" id="validationCustom01" required value="{{ old('name', $currencyedit['name'] ?? '') }}" />
															<div class="valid-feedback">
																Looks good!
															</div>


														</div>









														<div class="col-md-6 col-sm-12">
															<label for="validationCustom06" class="form-label">Symbol</label>
															<input type="text" class="form-control" name="symbol" id="validationCustom06" required value="{{ old('symbol', $currencyedit['symbol'] ?? '') }}" />
															<div class="valid-feedback">
																Looks good!
															</div>


														</div>

														<div class="col-md-6 col-sm-12">
															<label for="validationCustom07" class="form-label">Code</label>
															<input type="text" class="form-control" name="code" id="validationCustom07" required value="{{ old('code', $currencyedit['code'] ?? '') }}" />
															<div class="valid-feedback">
																Looks good!
															</div>


														</div>

														<div class="col-12">
															<label for="validationCustom06" class="form-label">Exchange Rate</label>
															<input type="number" class="form-control" name="exchange_rate" id="validationCustom06" step="0.0001"
                                                                value="{{ old('exchange_rate', $currencyedit['exchange_rate'] ?? '') }}"
                                                                {{ isset($currencyedit['exchange_rate']) ? '' : 'required' }} />

															<div class="valid-feedback">
																Looks good!
															</div>
														</div>

														<div class="col-12">
															<label for="validationCustom07" class="form-label">Status</label>
															<select class="form-select" id="validationCustom07" name="status" required>
																<option value="1" {{ old('status', $currencyedit['status'] ?? 1) == 1 ? 'selected' : '' }}>Active</option>
																<option value="0" {{ old('status', $currencyedit['status'] ?? 0) == 0 ? 'selected' : '' }}>InActive</option>
															</select>
															<div class="invalid-feedback">
																Please select a Status.
															</div>
														</div>

														<div class="col-12">
															<button class="btn btn-primary w-100" type="submit">{{ isset($currencyedit) && isset($currencyedit['id']) ? 'Update' : 'Create' }}</button>
														</div>
													</form>
												</div>
											</div>
                                        </div>
                                        </div>
                                    </div>
                                {{-- </div>
                            </div> --}}
                            <!-- end col -->
                        </div>
                    </div>
                </div>
              </div>
</div>
<script>
    const currencyData = @json($currencies);
    document.addEventListener("DOMContentLoaded", function () {
        if (document.getElementById("currency-gridjs")) {
            new gridjs.Grid({
                columns: [
                    { name: "Name", width: "150px" },
                    { name: "Symbol", width: "80px" },
                    { name: "Code", width: "100px" },
                    { name: "Exchange Rate", width: "120px" },
                    {
                        name: "Status",
                        width: "100px",
                        formatter: (cell) =>
                            gridjs.html(
                                cell === 1
                                    ? `<span class="badge text-success bg-success-subtle">Active</span>`
                                    : `<span class="badge text-danger bg-danger-subtle">InActive</span>`
                            )
                    },
                    { name: "Created At", width: "180px" },
                    {
                        name: "Action",
                        width: "100px",
                        formatter: (_, row) => {
                            return gridjs.html(`
                                <a href="/edit_currency/${row.cells[6].data}" class="link-success fs-15">
                                    <i class="ri-edit-2-line"></i> Edit
                                </a>
                            `);
                        }
                    }
                ],
                // console.log(currencyData);
                data: currencyData.map(item => [
                    item.name,
                    item.symbol,
                    item.code,
                    item.exchange_rate,
                    item.status,
                    item.created_at,
                    item.id

                ]),
                pagination: { limit: 5 },
                sort: true,
                search: true
            }).render(document.getElementById("currency-gridjs"));
        }
    });
    // console.log(currencyData);
</script>

@endsection
