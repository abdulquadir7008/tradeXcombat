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
                    @if (session('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="container-fluid">
						<!-- start page title -->
						<div class="row">
							<div class="col-12">
								<div class="page-title-box d-sm-flex align-items-center justify-content-between">
									<h2 class="mb-sm-0">Currency List</h4>
                                         @if(isset($currencyedit) && !empty($currencyedit))
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('currencies') }}"><button type="button" class="btn btn-soft-info btn-md ml-3">
                                                <i class="bi bi-plus align-middle"></i> Add New
                                        </button></a>
								    </div>
                                    @endif
								</div>
							</div>
						</div>
						<!-- end page title -->
						<div class="row mt-2">
							<div class="col">
								<div class="h-100">
									<div class="row">

										<div class="col-sm-12 col-md-8">
											<div class="card">
                                                {{-- <div class="card-header align-items-center d-flex">

                                                    <div class="col-sm">
                                                        <div class="d-flex justify-content-sm-end">
                                                            <div class="search-box ms-2">
                                                                <input type="text" class="form-control search" placeholder="Search...">
                                                                <i class="ri-search-line search-icon"></i>
                                                            </div>
                                                        </div>
                                                   </div>
                                                </div> --}}
												<div class="card-body">

													<div class="table-responsive table-card">
														<table class="table table-centered align-middle table-nowrap mb-0" id="currencyTable">
															<thead class="table-light">
																<tr>
                                                                    <th>S. No</th>
																	<th scope="col">Name</th>
																	<th scope="col">Symbol</th>
																	<th scope="col">code</th>
																	<th scope="col">Exchange Rate</th>
																	<th scope="col">Status</th>
																	<th scope="col">Created At</th>
																	{{-- <th scope="col">Updated At</th> --}}

																	<th scope="col">Action</th>
																</tr>
															</thead>
															<tbody>
															@forelse($currencies as $data)
																<tr>
                                                                    <td>{{ $loop->iteration }}</td>
																	<td>{{ $data->name }}</td>
                                                                    <td>{{ $data->symbol }}</td>
                                                                    <td>{{ $data->code }}</td>
                                                                    <td>{{ $data->exchange_rate }}</td>


																	<td>
																	@if($data->status == 1)
																	<span class="badge text-success  bg-success-subtle">Active</span>
																	@else
																	<span class="badge text-danger  bg-danger-subtle">InActive</span>
																	@endif
																	</td>
                                                                    <td>{{ $data->created_at }}</td>
                                                                     {{-- <td>{{ $data->updated_at }}</td> --}}
																	<td>
																		{{-- <div class="hstack gap-3 flex-wrap"> --}}
																			<a href="{{ route('editcurrency', $data->id) }}" class="link-success fs-15" title="Edit currency"><i class="ri-edit-2-line"></i>  </a>
																			{{-- <a href="{{ route('deletecurrency', $data->id) }}" class="link-danger fs-15" title="Delete currency"><i class="ri-delete-bin-line"></i>  </a> --}}
                                                                             <form action="{{ route('deletecurrency', $data->id) }}" method="POST" class="currency-delete-form" style="display:inline;">
                                                                                @csrf
                                                                                <button type="button" class="btn btn-link p-0 m-0 align-baseline link-danger fs-15 btn-delete-currency" title="Delete currency">
                                                                                    <i class="ri-delete-bin-line"></i>
                                                                                </button>
                                                                            </form>

																		{{-- </div> --}}
                                                                        {{-- <div class="hstack gap-3 flex-wrap">
																			<a href="{{ route('deletecurrency', $data->id) }}" class="link-danger fs-15"><i class="ri-delete-bin-line"></i>  </a>
																		</div> --}}
																	</td>
																</tr><!-- end tr -->
															@empty
																{{-- <tr>
																	<td colspan="8">No Records Found</td>
																</tr> --}}
															@endforelse
															</tbody>
														</table>
													</div>
                                                    {{-- <div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">
                                                        <div class="col-sm">
                                                            <div class="text-muted">
                                                                Showing <span class="fw-semibold">{{ $currencies->firstItem() }}</span> to
                                                                <span class="fw-semibold">{{ $currencies->lastItem() }}</span> of
                                                                <span class="fw-semibold">{{ $currencies->total() }}</span> Results
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-auto">

                                                             <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center justify-content-sm-start">
                                                                @if ($currencies->onFirstPage())
                                                                    <li class="page-item disabled"><a href="#" class="page-link">←</a></li>
                                                                @else
                                                                    <li class="page-item"><a href="{{ $currencies->previousPageUrl() }}" class="page-link">←</a></li>
                                                                @endif

                                                                @foreach ($currencies->getUrlRange(1, $currencies->lastPage()) as $page => $url)
                                                                    <li class="page-item {{ $page == $currencies->currentPage() ? 'active' : '' }}">
                                                                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                                                    </li>
                                                                @endforeach

                                                                @if ($currencies->hasMorePages())
                                                                    <li class="page-item"><a href="{{ $currencies->nextPageUrl() }}" class="page-link">→</a></li>
                                                                @else
                                                                    <li class="page-item disabled"><a href="#" class="page-link">→</a></li>
                                                                @endif
                                                            </ul>


                                                        </div>
                                                    </div> --}}

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
															<label for="validationCustom07" class="form-label">Code</label>
															{{-- <input type="text" class="form-control" name="code" id="validationCustom07" required value="{{ old('code', $currencyedit['code'] ?? '') }}" /> --}}
                                                            <select class="form-select" name="code" id="currency-code" required>
                                                                <option value="" selected disabled>-- Select Currency Code --</option>
                                                            </select>

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
								</div> <!-- end .h-100-->

							</div> <!-- end col -->
						</div>
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <div>
                    <button type="button" class="btn-success btn-rounded shadow-lg btn btn-icon layout-rightside-btn fs-22"><i class="ri-chat-smile-2-line"></i></button>
                </div>

                @include('partials.footer')
            </div>
            <!-- end main content-->
