@extends('layouts.app')

@section('content')
    <div id="layout-wrapper">
        @include('partials.topheader')
        @include('partials.header')
        @include('partials.sidebar')
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
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h2 class="mb-sm-0">News And Tutorials</h4>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-soft-info btn-md ml-3" data-bs-toggle="modal"
                                            data-bs-target="#addNewsModal">
                                            <i class="bi bi-plus align-middle"></i> Add New
                                        </button>

                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-4 col-md-4 col-sm-12">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Coin
                                                        Used</p>
                                                    <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                                            data-target="100">100</span></h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-success-subtle rounded fs-3">
                                                        <i class="ri-line-chart-line text-success"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                        <div class="animation-effect-6 text-success opacity-25 fs-18">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="animation-effect-4 text-success opacity-25 fs-18">
                                            <i class="bi bi-currency-pound"></i>
                                        </div>
                                        <div class="animation-effect-3 text-success opacity-25 fs-18">
                                            <i class="bi bi-currency-euro"></i>
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-4 col-md-4 col-sm-12">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                                        <i class=" ri-line-chart-line text-info"></i>
                                                    </span>
                                                </div>
                                                <div class="text-end flex-grow-1">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Total
                                                        Earning</p>
                                                    <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                                            data-target="30">30</span> </h4>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                        <div class="animation-effect-6 text-info opacity-25 left fs-18">
                                            <i class="bi bi-handbag"></i>
                                        </div>
                                        <div class="animation-effect-4 text-info opacity-25 left fs-18">
                                            <i class="bi bi-shop"></i>
                                        </div>
                                        <div class="animation-effect-3 text-info opacity-25 left fs-18">
                                            <i class="bi bi-bag-check"></i>
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-4 col-md-4 col-sm-12">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Total
                                                        Referral</p>
                                                    <h4 class="fs-22 fw-semibold mb-3">$<span class="counter-value"
                                                            data-target="1000">1000</span></h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                        <i class="ri-line-chart-line text-warning"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                        <div class="animation-effect-6 text-warning opacity-25 fs-18">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="animation-effect-4 text-warning opacity-25 fs-18">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <div class="animation-effect-3 text-warning opacity-25 fs-18">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div> <!-- end row-->
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row mt-2">
                        <div class="col">
                            <div class="h-100">
                                <div class="row">

                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">


                                            </div>
                                            <div class="card-body">

                                                <div class="table-responsive table-card">
                                                    <table class="table table-centered align-middle table-nowrap mb-0"
                                                        id="newsTable">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>S. No</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Icon</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Created At</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($news as $data)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>

                                                                    <td>{{ ucfirst($data->title) }}</td>
                                                                    <td>{{ ucfirst($data->category) }}</td>
                                                                    <td>
                                                                        @if (!empty($data->file_path) && Storage::disk('public')->exists($data->file_path))
                                                                            <img src="{{ asset('storage/app/public/' . $data->file_path) }}"
                                                                                class="avatar-md image-preview"
                                                                                data-image="{{ asset('storage/app/public/' . $data->file_path) }}"
                                                                                style="cursor:pointer;" />
                                                                        @else
                                                                            <img src="{{ asset('/assets/images/users/user-dummy-img.jpg') }}"
                                                                                alt=""
                                                                                class="avatar-xs rounded-circle" />
                                                                        @endif
                                                                    </td>


                                                                    <td>
                                                                        @if ($data->is_active == 1)
                                                                            <span
                                                                                class="badge text-success  bg-success-subtle">Show
                                                                                To all</span>
                                                                        @else
                                                                            <span
                                                                                class="badge text-danger  bg-danger-subtle">Don't
                                                                                Show</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $data->created_at }}</td>
                                                                    <td>


                                                                        <a href="javascript:void(0);" class="link-success fs-15 edit-news-btn" data-id="{{ md5($data->id) }}" title="Edit News">
                                                                                <i class="ri-edit-2-line"></i>
                                                                            </a>
                                                                        <form
                                                                            action="{{ route('deleteNews', md5($data->id)) }}"
                                                                            method="POST" class="currency-delete-form"
                                                                            style="display:inline;">
                                                                            @csrf
                                                                            <button type="button"
                                                                                class="btn btn-link p-0 m-0 align-baseline link-danger fs-15 btn-delete-news"
                                                                                title="Delete News">
                                                                                <i class="ri-delete-bin-line"></i>
                                                                            </button>
                                                                        </form>


                                                                    </td>
                                                                </tr><!-- end tr -->
                                                            @empty
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>


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
                <button type="button"
                    class="btn-success btn-rounded shadow-lg btn btn-icon layout-rightside-btn fs-22"><i
                        class="ri-chat-smile-2-line"></i></button>
            </div>

            @include('partials.footer')
        </div>
        <!-- end main content-->
    </div>
    </div>

    <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Create/Update News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="post" action="{{ route('createNews') }}" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">

                            {{-- First Row: Role Name & Share Person --}}
                            <div class="col-xl-6">
                                <label for="validationTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="validationTitle"
                                    placeholder="Enter Title" required value="{{ old('title') }}">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter News Title.</div>
                            </div>

                            <div class="col-xl-6">
                                <label for="validationCategory" class="form-label">Category</label>
                                <select class="form-select" name="category" id="validationCategory" required>
                                    <option value="">-- Select Category --</option>
                                    <option value="Individual" {{ old('category') == 'Individual' ? 'selected' : '' }}>
                                        Individual</option>
                                    <option value="Partner" {{ old('category') == 'Partner' ? 'selected' : '' }}>Partner
                                    </option>
                                    <option value="Corporate" {{ old('category') == 'Corporate' ? 'selected' : '' }}>
                                        Corporate</option>
                                    <option value="Investor" {{ old('category') == 'Investor' ? 'selected' : '' }}>
                                        Investor</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select a valid category.</div>
                            </div>





                            {{-- Third Row: Content --}}
                            <div class="col-xxl-12">
                                <label for="validationProgramDesc" class="form-label">Content</label>
                                <textarea class="form-control" name="content" id="validationContent" placeholder="Enter Content" rows="6"
                                    required>{{ old('content') }}</textarea>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter content.</div>
                            </div>


                            <div class="col-xl-12">
                                <label for="validationCustom02" class="form-label">Upload File</label>
                                <input type="file" class="form-control" name="file_path" id="validationfilepath"
                                     required/>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div id="uploadedFilePreview" class="mt-2">
                                    <img src="" id="editNewsPreview" class="avatar-md" style="max-height: 150px; display: none;">
                                </div>

                            </div>
                            <div class="col-xl-12">
                                <!-- Hidden input ensures '0' is submitted if switch is OFF -->
                                {{-- <input type="hidden" name="is_active" value="0"> --}}

                                <div class="form-check form-switch" dir="ltr">
                                    <input type="checkbox" class="form-check-input" name="is_active"
                                        id="customSwitchsizesm" value=""
                                        {{ old('is_active', isset($item) && $item->is_active ? 'checked' : '') }}>
                                    <label class="form-check-label" for="customSwitchsizesm">Show to All</label>
                                </div>
                            </div>







                            <input type="hidden" name="news_id" value="">

                            {{-- Buttons --}}
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Close Button -->
                <div class="modal-header border-0">
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                    <img src="" id="modalImage" class="img-fluid modalImage"
                        style="max-width: 50%; height: auto;" alt="Preview" />
                </div>
            </div>
        </div>
    </div>

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
        $(document).ready(function() {
            $('#newsTable').DataTable({
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
                // responsive: true,
                // order: [[0, 'desc']],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    emptyTable: "No Records Found"
                },
                lengthMenu: [5, 10, 25, 50]
            });
            $(document).on('click', '.edit-news-btn', function () {
                var newsId = $(this).data('id');

                $.ajax({
                    url: '/edit_news',
                    type: 'POST',
                    data: {
                        id: newsId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#validationTitle').val(data.title);
                        $('#validationContent').val(data.content);
                        $('#validationCategory').val(data.category);
                        $('input[name="news_id"]').val(newsId);

                          if (data.is_active == 1) {
                                $('#customSwitchsizesm').prop('checked', true);
                            } else {
                                $('#customSwitchsizesm').prop('checked', false);
                            }

                             if (data.file_path) {
                                    $('#editNewsPreview')
                                        .attr('src', 'storage/app/public/' + data.file_path)
                                        .show(); // make sure it's visible
                                } else {
                                    $('#editNewsPreview').hide(); // hide if no image
                                }

                        $('form').attr('action', '/update_news');
                        if (newsId) {
                    $('#validationfilepath').removeAttr('required');
                    } else {
                        $('#validationfilepath').attr('required', 'required');
                        }


                        $('#addNewsModal').modal('show');
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong while fetching News data!',
                        });
                    }
                });
            });
            const deleteButtons = document.querySelectorAll('.btn-delete-news');

            deleteButtons.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
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
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            form.submit();
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire({
                                title: "Cancelled",

                                customClass: {
                                    confirmButton: "btn btn-secondary mt-2"
                                },
                                buttonsStyling: false
                            });
                        }
                    });
                });
            });
            $('#addNewsModal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();

                $(this).find('input[name="news_id"]').val('');

                $(this).find('#editNewsPreview').attr('src', '').hide();

                $(this).find('form').attr('action', '/create_news');


            });

            $(document).on('click', '.image-preview', function() {
                var imageUrl = $(this).data('image');
                var img = new Image();
                img.onload = function() {
                    $('.modalImage').attr('src', imageUrl);
                    $('#imageModal').modal('show');
                };
                img.src = imageUrl;
            });


        });
    </script>
@endsection
