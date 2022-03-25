@extends('admin.layout')
@section('contents')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <!-- Card stats -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card  text-white" style="width: 18rem; background-color:#1e4db7;">
                <div class="card-body text-white">
                    <div class="dash-icon">
                        <span><i class="fas  fa-2x text-dark fa-lock"></i></span>
                        <div class="dash-text">
                            <h5 class="text-white text-center pl-2">Total Encodes</h5>
                            <h1 class="text-center">{{$encodeDecodeCount->encode_count}}
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  text-white" style="width: 18rem; background-color:#1e4db7;">
                <div class="card-body text-white">
                    <div class="dash-icon">
                        <span><i class="fas fa-2x text-dark fa-unlock"></i></span>
                        <div class="dash-text">
                            <h5 class="text-white text-center pl-2">Total Decodes</h5>
                            <h1 class="text-center">{{$encodeDecodeCount->decode_count}}
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  text-white" style="width: 18rem; background-color:#1e4db7;">
                <div class="card-body text-white">
                    <div class="dash-icon">
                        <span><i class="fas fa-2x text-dark fa-users"></i></span>
                        <div class="dash-text">
                            <h5 class="text-white text-center pl-2">User Count</h5>
                            <h1 class="text-center">{{ $usersCount->user_count}}
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card  text-white" style="width: 18rem; background-color:#1e4db7;">
                <div class="card-body text-white">
                    <div class="dash-icon">
                        <span><i class="fas fa-2x text-dark fa-user-shield"></i></span>
                        <div class="dash-text">
                            <h5 class="text-white text-center pl-2">Admin Count</h5>
                            <h1 class="text-center">{{ $usersCount->admin_count}}
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
       
    </div>
    <!-- Card stats -->
    <div class="row post">
        
        <div class="col-lg-4 col-md-6">
            <div class="card  text-white" style="width: 23rem; background-color:#fc4b6c;">
                <div class="card-body text-white">
                    <div class="dash-icon">
                        <span><i class="fas  fa-3x text-dark fa-images"></i></span>
                        <div class="dash-text">
                            <h5 class="text-white text-center pl-2">Total Images</h5>
                            <h1 class="text-center">{{$encodeDecodeCount->private_count + $encodeDecodeCount->public_count}}
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card  text-white" style="width: 23rem; background-color:#fc4b6c;">
                <div class="card-body text-white">
                    <div class="dash-icon">
                        <span><i class="fas fa-3x text-dark fa-photo-video"></i></span>
                        <div class="dash-text">
                            <h5 class="text-white text-center pl-2">Private Images</h5>
                            <h1 class="text-center">{{$encodeDecodeCount->private_count}}
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card  text-white" style="width: 23rem; background-color:#fc4b6c;">
                <div class="card-body text-white">
                    <div class="dash-icon">
                        <span><i class="fas fa-3x text-dark fa-photo-video"></i></span>
                        <div class="dash-text">
                            <h5 class="text-white text-center pl-2">Public Images</h5>
                            <h1 class="text-center">{{$encodeDecodeCount->public_count}}
                            </h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
       
    </div>
    {{-- <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h4 class="card-title">Sales Summary</h4>
                            <h6 class="card-subtitle">Ample admin Vs Pixel admin</h6>
                        </div>
                        <div class="ms-auto d-flex no-block align-items-center">
                            <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                <li class="list-inline-item d-flex align-items-center text-info"><i class="fa fa-circle font-10 me-1"></i> Ample
                                </li>
                                <li class="list-inline-item d-flex align-items-center text-primary"><i class="fa fa-circle font-10 me-1"></i> Pixel
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="amp-pxl mt-4" style="height: 350px;">
                        <div class="chartist-tooltip"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Weekly Stats</h4>
                    <h6 class="card-subtitle">Average sales</h6>
                    <div class="mt-5 pb-3 d-flex align-items-center">
                        <span class="btn btn-primary btn-circle d-flex align-items-center">
                            <i class="mdi mdi-cart-outline fs-4" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Top Sales</h5>
                            <span class="text-muted fs-6">Johnathan Doe</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">+68%</span>
                        </div>
                    </div>
                    <div class="py-3 d-flex align-items-center">
                        <span class="btn btn-warning btn-circle d-flex align-items-center">
                            <i class="mdi mdi-star-circle fs-4" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Best Seller</h5>
                            <span class="text-muted fs-6">MaterialPro Admin</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">+68%</span>
                        </div>
                    </div>
                    <div class="py-3 d-flex align-items-center">
                        <span class="btn btn-success btn-circle d-flex align-items-center">
                            <i class="mdi mdi-comment-multiple-outline text-white fs-4" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Most Commented</h5>
                            <span class="text-muted fs-6">Ample Admin</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">+68%</span>
                        </div>
                    </div>
                    <div class="py-3 d-flex align-items-center">
                        <span class="btn btn-info btn-circle d-flex align-items-center">
                            <i class="mdi mdi-diamond fs-4 text-white" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Top Budgets</h5>
                            <span class="text-muted fs-6">Sunil Joshi</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">+15%</span>
                        </div>
                    </div>

                    <div class="pt-3 d-flex align-items-center">
                        <span class="btn btn-danger btn-circle d-flex align-items-center">
                            <i class="mdi mdi-content-duplicate fs-4 text-white" ></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Best Designer</h5>
                            <span class="text-muted fs-6">Nirav Joshi</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">+90%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    {{-- <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex">
                        <div>
                            <h4 class="card-title">Top Selling Products</h4>
                            <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                        </div>
                        <div class="ms-auto">
                            <div class="dl">
                                <select class="form-select shadow-none">
                                    <option value="0" selected>Monthly</option>
                                    <option value="1">Daily</option>
                                    <option value="2">Weekly</option>
                                    <option value="3">Yearly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- title -->
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover align-middle text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Products</th>
                                    <th class="border-top-0">License</th>
                                    <th class="border-top-0">Support Agent</th>
                                    <th class="border-top-0">Technology</th>
                                    <th class="border-top-0">Tickets</th>
                                    <th class="border-top-0">Sales</th>
                                    <th class="border-top-0">Earnings</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a
                                                    class="btn btn-circle d-flex btn-info text-white">EA</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Elite Admin</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Single Use</td>
                                    <td>John Doe</td>
                                    <td>
                                        <label class="badge bg-danger">Angular</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="m-b-0">$2850.06</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a
                                                    class="btn btn-circle d-flex btn-orange text-white">MA</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Monster Admin</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Single Use</td>
                                    <td>Venessa Fern</td>
                                    <td>
                                        <label class="badge bg-info">Vue Js</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="m-b-0">$2850.06</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a
                                                    class="btn btn-circle d-flex btn-success text-white">MP</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Material Pro Admin</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Single Use</td>
                                    <td>John Doe</td>
                                    <td>
                                        <label class="badge bg-success">Bootstrap</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="m-b-0">$2850.06</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a
                                                    class="btn btn-circle d-flex btn-purple text-white">AA</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Ample Admin</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Single Use</td>
                                    <td>John Doe</td>
                                    <td>
                                        <label class="badge bg-purple">React</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="m-b-0">$2850.06</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
    {{-- <div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Comments</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="p-2"><img src="../assets/images/users/1.jpg" alt="user" width="50"
                                class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">James Anderson</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                and type setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">April 14, 2021</span> <span
                                    class="badge bg-primary">Pending</span> <span
                                    class="action-icons">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><img src="../assets/images/users/4.jpg" alt="user" width="50"
                                class="rounded-circle"></div>
                        <div class="comment-text active w-100">
                            <h6 class="font-medium">Michael Jorden</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                and type setting industry. </span>
                            <div class="comment-footer ">
                                <span class="text-muted float-end">April 14, 2021</span>
                                <span class="badge bg-success">Approved</span>
                                <span class="action-icons active">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="icon-close"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><img src="../assets/images/users/5.jpg" alt="user" width="50"
                                class="rounded-circle"></div>
                        <div class="comment-text w-100">
                            <h6 class="font-medium">Johnathan Doeting</h6>
                            <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                                and type setting industry. </span>
                            <div class="comment-footer">
                                <span class="text-muted float-end">April 14, 2021</span>
                                <span class="badge bg-danger">Rejected</span>
                                <span class="action-icons">
                                    <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                    <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Temp Guide</h4>
                    <div class="d-flex align-items-center flex-row m-t-30">
                        <div class="display-5 text-info"><i class="wi wi-day-showers"></i>
                            <span>73<sup>°</sup></span></div>
                        <div class="m-l-10">
                            <h3 class="m-b-0">Saturday</h3><small>Ahmedabad, India</small>
                        </div>
                    </div>
                    <table class="table no-border mini-table m-t-20">
                        <tbody>
                            <tr>
                                <td class="text-muted">Wind</td>
                                <td class="font-medium">ESE 17 mph</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Humidity</td>
                                <td class="font-medium">83%</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Pressure</td>
                                <td class="font-medium">28.56 in</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Cloud Cover</td>
                                <td class="font-medium">78%</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="row list-style-none text-center m-t-30">
                        <li class="col-3">
                            <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                            <span class="d-block text-muted">09:30</span>
                            <h3 class="m-t-5">70<sup>°</sup></h3>
                        </li>
                        <li class="col-3">
                            <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                            <span class="d-block text-muted">11:30</span>
                            <h3 class="m-t-5">72<sup>°</sup></h3>
                        </li>
                        <li class="col-3">
                            <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                            <span class="d-block text-muted">13:30</span>
                            <h3 class="m-t-5">75<sup>°</sup></h3>
                        </li>
                        <li class="col-3">
                            <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                            <span class="d-block text-muted">15:30</span>
                            <h3 class="m-t-5">76<sup>°</sup></h3>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
</div>
@endsection