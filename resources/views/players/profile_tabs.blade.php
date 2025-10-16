 <div class="row">
    <div class="col-lg-12">
        <!-- Tab panes -->
        <div class="tab-content text-muted">
            <div class="tab-pane active" id="profile-tab" role="tabpanel">
                <div class="row">
                        <h4 class="mb-4 px-2">Wallet Info</h4>
                    <div class="col-xl-4 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13">Total Transactions</p>
                                        <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $totalTransactions}}">{{ $totalTransactions}}</span></h4>

                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                            <i class="bi bi-arrow-left-right text-success"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-success opacity-25">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="animation-effect-4 text-success opacity-25">
                                <i class="bi bi-currency-pound"></i>
                            </div>
                            <div class="animation-effect-3 text-success opacity-25">
                                <i class="bi bi-currency-euro"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-4 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                            <i class="bx bx-shopping-bag text-info"></i>
                                        </span>
                                    </div>
                                    <div class="text-end flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13">Wallet Amount</p>
                                        <h4 class="fs-22 fw-semibold mb-3">
                                            <span class="text-muted">$</span>
                                            <span class="counter-value" data-target="{{ (float) $totalDeposit }}">
                                                {{ number_format($totalDeposit, 2) }}
                                            </span>
                                        </h4>

                                    </div>
                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-info opacity-25 left">
                                <i class="bi bi-handbag"></i>
                            </div>
                            <div class="animation-effect-4 text-info opacity-25 left">
                                <i class="bi bi-shop"></i>
                            </div>
                            <div class="animation-effect-3 text-info opacity-25 left">
                                <i class="bi bi-bag-check"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-4 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13">TXT Coins</p>
                                        <h4 class="fs-22 fw-semibold mb-3">
                                            {{-- <span class="text-muted">$</span> --}}
                                            <span class="counter-value" data-target="3000">
                                                3000
                                            </span>
                                        </h4>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                            <i class=" bx bx-coin-stack text-warning"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-warning opacity-25">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="animation-effect-4 text-warning opacity-25">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="animation-effect-3 text-warning opacity-25">
                                <i class="bi bi-people"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->


                </div>
                <!--end row-->

                <div class="row">
                        <h4 class="mb-4 px-2">Additional Info</h4>
                    <div class="col-xl-4 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between gap-2">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title  rounded fs-3">
                                            <i class="bx bx-user-circle text-success"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13 mb-0">Player Name</p>
                                        <p class="mb-0">{{ ucfirst($user->name)}}</p>
                                        {{-- <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $totalTransactions}}">{{ $totalTransactions}}</span></h4> --}}

                                    </div>

                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-success opacity-25">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="animation-effect-4 text-success opacity-25">
                                <i class="bi bi-currency-pound"></i>
                            </div>
                            <div class="animation-effect-3 text-success opacity-25">
                                <i class="bi bi-currency-euro"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-4 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body p-3">
                                <div class="d-flex gap-2">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title  rounded fs-3">
                                            <i class=" bx bx-mail-send text-info"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13 mb-0">Mail</p>
                                        <p class="mb-0 ">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Optional animations -->
                            <div class="animation-effect-6 text-success opacity-25">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="animation-effect-4 text-success opacity-25">
                                <i class="bi bi-currency-pound"></i>
                            </div>
                            <div class="animation-effect-3 text-success opacity-25">
                                <i class="bi bi-currency-euro"></i>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-2">
                                        <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title  rounded fs-3">
                                            <i class=" bx bxs-phone text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13 mb-0">Phone Number</p>
                                        <p class="mb-0 ">{{ $user->phone }}</p>
                                    </div>

                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-warning opacity-25">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="animation-effect-4 text-warning opacity-25">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="animation-effect-3 text-warning opacity-25">
                                <i class="bi bi-people"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->

                        <div class="col-xl-4 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between gap-2">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title  rounded fs-3">
                                            <i class=" bx bx-calendar text-success"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13 mb-0">Date of Birth</p>
                                        <p class="mb-0">{{ \Carbon\Carbon::parse($user->birth_date)->format('d M Y') }}</p>
                                        {{-- <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $totalTransactions}}">{{ $totalTransactions}}</span></h4> --}}

                                    </div>

                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-success opacity-25">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="animation-effect-4 text-success opacity-25">
                                <i class="bi bi-currency-pound"></i>
                            </div>
                            <div class="animation-effect-3 text-success opacity-25">
                                <i class="bi bi-currency-euro"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-4 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body p-3">
                                <div class="d-flex gap-2">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title  rounded fs-3">
                                            <i class=" bx bx-map text-info"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13 mb-0">Location</p>
                                        <p class="mb-0 ">{{ ucfirst($user->country) }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Optional animations -->
                            <div class="animation-effect-6 text-success opacity-25">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="animation-effect-4 text-success opacity-25">
                                <i class="bi bi-currency-pound"></i>
                            </div>
                            <div class="animation-effect-3 text-success opacity-25">
                                <i class="bi bi-currency-euro"></i>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-2">
                                        <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title  rounded fs-3">
                                            <i class="bx bx-user-circle text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13 mb-0">Dtae of Joining</p>
                                        <p class="mb-0 ">{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y, h:i A') }}</p>
                                    </div>

                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-warning opacity-25">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="animation-effect-4 text-warning opacity-25">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="animation-effect-3 text-warning opacity-25">
                                <i class="bi bi-people"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->



                </div>
                <!--end row-->

            </div>
            <div class="tab-pane fade" id="transactions" role="tabpanel">
                    <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13">Total Transactions</p>
                                        <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $totalTransactions}}">{{ $totalTransactions}}</span></h4>

                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                            <i class="bx bx-dollar-circle text-success"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-success opacity-25">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="animation-effect-4 text-success opacity-25">
                                <i class="bi bi-currency-pound"></i>
                            </div>
                            <div class="animation-effect-3 text-success opacity-25">
                                <i class="bi bi-currency-euro"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                            <i class="bx bx-shopping-bag text-info"></i>
                                        </span>
                                    </div>
                                    <div class="text-end flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13">Total Deposit</p>
                                        <h4 class="fs-22 fw-semibold mb-3">
                                            <span class="text-muted">$</span>
                                            <span class="counter-value" data-target="{{ (float) $totalDeposit }}">
                                                {{ number_format($totalDeposit, 2) }}
                                            </span>
                                        </h4>

                                    </div>
                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-info opacity-25 left">
                                <i class="bi bi-handbag"></i>
                            </div>
                            <div class="animation-effect-4 text-info opacity-25 left">
                                <i class="bi bi-shop"></i>
                            </div>
                            <div class="animation-effect-3 text-info opacity-25 left">
                                <i class="bi bi-bag-check"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13">Total Withdrawals</p>
                                        <h4 class="fs-22 fw-semibold mb-3">
                                            <span class="text-muted">$</span>
                                            <span class="counter-value" data-target="{{ (float) $totalWithdrawal }}">
                                                {{ number_format($totalWithdrawal, 2) }}
                                            </span>
                                        </h4>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                            <i class="bx bx-user-circle text-warning"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-warning opacity-25">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="animation-effect-4 text-warning opacity-25">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="animation-effect-3 text-warning opacity-25">
                                <i class="bi bi-people"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bx-wallet text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="text-end flex-grow-1">
                                        <p class="text-capitalize fw-medium text-muted text-truncate fs-13">Pending Transactions</p>
                                        <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="{{ $pending_transactions}}">{{ $pending_transactions}}</span></h4>

                                    </div>
                                </div>
                            </div><!-- end card body -->
                            <div class="animation-effect-6 text-info opacity-25 left">
                                <i class="bi bi-handbag"></i>
                            </div>
                            <div class="animation-effect-4 text-info opacity-25 left">
                                <i class="bi bi-shop"></i>
                            </div>
                            <div class="animation-effect-3 text-info opacity-25 left">
                                <i class="bi bi-bag-check"></i>
                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>


                <div class="row">
                        <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Recent Pending Transactions</h4>
                            <div class="page-title-right">
                                <a href="{{ route('playertransactions', ['id' => md5($user->id), 'filter' => 'pending']) }}">View All</a>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 ">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">

                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive table-card">
                                    <table class="table table-centered align-middle table-nowrap mb-0" id="currencyTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>S. No</th>
                                                <th scope="col">Player Details</th>
                                                <th scope="col">Transaction Type</th>
                                                <th scope="col">Payment Type</th>
                                                <th scope="col">Deposit Amount</th>
                                                <th scope="col">Withdrawal Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($recent_pending as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('viewplayer', md5($data->user->id)) }}" title="View Player">
                                                        <div class="d-flex align-items-center fw-medium">
                                                            @if(!empty($data->user->profile_image) && Storage::disk('public')->exists($data->user->profile_image))
                                                            <img src="{{ asset('storage/app/public/' . $data->user->profile_image) }}" alt="" class="avatar-xxs me-2">
                                                            @else
                                                            <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle me-2" />
                                                            @endif
                                                            <div>
                                                                <p class="mb-0 text-primary">{{ ucfirst($data->user->name) }}</p>
                                                                <p class="mb-0 transaction_email text-body">{{ $data->user->email }}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($data->transaction_type == 'withdrawal')
                                                        <span class="text-secondary">Withdrawal</span>
                                                    @elseif($data->transaction_type == 'deposit')
                                                        <span class="text-info">Deposit</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($data->transaction_type == 'withdrawal')
                                                        {{ $data->paymentMethod?->method_name ? ucfirst($data->paymentMethod->method_name) : 'Null' }}
                                                    @elseif($data->transaction_type == 'deposit')
                                                        {{ ucfirst($data->deposit_method_id) }}
                                                    @endif
                                                </td>
                                                <td>{{ $data->amount ?? '-' }}</td>
                                                <td>{{ $data->withdrawal_amount ?? '-' }}</td>
                                                <td>
                                                    @if($data->status == "pending")
                                                        <span class="badge badge-outline-warning">Pending</span>
                                                    @elseif($data->status == "completed")
                                                        <span class="badge badge-outline-success">Completed</span>
                                                    @elseif ($data->status == "rejected")
                                                        <span class="badge badge-outline-danger">Rejected</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y, h:i A') }}</td>
                                                <td>
                                                    @if($data->status == "pending")
                                                        <a href="{{ route('viewtransaction', md5($data->id)) }}" class="link-info fs-15" title="Approve Transaction">Approve</a>
                                                    @elseif($data->status == "completed")
                                                        <a href="#" class="link-success disabled fs-15" style="pointer-events: none;">Approved <i class="bi bi-check text-success"></i></a>
                                                    @elseif($data->status == "rejected")
                                                        <a href="#" class="link-danger disabled fs-15" style="pointer-events: none;">Rejected</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">No Pending Transactions Found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>



                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">
                        <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">All Transactions History</h4>
                            <div class="page-title-right">
                                <a href="{{ route('playertransactions', ['id' => md5($user->id), 'filter' => 'all']) }}">View All</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 ">
                        <div class="card">

                            <div class="card-body">

                                <div class="table-responsive table-card mt-4">
                                    <table class="table table-centered align-middle table-nowrap mb-0" id="historyTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>S. No</th>
                                                <th scope="col">Player Details</th>
                                                <th scope="col">Transaction Type</th>
                                                <th scope="col">Payment Type</th>
                                                <th scope="col">Deposit Amount</th>
                                                <th scope="col">Withdrawal Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($transaction_history as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('viewplayer', md5($data->user->id)) }}" title="View Player">
                                                        <div class="d-flex align-items-center fw-medium">
                                                             @if(!empty($data->user->profile_image) && Storage::disk('public')->exists($data->user->profile_image))
                                                            <img src="{{ asset('storage/app/public/' . $data->user->profile_image) }}" alt="" class="avatar-xxs me-2">
                                                            @else
                                                            <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle me-2" />
                                                            @endif
                                                            <div>
                                                                <p class="mb-0 text-primary">{{ ucfirst($data->user->name) }}</p>
                                                                <p class="mb-0 transaction_email text-body">{{ $data->user->email }}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($data->transaction_type == 'withdrawal')
                                                        <span class="text-secondary">Withdrawal</span>
                                                    @elseif($data->transaction_type == 'deposit')
                                                        <span class="text-info">Deposit</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($data->transaction_type == 'withdrawal')
                                                        {{ $data->paymentMethod?->method_name ?? 'Null' }}
                                                    @elseif($data->transaction_type == 'deposit')
                                                        {{ ucfirst($data->deposit_method_id ?? 'Null') }}
                                                    @endif
                                                </td>
                                                <td>{{ $data->amount ?? '-' }}</td>
                                                <td>{{ $data->withdrawal_amount ?? '-' }}</td>
                                                <td>
                                                    @if($data->status == "pending")
                                                        <span class="badge badge-outline-warning">Pending</span>
                                                    @elseif($data->status == "completed")
                                                        <span class="badge badge-outline-success">Completed</span>
                                                    @elseif ($data->status == "rejected")
                                                        <span class="badge badge-outline-danger">Rejected</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y, h:i A') }}</td>
                                                <td>
                                                    @if($data->status == "pending")
                                                        <a href="{{ route('viewtransaction', md5($data->id)) }}" class="link-info fs-15" title="Approve Transaction">Approve</a>
                                                    @elseif($data->status == "completed")
                                                        <a href="#" class="link-success disabled fs-15" style="pointer-events: none;">Approved <i class="bi bi-check text-success"></i></a>
                                                    @elseif($data->status == "rejected")
                                                        <a href="#" class="link-danger disabled fs-15" style="pointer-events: none;">Rejected</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">No Transactions Found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">
                                    {{-- <div class="col-sm">

                                        <div class="text-muted">
                                            Showing <span class="fw-semibold">{{ $transaction_history->firstItem() }}</span> to
                                            <span class="fw-semibold">{{ $transaction_history->lastItem() }}</span> of
                                            <span class="fw-semibold">{{ $transaction_history->total() }}</span> Results
                                        </div>

                                    </div> --}}
                                    {{-- <div class="col-sm-auto">

                                            <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center justify-content-sm-start">
                                            @if ($transaction_history->onFirstPage())
                                                <li class="page-item disabled"><a href="#" class="page-link">←</a></li>
                                            @else
                                                <li class="page-item"><a href="{{ $transaction_history->previousPageUrl() }}" class="page-link">←</a></li>
                                            @endif

                                            @foreach ($transaction_history->getUrlRange(1, $transaction_history->lastPage()) as $page => $url)
                                                <li class="page-item {{ $page == $transaction_history->currentPage() ? 'active' : '' }}">
                                                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            @if ($transaction_history->hasMorePages())
                                                <li class="page-item"><a href="{{ $transaction_history->nextPageUrl() }}" class="page-link">→</a></li>
                                            @else
                                                <li class="page-item disabled"><a href="#" class="page-link">→</a></li>
                                            @endif
                                        </ul>


                                    </div> --}}
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <!--end card-->

            </div>
            <!--end tab-pane-->
            <div class="tab-pane fade" id="projects" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card profile-project-card shadow-none mt-3">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <div class="text-center mb-4 me-3">
                                                <img src="assets/images/companies/img-1.png" alt="" width="30px" height="30px" class="">
                                            </div>
                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Chat App Update</a></h5>
                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">2 year Ago</span></p>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="col text-end dropdown"> <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-list" href="#addmemberModal" data-bs-toggle="modal" data-edit-id="12"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-list" href="#removeMemberModal" data-bs-toggle="modal" data-remove-id="12"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3 align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                    </div>
                                                    <div class="avatar-group">
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                    J
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="badge text-warning bg-warning-subtle fs-10">Inprogress</div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h5 class="fs-12">Progress <span class="text-danger float-end">80%</span></h5>
                                            <div class="progress progress-bar-alt-danger progress-sm">
                                                <div class="progress-bar bg-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; visibility: visible; animation-name: animationProgress;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!--end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card profile-project-card shadow-none mt-3">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <div class="text-center mb-4 me-3">
                                                <img src="assets/images/companies/img-2.png" alt="" width="30px" height="30px" class="">
                                            </div>
                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">ABC Project Customization</a></h5>
                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">2 month Ago</span></p>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="col text-end dropdown"> <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-list" href="#addmemberModal" data-bs-toggle="modal" data-edit-id="12"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-list" href="#removeMemberModal" data-bs-toggle="modal" data-remove-id="12"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3 align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                    </div>
                                                    <div class="avatar-group">
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="badge text-primary  bg-primary-subtle fs-10">Progress</div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h5 class="fs-12">Progress <span class="text-danger float-end">65%</span></h5>
                                            <div class="progress progress-bar-alt-danger progress-sm">
                                                <div class="progress-bar bg-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%; visibility: visible; animation-name: animationProgress;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card profile-project-card shadow-none mt-3">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <div class="text-center mb-4 me-3">
                                                <img src="assets/images/companies/img-3.png" alt="" width="30px" height="30px" class="">
                                            </div>
                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Client - Frank Hook</a></h5>
                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">1 year Ago</span></p>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="col text-end dropdown"> <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-list" href="#addmemberModal" data-bs-toggle="modal" data-edit-id="12"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-list" href="#removeMemberModal" data-bs-toggle="modal" data-remove-id="12"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3 align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                    </div>
                                                    <div class="avatar-group">
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                    M
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="badge text-info bg-info-subtle fs-10">New</div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h5 class="fs-12">Progress <span class="text-danger float-end">50%</span></h5>
                                            <div class="progress progress-bar-alt-danger progress-sm">
                                                <div class="progress-bar bg-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%; visibility: visible; animation-name: animationProgress;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card profile-project-card shadow-none mt-3">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <div class="text-center mb-4 me-3">
                                                <img src="assets/images/companies/img-5.png" alt="" width="30px" height="30px" class="">
                                            </div>
                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Hybrix Project</a></h5>
                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">11 year Ago</span></p>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="col text-end dropdown"> <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-list" href="#addmemberModal" data-bs-toggle="modal" data-edit-id="12"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-list" href="#removeMemberModal" data-bs-toggle="modal" data-remove-id="12"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3 align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                    </div>
                                                    <div class="avatar-group">
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="badge text-success  bg-success-subtle fs-10">Completed</div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h5 class="fs-12">Progress <span class="text-danger float-end">95%</span></h5>
                                            <div class="progress progress-bar-alt-danger progress-sm">
                                                <div class="progress-bar bg-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%; visibility: visible; animation-name: animationProgress;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card profile-project-card shadow-none mt-3">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <div class="text-center mb-4 me-3">
                                                <img src="assets/images/companies/img-6.png" alt="" width="30px" height="30px" class="">
                                            </div>
                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Brand Logo Design</a></h5>
                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">10 min Ago</span></p>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="col text-end dropdown"> <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-list" href="#addmemberModal" data-bs-toggle="modal" data-edit-id="12"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-list" href="#removeMemberModal" data-bs-toggle="modal" data-remove-id="12"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3 align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                    </div>
                                                    <div class="avatar-group">
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                    E
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="badge text-info bg-info-subtle fs-10">New</div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h5 class="fs-12">Progress <span class="text-danger float-end">38%</span></h5>
                                            <div class="progress progress-bar-alt-danger progress-sm">
                                                <div class="progress-bar bg-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 38%; visibility: visible; animation-name: animationProgress;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card profile-project-card shadow-none mt-3">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <div class="text-center mb-4 me-3">
                                                <img src="assets/images/companies/img-4.png" alt="" width="30px" height="30px" class="">
                                            </div>
                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Chat App</a></h5>
                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">8 hr Ago</span></p>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="col text-end dropdown"> <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-list" href="#addmemberModal" data-bs-toggle="modal" data-edit-id="12"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-list" href="#removeMemberModal" data-bs-toggle="modal" data-remove-id="12"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3 align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                    </div>
                                                    <div class="avatar-group">
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                    R
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="badge text-warning bg-warning-subtle fs-10">Inprogress</div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h5 class="fs-12">Progress <span class="text-danger float-end">76%</span></h5>
                                            <div class="progress progress-bar-alt-danger progress-sm">
                                                <div class="progress-bar bg-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: 76%; visibility: visible; animation-name: animationProgress;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!--end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card profile-project-card shadow-none mt-3">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <div class="text-center mb-4 me-3">
                                                <img src="assets/images/companies/img-8.png" alt="" width="30px" height="30px" class="">
                                            </div>
                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Bsuiness Template - UI/UX design</a></h5>
                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">7 month Ago</span></p>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="col text-end dropdown"> <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-list" href="#addmemberModal" data-bs-toggle="modal" data-edit-id="12"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-list" href="#removeMemberModal" data-bs-toggle="modal" data-remove-id="12"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3 align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                    </div>
                                                    <div class="avatar-group">
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                    R
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="badge text-success  bg-success-subtle fs-10">Completed</div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h5 class="fs-12">Progress <span class="text-danger float-end">87%</span></h5>
                                            <div class="progress progress-bar-alt-danger progress-sm">
                                                <div class="progress-bar bg-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%; visibility: visible; animation-name: animationProgress;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card profile-project-card shadow-none mt-3">
                                    <div class="card-body p-4">

                                        <div class="d-flex">
                                            <div class="text-center mb-4 me-3">
                                                <img src="assets/images/companies/img-7.png" alt="" width="30px" height="30px" class="">
                                            </div>
                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                <h5 class="fs-14 text-truncate"><a href="#" class="text-body">Project Update</a></h5>
                                                <p class="text-muted text-truncate mb-0">Last Update : <span class="fw-semibold text-body">48 min Ago</span></p>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="col text-end dropdown"> <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-list" href="#addmemberModal" data-bs-toggle="modal" data-edit-id="12"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a></li>
                                                        <li><a class="dropdown-item remove-list" href="#removeMemberModal" data-bs-toggle="modal" data-remove-id="12"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted"></i>Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3 align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div>
                                                        <h5 class="fs-12 text-muted mb-0">Members :</h5>
                                                    </div>
                                                    <div class="avatar-group">
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>
                                                        <div class="avatar-group-item">
                                                            <div class="avatar-xs">
                                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle img-fluid" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <div class="badge text-primary  bg-primary-subtle fs-10">progress</div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h5 class="fs-12">Progress <span class="text-danger float-end">69%</span></h5>
                                            <div class="progress progress-bar-alt-danger progress-sm">
                                                <div class="progress-bar bg-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100" style="width: 69%; visibility: visible; animation-name: animationProgress;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!--end col-->


                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="mt-4">
                                    <ul class="pagination pagination-separated justify-content-center mb-0">
                                        <li class="page-item disabled">
                                            <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active">
                                            <a href="javascript:void(0);" class="page-link">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link">5</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end tab-pane-->

            <div class="tab-pane fade" id="referrals" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                        </div>
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h3 class="card-title flex-grow-1 mb-0">Referrals</h3>


                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive table-card">
                                            <table class="table table-centered align-middle table-nowrap mb-0" id="referralsTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>S. No</th>
                                                        <th scope="col">Player Details</th>
                                                        {{-- <th scope="col">Transaction Type</th>
                                                        <th scope="col">Payment Type</th>
                                                        <th scope="col">Deposit Amount</th>
                                                        <th scope="col">Withdrawal Amount</th> --}}
                                                        <th scope="col">Status</th>
                                                        {{-- <th scope="col">Amount</th> --}}

                                                        <th scope="col">Created At</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($referrals as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a href="{{ route('viewplayer', md5($data->id)) }}" title="View Player">
                                                                <div class="d-flex align-items-center fw-medium">
                                                                    @if(!empty($data->user->profile_image) && Storage::disk('public')->exists($data->user->profile_image))
                                                                    <img src="{{ asset('storage/app/public/' . $data->user->profile_image) }}" alt="" class="avatar-xxs me-2">
                                                                    @else
                                                                    <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle me-2" />
                                                                    @endif
                                                                    <div>
                                                                        <p class="mb-0 text-primary">{{ ucfirst($data->name) }}</p>
                                                                        <p class="mb-0 transaction_email text-body">{{ $data->email }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            @if($user->is_active == 1)
                                                            <span class="badge text-success  bg-success-subtle">Active</span>
                                                            @elseif($user->is_active == 0)
                                                            <span class="badge text-danger  bg-danger-subtle">Inactive</span>
                                                            @elseif($user->is_active == 2)
                                                            <span class="badge text-warning  bg-warning-subtle">Banned</span>
                                                            @endif
                                                        </td>
                                                        {{-- <td>{{ $data->commissionsAsSource->sum('amount') }}</td> --}}
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y, h:i A') }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('viewplayer', md5($data->id)) }}" class="link-info fs-15"  title="Click to view player details">
                                                                            <i class="ri-eye-fill"></i>
                                                                </a>
                                                        </td>
                                                    </tr>
                                                @empty

                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                        </div>
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                    <h3 class="card-title flex-grow-1 mb-0">Commission On Deposit</h3>


                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive table-card">
                                            <table class="table table-centered align-middle table-nowrap mb-0" id="commissionTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>S. No</th>
                                                        <th scope="col">Player Details</th>
                                                        {{-- <th scope="col">Transaction Type</th>
                                                        <th scope="col">Payment Type</th>
                                                        <th scope="col">Deposit Amount</th>
                                                        <th scope="col">Withdrawal Amount</th> --}}
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Amount</th>

                                                        <th scope="col">Created At</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($commissions as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a href="{{ route('viewplayer', md5($data->sourceUser->id)) }}" title="View Player">
                                                                <div class="d-flex align-items-center fw-medium">
                                                                    @if(!empty($data->user->profile_image) && Storage::disk('public')->exists($data->user->profile_image))
                                                                    <img src="{{ asset('storage/app/public/' . $data->user->profile_image) }}" alt="" class="avatar-xxs me-2">
                                                                    @else
                                                                    <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle me-2" />
                                                                    @endif
                                                                    <div>
                                                                        <p class="mb-0 text-primary">{{ ucfirst($data->sourceUser->name) }}</p>
                                                                        <p class="mb-0 transaction_email text-body">{{ $data->sourceUser->email }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            @if($user->is_active == 1)
                                                            <span class="badge text-success  bg-success-subtle">Active</span>
                                                            @elseif($user->is_active == 0)
                                                            <span class="badge text-danger  bg-danger-subtle">Inactive</span>
                                                            @elseif($user->is_active == 2)
                                                            <span class="badge text-warning  bg-warning-subtle">Banned</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $data->amount }}</td>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($data->created_at)->format('d M Y, h:i A') }}
                                                        </td>
                                                        <td>
                                                           <a href="{{ route('viewplayer', md5($data->sourceUser->id)) }}" class="link-info fs-15"  title="Click to view player details">
                                                                            <i class="ri-eye-fill"></i>
                                                                </a>
                                                        </td>
                                                    </tr>
                                                @empty

                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end tab-pane-->

            <div class="tab-pane fade" id="documents" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                            <div class="flex-shrink-0">
                                <input class="form-control d-none" type="file" id="formFile">
                                <label for="formFile" class="btn btn-danger"><i class="ri-upload-2-fill me-1 align-bottom"></i> Upload File</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                <th scope="col">File Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Size</th>
                                                <th scope="col">Upload Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-transparent text-primary rounded fs-20">
                                                                <i class="bi bi-file-earmark-zip-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="ms-3 flex-grow-1">
                                                            <h6 class="fs-15 mb-0"><a href="javascript:void(0)" class="text-body">Artboard-documents.zip</a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Zip File</td>
                                                <td>4.57 MB</td>
                                                <td>12 Dec 2022</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                            <i class="bi bi-sliders2"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                            <li class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-transparent text-danger rounded fs-20">
                                                                <i class="bi bi-file-earmark-pdf-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="ms-3 flex-grow-1">
                                                            <h6 class="fs-15 mb-0"><a href="javascript:void(0);" class="text-body">Bank Management System</a></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>PDF File</td>
                                                <td>8.89 MB</td>
                                                <td>24 Nov 2022</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink3" data-bs-toggle="dropdown" aria-expanded="true">
                                                            <i class="bi bi-sliders2"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink3">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                            <li class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-transparent text-secondary rounded fs-20">
                                                                <i class="bi bi-file-earmark-play"></i>
                                                            </div>
                                                        </div>
                                                        <div class="ms-3 flex-grow-1">
                                                            <h6 class="fs-15 mb-0"><a href="javascript:void(0);" class="text-body">Tour-video.mp4</a></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>MP4 File</td>
                                                <td>14.62 MB</td>
                                                <td>19 Nov 2022</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink4" data-bs-toggle="dropdown" aria-expanded="true">
                                                            <i class="bi bi-sliders2"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink4">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                            <li class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-transparent text-success rounded fs-20">
                                                                <i class="bi bi-filetype-exe"></i>
                                                            </div>
                                                        </div>
                                                        <div class="ms-3 flex-grow-1">
                                                            <h6 class="fs-15 mb-0"><a href="javascript:void(0);" class="text-body">Account-statement.xsl</a></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>XSL File</td>
                                                <td>2.38 KB</td>
                                                <td>14 Nov 2022</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink5" data-bs-toggle="dropdown" aria-expanded="true">
                                                            <i class="bi bi-sliders2"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink5">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                            <li class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-transparent text-info rounded fs-20">
                                                                <i class="bi bi-folder"></i>
                                                            </div>
                                                        </div>
                                                        <div class="ms-3 flex-grow-1">
                                                            <h6 class="fs-15 mb-0">
                                                                <a href="javascript:void(0);" class="text-body">Project Screenshots Collection</a></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Floder File</td>
                                                <td>87.24 MB</td>
                                                <td>08 Nov 2022</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink6" data-bs-toggle="dropdown" aria-expanded="true">
                                                            <i class="bi bi-sliders2"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink6">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle"></i>View</a></li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle"></i>Download</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-transparent text-danger rounded fs-20">
                                                                <i class="bi bi-images"></i>
                                                            </div>
                                                        </div>
                                                        <div class="ms-3 flex-grow-1">
                                                            <h6 class="fs-15 mb-0">
                                                                <a href="javascript:void(0);" class="text-body">Hybrix-logo.png</a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>PNG File</td>
                                                <td>879 KB</td>
                                                <td>02 Nov 2022</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink7" data-bs-toggle="dropdown" aria-expanded="true">
                                                            <i class="bi bi-sliders2"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink7">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle"></i>Download</a></li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end tab-pane-->
        </div>
        <!--end tab-content-->
    </div>
    <!--end col-->
</div>


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
    $('#commissionTable').DataTable({
        dom: '<"row p-2"<"col-lg-4 text-center"B><"col-lg-4 text-center"l><"col-lg-4"f>>rtip',

        buttons: [
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
        ],
        paging: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: ''
        },
        lengthMenu: [5, 10, 25, 50],

    });
     $('#referralsTable').DataTable({
        dom: '<"row p-2"<"col-lg-4 text-center"B><"col-lg-4 text-center"l><"col-lg-4"f>>rtip',

        buttons: [
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
        ],
        paging: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: ''
        },
        lengthMenu: [5, 10, 25, 50],

    });
});

</script>
