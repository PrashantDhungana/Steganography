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
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Gallery Table</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">S.No</th>
                                <th class="border-top-0">Visibility</th>
                                <th class="border-top-0">Process</th>
                                <th class="border-top-0">Text</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gallery->public = '0'?'Private':'Public'}}</td>
                                    <td>{{ $gallery->process = '0'?'Encode':'Decode' }}</td>
                                    <td>{{ $gallery->text }}</td>

                                    <td>
                                        <span class="action">

                                
                                            <span>
                                                <a href="#" type="button" rel="tooltip"
                                                    class="btn btn-danger btn-icon btn-sm " data-bs-toggle="modal"
                                                    data-bs-target="#galleydelete{{ $gallery->id }}">
                                                    <i class="fas fa-trash-alt text-white"></i>
                                                </a>
                                            </span>
                                        </span>

                                    </td>


                                    {{-- delete modal --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="galleydelete{{ $gallery->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">User Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body mx-auto">
                                                    <h3 class="mx-auto">Are you sure you want to delete this
                                                        entry</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post"
                                                        action="{{ route('admin.destroy', $gallery->id) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button rel="tooltip" class="btn btn-danger ">
                                                            Yes
                                                        </button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
</div>
@endsection