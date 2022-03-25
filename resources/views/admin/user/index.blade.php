@extends('admin.layout')
@section('contents')
    {{-- @dd($users) --}}
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">User Table</h3>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">S.No</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Avatar</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->avatar }}</td>
                                        <td>
                                            <span class="action">

                                                <span>
                                                    <a href="" type="button" rel="tooltip"
                                                        class="btn btn-info btn-icon btn-sm " data-bs-toggle="modal"
                                                        data-bs-target="#usershow{{ $user->id }}">
                                                        <i class="fas text-white fa-eye"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a href="{{ route('admin.edit', $user->id) }}" type="button"
                                                        rel="tooltip" class="btn btn-warning btn-icon btn-sm "
                                                        data-original-title="" title="">
                                                        <i class="fas fa-edit text-white"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a href="#" type="button" rel="tooltip"
                                                        class="btn btn-danger btn-icon btn-sm " data-bs-toggle="modal"
                                                        data-bs-target="#userdelete{{ $user->id }}">
                                                        <i class="fas fa-trash-alt text-white"></i>
                                                    </a>
                                                </span>
                                            </span>

                                        </td>
                                        {{-- show modal --}}
                                        <!-- Modal -->
                                        <div class="modal fade" id="usershow{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" width="425px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">User Data Show</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      
                                                           <div class="image">
                                                               <div class="image_wrap">
                                                                   <img src="/storage/profile/{{$user->avatar}}"/ width="350px" height="auto">
                                                               </div>
                                                              
                                                           </div>
                                                           <div class="content__wrap col-md-12 ">
                                                            
                                                            <div class="span">
                                                                <span>Name:{{$user->name}}</span>
                                                            <span>Email:{{$user->email}}</span>
                                                            <span>Role::{{$user->is_admin = '0'?'User':'Admin'}}</span>
                                                            </div>
                                                            
                                                        </div>

                                                       
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- delete modal --}}
                                        <!-- Modal -->
                                        <div class="modal fade" id="userdelete{{ $user->id }}" tabindex="-1"
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
                                                            action="{{ route('admin.destroy', $user->id) }}">
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
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection
