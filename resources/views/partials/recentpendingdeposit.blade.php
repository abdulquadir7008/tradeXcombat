<div class="row">


                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Recently Pending Deposit</h4>

													<a href="{{ route('pendingalltransactions', [ 'type' => 'deposit']) }}" class="flex-shrink-0 ml-1">View All <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                                                </div><!-- end card header -->

                                                <div class="card-body">
                                                    <div class="table-responsive table-card">
														<table class="table table-centered align-middle table-nowrap mb-0" id="currencyTable">
															<thead class="table-light">
																<tr>
                                                                     <th>S. No</th>
                                                                    {{-- <th>user id</th> --}}
																	<th scope="col">Player Details</th>
                                                                    {{-- <th scope="col">Email</th> --}}
                                                                    <th scope="col">Transaction Type</th>
                                                                    <th scope="col">Payment Type</th>
                                                                    <th scope="col">Deposit Amount</th>
																	<th scope="col">Status</th>
																	<th scope="col">Created At</th>
																	{{-- <th scope="col">Updated At</th> --}}

																	{{-- <th scope="col">Action</th> --}}
																</tr>
															</thead>
															<tbody>
															@forelse($recentPendingDeposits as $data)

																<tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    {{-- <td>{{ $data->user_id}}</td> --}}
																	<td>
                                                                        <a href="{{ route('viewplayer', md5($data->user->id)) }}" title="View Player">
                                                                        <div class="d-flex align-items-center fw-medium">
                                                                            {{-- <img src="{{ asset('storage/app/public/' . $data->user->profile_image) }}" alt="" class="avatar-xxs me-2"> --}}
                                                                            @if(!empty($data->user->profile_image) && Storage::disk('public')->exists($data->user->profile_image))
                                                                                <img src="{{ asset('storage/app/public/' . $data->user->profile_image) }}" alt="" class="avatar-xs rounded-circle me-2" />
                                                                                @else
                                                                                <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle me-2"  />

                                                                            @endif
                                                                            <div>
                                                                             <p class="mb-0 text-primary ">{{ ucfirst($data->user->name) }}</p>
                                                                            <p class="mb-0 transaction_email text-body">{{ $data->user->email }}</p>
                                                                            </div>


                                                                        </div>
                                                                        </a>
                                                                    </td>
                                                                     <td>@if($data->transaction_type == 'withdrawal')
                                                                            <span class="text-secondary">Withdrawal</span>
                                                                        @elseif($data->transaction_type == 'deposit')
                                                                            <span class="text-info">Deposit</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($data->transaction_type == 'withdrawal')
                                                                      {{ $data->paymentMethod?->method_name ? ucfirst($data->paymentMethod->method_name) : 'Null' }}

                                                                        @elseif($data->transaction_type == 'deposit')
                                                                        {{ ucfirst($data->deposit_method_id)}}
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $data->amount ?? '-' }}</td>
                                                                    {{-- <td>{{ $data->withdrawal_amount ?? '-' }}</td> --}}
																	<td>
																	@if($data->status == "pending")
																	<span class="badge badge-outline-warning">Pending</span>
																	@elseif($data->status == "completed")
																	<span class="badge badge-outline-success">Completed</span>
                                                                    @elseif ($data->status == "rejected")
																	<span class="badge badge-outline-danger">Rejected</span>

																	@endif
																	</td>
                                                                    <td>{{ $data->created_at }}</td>
																	{{-- <td>
                                                                        @if($data->status == "pending")
																			<a href="{{ route('viewtransaction', md5($data->id)) }}" class="link-info fs-15" title="Approve Transaction">Approve</a>
                                                                            @elseif($data->status == "completed")
																			<a href="" class="link-success disabled fs-15" aria-disabled="true" style="pointer-events: none;" title="">Approved<i class="bi bi-check text-success"></i></a>
                                                                            @elseif ($data->status == "rejected")
																			<a href="" class="link-danger disabled fs-15" aria-disabled="true" style="pointer-events: none;" title="">Rejected</a>

                                                                            @endif
																	</td> --}}
																</tr><!-- end tr -->
															@empty
																<tr>
																	<td colspan="8">No Records Found</td>
																</tr>
															@endforelse
															</tbody>
														</table>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
