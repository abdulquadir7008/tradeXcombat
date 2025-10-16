@extends('layouts.app')

{{-- @section('styles') --}}
<style>
.permission_check{
        border: var(--tb-border-width) solid #3055a6 !important;
}
.text-secondary_role{
    color:#0dcaf0  !important;
}
.text_title{
    color: rgb(79 125 193) !important;
}
.tradex-btn{
        background: linear-gradient(230deg, #4285f4, #212226) !important;
    color: white !important;
}
</style>
{{-- @endsection --}}

@section('content')
    @php
        function renderPageCheckboxes($pages, $level = 0)
        {
            foreach ($pages as $page) {
                echo '<div class="form-check mb-1 ms-' . $level * 2 . '">';
                echo '<input type="checkbox" class="form-check-input" id="page_' .
                    $page->page_id .
                    '" name="pages[]" value="' .
                    $page->page_id .
                    '">';
                echo '<label class="form-check-label" for="page_' .
                    $page->page_id .
                    '">' .
                    str_repeat('— ', $level) .
                    $page->pagename .
                    '</label>';
                echo '</div>';

                if ($page->children && $page->children->count()) {
                    renderPageCheckboxes($page->children, $level + 1);
                }
            }
        }
    @endphp

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
                     @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                     @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="container-fluid">

                    <div class="row">
                        {{-- Left Column: Roles --}}
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <form action="{{ route('role_permissions') }}" method="post">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4 col-lg-4">
                                                <h4 class="card-title mb-3 text-primary fs-21">Select A Role</h4>
                                                @foreach ($roles as $role)
                                                    <div class="form-check mb-4">
                                                        {{-- <input type="checkbox" class="form-check-input" id="role_{{ $role->id }}" name="roles" value="{{ $role->id }}">
                                                        <label class="form-check-label" for="role_{{ $role->id }}">{{ ucfirst($role->name) }}</label> --}}
                                                        <a href="javascript:void(0)" class="fs-17 view-permissions text-title"
                                                            data-role-id="{{ md5($role->id) }}"  data-role-name="{{ ucfirst($role->name) }}">
                                                            <i class="ri-file-user-line mx-2"></i>{{ ucfirst($role->name) }}
                                                        </a>

                                                    </div>
                                                @endforeach
                                            </div>


                                            {{-- <div class="col-md-6 col-lg-6 mt-2">
                                                <h4 class="card-title mb-3 text-primary fs-21 ">PAGES LIST  <span id="selected_id"></span></h4>
                                                @foreach ($pages as $page)
                                                    <div class="form-check mb-4">
                                                        <input type="checkbox" class="form-check-input parent-page permission_check"
                                                            id="page_{{ $page->page_id }}" name="pages[]"
                                                            value="{{ $page->page_id }}">
                                                        <label class="form-check-label fw-bold"
                                                            for="page_{{ $page->page_id }}">
                                                            <h5 class="fw-lighter text-primary">{{ $page->pagename }}
                                                            </h5>
                                                        </label>
                                                    </div>

                                                    @if ($page->children->count())
                                                        <div class="ms-4 mb-4">
                                                            @foreach ($page->children as $child)
                                                                <div class="form-check mb-2 fw-medium">
                                                                    <input type="checkbox" class="form-check-input permission_check child-page"
                                                                        id="subpage_{{ $child->page_id }}" name="pages[]"
                                                                        value="{{ $child->page_id }}" data-parent="{{ $page->page_id }}">
                                                                    <label class="form-check-label"
                                                                        for="subpage_{{ $child->page_id }}">{{ $child->pagename }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div> --}}
                                            <div class="col-md-6 col-lg-6 mt-2">
                                                <h4 class="card-title mb-3 text-primary fs-21">PAGES LIST <span id="selected_id" class=""></span></h4>

                                                <div class="row">
                                                    @foreach ($pages->chunk(ceil($pages->count() / 2)) as $chunk)
                                                        <div class="col-md-6">
                                                            @foreach ($chunk as $page)
                                                                <div class="form-check mb-3">
                                                                    <input type="checkbox" class="form-check-input parent-page permission_check"
                                                                        id="page_{{ $page->page_id }}" name="pages[]"
                                                                        value="{{ $page->page_id }}">
                                                                    <label class="form-check-label fw-medium fs-16" for="page_{{ $page->page_id }}">
                                                                        <span class=" text_title">{{ $page->pagename }}</span>
                                                                    </label>
                                                                </div>

                                                                @if ($page->children->count())
                                                                    <div class="ms-4 mb-3">
                                                                        @foreach ($page->children as $child)
                                                                            <div class="form-check mb-2">
                                                                                <input type="checkbox" class="form-check-input permission_check child-page"
                                                                                    id="subpage_{{ $child->page_id }}" name="pages[]"
                                                                                    value="{{ $child->page_id }}" data-parent="{{ $page->page_id }}">
                                                                                <label class="form-check-label  text_title" for="subpage_{{ $child->page_id }}">
                                                                                    {{ $child->pagename }}
                                                                                </label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <input type="hidden" name="role_id" id="selected_role_id" value="">



                                            <div class="col-md-2 col-lg-2 d-flex align-items-start">
                                                <div class="w-100">
                                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                                </div>
                                            </div>


                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.view-permissions', function() {
                var roleId = $(this).data('role-id');
                const roleName = $(this).data('role-name');
                 $('#selected_role_id').val(roleId);
                 $('#selected_id').text(" - " + roleName);
                   $('.view-permissions')
                    .removeClass('text-secondary_role')
                    .addClass('text_title');

    // Highlight selected
    $(this)
        .removeClass('text_title')
        .addClass('text-secondary_role');

                $.ajax({
                    url: "{{ route('getPermissions') }}",
                    type: "GET",
                    data: {
                        role_id: roleId
                    },
                    success: function(response) {
                        // console.log("Permissions: ", response);

                        $('input[name="pages[]"]').prop('checked', false);

                        if (response.page_ids && response.page_ids.length > 0) {
                            response.page_ids.forEach(function(pageId) {
                                $('#page_' + pageId).prop('checked', true);
                                $('#subpage_' + pageId).prop('checked', true);
                            });
                        }
                    },

                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
            $(document).on('change', '.parent-page', function () {
                // alert('hi');
                let parentId = $(this).val();
                // alert(parentId);
                let isChecked = $(this).is(':checked');
                // alert(isChecked);

                $(`.child-page[data-parent="${parentId}"]`).prop('checked', isChecked);
            });
        });
    </script>
@endsection
