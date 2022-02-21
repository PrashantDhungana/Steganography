@extends('layout')
@section('contents')
<div class="wrapper">
    <div class="container" id="contains">
       <div class="row">
             <div class=" sidebar nav col-md-3 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">User Profile</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">History</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Change Password</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
              </div>
          
          
            <div class="col-md-9 tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="wrap mt-3">
                        <div class="row">
                           <div class="user col-md-4">
                            <div class="profile">
                                <img src="/img/user.png" alt="User Profile image" class="profile_image">
                                <div class="profile_name">{{auth()->user()->name}}</div>
                                <p class="email">{{auth()->user()->email}}</p>
                                <button type="Admin" class="btn btn-primary">Edit Profile</button>
                            </div>
                           </div>
                           <div class="form col-md-8 ">
                          <div class="userb">
                            <form class="m-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                  </div>
                                

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Enter confirmation Password">
                                  </div>
                                
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                          </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="wrap">
                      <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Image Name</th>
                            <th scope="col">Visibility</th>
                            <th scope="col">Uploaded At</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                              <a href="#" type="button" rel="tooltip"  data-toggle="modal" data-target="#showModal">
                                <i class="fas fa-eye"></i>
                                </a>                              
                                <a href=""><i class="fas fa-trash-alt"></i></a>
                              <a href=""><i class="bi bi-unlock-fill"></i></a>
                            </td>
                            
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Otto</td>

                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Otto</td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                   <div class="card-pass">
                       <div class="img-sec col-md-6">
                           <h5 class="my-2">Lets Change the Password</h5>
                           <img src="/img/secure.png"/ style="width: 100%">
                       </div>
                       <div class="text-sec col-md-6">
                        <form class="m-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              </div>
                            

                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Enter confirmation Password">
                              </div>
                            
                            <button type="submit" class="btn btn-primary mt-2 float-right">Submit</button>
                        </form>
                       </div>

                   </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
              </div>
          
       </div>
         
    </div>
</div>
    

{{-- //Modal --}}

<!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection