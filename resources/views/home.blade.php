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
                                <h2 class="mb-sm-0">Dashboard</h4>
								{{-- <div class="flex-shrink-0">
									<button type="button" class="btn btn-soft-info btn-md">
										<i class="ri-file-list-3-line align-middle"></i> Export
									</button>
								</div> --}}
                            </div>
							<div class="page-title-right mb-2">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);">Overview</a></li>
									<li class="breadcrumb-item active">Dashboard</li>
								</ol>
							</div>
                        </div>
                    </div>
                    <!-- end page title -->

                        <div class="row">
                            <div class="col">

                                <div class="h-100">
									@include('partials.summarycard')
									@include('partials.summarychart')
                                    @include('partials.recentplayers')
                                    @include('partials.recentpendingdeposit')
                                    @include('partials.recentpendingwithdraw')

                                </div> <!-- end .h-100-->

                            </div> <!-- end col -->
                            @include('partials.chatmodel')
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
@endsection