</div>
{{-- <script>
document.querySelector('.search').addEventListener('keyup', function () {
    const term = this.value.toLowerCase();
    const rows = document.querySelectorAll('#currencyTable tbody tr');
    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(term) ? '' : 'none';
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // const currencySymbols = {
        //     "AED": "د.إ", "AFN": "؋", "ALL": "L", "AMD": "֏", "ANG": "ƒ", "AOA": "Kz", "ARS": "$", "AUD": "$",
        //     "AWG": "ƒ", "AZN": "₼", "BAM": "KM", "BBD": "$", "BDT": "৳", "BGN": "лв", "BHD": ".د.ب", "BIF": "FBu",
        //     "BMD": "$", "BND": "$", "BOB": "Bs.", "BRL": "R$", "BSD": "$", "BTN": "Nu.", "BWP": "P", "BYN": "Br",
        //     "BZD": "$", "CAD": "$", "CDF": "FC", "CHF": "CHF", "CLP": "$", "CNY": "¥", "COP": "$", "CRC": "₡",
        //     "CUP": "$", "CVE": "$", "CZK": "Kč", "DJF": "Fdj", "DKK": "kr", "DOP": "$", "DZD": "دج", "EGP": "£",
        //     "ERN": "Nfk", "ETB": "Br", "EUR": "€", "FJD": "$", "FKP": "£", "FOK": "kr", "GBP": "£", "GEL": "₾",
        //     "GGP": "£", "GHS": "₵", "GIP": "£", "GMD": "D", "GNF": "FG", "GTQ": "Q", "GYD": "$", "HKD": "$",
        //     "HNL": "L", "HRK": "€", "HTG": "G", "HUF": "Ft", "IDR": "Rp", "ILS": "₪", "IMP": "£", "INR": "₹",
        //     "IQD": "ع.د", "IRR": "﷼", "ISK": "kr", "JEP": "£", "JMD": "$", "JOD": "د.ا", "JPY": "¥", "KES": "Sh",
        //     "KGS": "с", "KHR": "៛", "KID": "$", "KMF": "Fr", "KRW": "₩", "KWD": "د.ك", "KYD": "$", "KZT": "₸",
        //     "LAK": "₭", "LBP": "ل.ل", "LKR": "Rs", "LRD": "$", "LSL": "L", "LYD": "ل.د", "MAD": "د.م.",
        //     "MDL": "L", "MGA": "Ar", "MKD": "ден", "MMK": "K", "MNT": "₮", "MOP": "P", "MRU": "UM", "MUR": "₨",
        //     "MVR": "ރ.", "MWK": "MK", "MXN": "$", "MYR": "RM", "MZN": "MT", "NAD": "$", "NGN": "₦", "NIO": "C$",
        //     "NOK": "kr", "NPR": "₨", "NZD": "$", "OMR": "ر.ع.", "PAB": "B/.", "PEN": "S/", "PGK": "K", "PHP": "₱",
        //     "PKR": "₨", "PLN": "zł", "PYG": "₲", "QAR": "ر.ق", "RON": "lei", "RSD": "дин.", "RUB": "₽", "RWF": "FRw",
        //     "SAR": "ر.س", "SBD": "$", "SCR": "₨", "SDG": "£", "SEK": "kr", "SGD": "$", "SHP": "£", "SLE": "Le",
        //     "SOS": "Sh", "SRD": "$", "SSP": "£", "STN": "Db", "SYP": "£", "SZL": "L", "THB": "฿", "TJS": "ЅМ",
        //     "TMT": "m", "TND": "د.ت", "TOP": "T$", "TRY": "₺", "TTD": "$", "TVD": "$", "TWD": "NT$", "TZS": "Sh",
        //     "UAH": "₴", "UGX": "USh", "USD": "$", "UYU": "$", "UZS": "so'm", "VES": "Bs.S", "VND": "₫",
        //     "VUV": "Vt", "WST": "T", "XAF": "Fr", "XCD": "$", "XOF": "Fr", "XPF": "₣", "YER": "﷼", "ZAR": "R",
        //     "ZMW": "ZK", "ZWL": "$"
        // };

        // const dropdown = document.getElementById('currency-code');
        // const symbolInput = document.querySelector('input[name="symbol"]');

        // // Populate dropdown
        // for (const [code, symbol] of Object.entries(currencySymbols)) {
        //     const option = document.createElement('option');
        //     option.value = code;
        //     option.text = `${code}`;
        //     dropdown.appendChild(option);
        // }

        // // Set selected if editing
        // @if(old('code', $currencyedit['code'] ?? false))
        //     dropdown.value = "{{ old('code', $currencyedit['code'] ?? '') }}";
        // @endif

        // // Update symbol on change
        // dropdown.addEventListener('change', function () {
        //     const selected = this.value;
        //     symbolInput.value = currencySymbols[selected] || '';
        // });

        const currencySymbols = @json($currency_symbols->pluck('symbol', 'currency_code'));

        const dropdown = document.getElementById('currency-code');
        const symbolInput = document.querySelector('input[name="symbol"]');

        for (const [code, symbol] of Object.entries(currencySymbols)) {
            const option = document.createElement('option');
            option.value = code;
            option.text = `${code}`;
            dropdown.appendChild(option);
        }

        @if(old('code', $currencyedit['code'] ?? false))
            dropdown.value = "{{ old('code', $currencyedit['code'] ?? '') }}";
        @endif

        dropdown.addEventListener('change', function () {
            const selected = this.value;
            symbolInput.value = currencySymbols[selected] || '';
        });


         const deleteButtons = document.querySelectorAll('.btn-delete-currency');

        deleteButtons.forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                const form = btn.closest('form');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    // icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    customClass: {
                        confirmButton: "btn btn-info w-xs me-2 mt-2",
                        cancelButton: "btn btn-danger w-xs mt-2"
                    },
                    buttonsStyling: false,
                    showCloseButton: true
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: "Cancelled",
                            // text: "Your currency is safe!",
                            // icon: "error",
                            customClass: {
                                confirmButton: "btn btn-secondary mt-2"
                            },
                            buttonsStyling: false
                        });
                    }
                });
            });
        });
    });
