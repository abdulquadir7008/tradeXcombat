<div class="row">
    {{-- {{ dd($players) }} --}}
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Recently Added Players</h4>

                <a href="{{ route('players') }}" class="flex-shrink-0 ml-1">Manage Players <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-middle table-nowrap" id="recentTable">
                    <thead class="table-light">
                        <tr>

                            <th>S. No</th>
                                <th scope="col">Player Details</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Join Date</th>
                            <th scope="col">Country</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                            @foreach ($players as $key => $user)

                        <tr>

                            <td>{{ $loop->iteration }}</td>
                                <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    @if(!empty($user->profile_image) && Storage::disk('public')->exists($user->profile_image))
                                                    <img src="{{ asset('storage/app/public/' . $user->profile_image) }}" alt="" class="avatar-xs rounded-circle" />
                                                    @else
                                                    <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle" />

                                                    @endif
                                                </div>
                                                <div>
                                                    <p class="mb-0 text-primary ">{{ ucfirst($user->name) }}</p>
                                                    <p class="mb-0 transaction_email text-body">{{ $user->email  }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="phone">{{ $user->phone }}</span></td>
                                        <td><span class="date">{{ date('Y-m-d', strtotime($user->created_at)); }}</span></td>
                                        <td>{{ $user->country }}</td>
                                        <td>
                                            @if($user->is_active == 1)
                                            <span class="badge text-success  bg-success-subtle">Active</span>
                                            @elseif($user->is_active == 0)
                                            <span class="badge text-danger  bg-danger-subtle">Inactive</span>
                                            @elseif($user->is_active == 2)
                                            <span class="badge text-warning  bg-warning-subtle">Banned</span>

                                            @endif
                                        </td>
                                         <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('viewplayer', md5($user->id)) }}" class="link-info fs-15"  title="Click to view player details">
                                                                <i class="ri-eye-fill"></i>
                                                    </a>
                                                    <a href="{{ route('editplayer', md5($user->id)) }}" class="link-success fs-15"  title="Click to edit player details">
                                                        <i class="ri-edit-2-line"></i>
                                                    </a>

                                                </div>
                                            </td>
                            {{-- <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('viewplayer', md5($user->id)) }}" class="link-info fs-15"  title="Click to view player details">
                                                <i class="ri-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('editplayer', md5($user->id)) }}" class="link-success fs-15"  title="Click to edit player details">
                                        <i class="ri-edit-2-line"></i>
                                    </a>

                                </div>
                            </td> --}}
                        </tr>
                            @endforeach

                    </tbody>
                </table>
                <div class="noresult" style="display: none">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                        <h5 class="mt-2">Sorry! No Result Found</h5>
                    </div>
                </div>
            </div>

            </div>

        </div>
    </div>
</div>