</script> --}}
    <!-- DataTables Setup -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<script>
$(document).ready(function () {
    $('#currencyTable').DataTable({
        // dom: '<"row mb-3"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>rtip',
        dom: '<"row p-2"<"col-lg-4 text-center"B><"col-lg-4 text-center"l><"col-lg-4"f>>rtip',

        buttons: [
            // {
            //     extend: 'copy',
            //     text: '<i class="bi bi-clipboard"></i> Copy',
            //     className: 'btn btn-secondary btn-sm me-1'
            // },
            {
                extend: 'csv',
                text: '<i class="bi bi-file-earmark-spreadsheet"></i> CSV',
                className: 'btn btn-primary bg-secondary text-white btn-sm me-1'
            },
            {
                extend: 'excel',
                text: '<i class="bi bi-file-earmark-excel"></i> Excel',
                className: 'btn btn-success bg-info text-white btn-sm me-1'
            },
            {
                extend: 'pdf',
                text: '<i class="bi bi-file-earmark-pdf"></i> PDF',
                className: 'btn btn-danger bg-primary text-white btn-sm me-1',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            // {
            //     extend: 'print',
            //     text: '<i class="bi bi-printer"></i> Print',
            //     className: 'btn btn-info bg-primary text-white btn-sm me-1'
            // }
        ],
        paging: true,
        // responsive: true,
        // order: [[0, 'desc']],
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            emptyTable: "No Records Found"
        },
        lengthMenu: [5, 10, 25, 50]
    });
});

</script>



@endsection
