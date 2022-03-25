@extends('admin.layout')
@section('contents')
<div class="container-fluid">

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form class="p-2" action="{{route('admin.update',$user->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="name" value="{{$user->name}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$user->email}}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="row">
                <div class="mb-3 col-6">
                    <label for="exampleInputimage" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="exampleInputimage" aria-describedby="emailHelp" name="avatar">
                  </div>
                  <div class="mb-3 col-6">
                    <label for="exampleInputimage" class="form-label">Choose the role for user</label>
                  <select class="form-select " aria-label="Default select example" name="role">
                      <option selected>Select Admin</option>
                      <option value="0">User</option>
                      <option value="1">Admin</option>
                    </select>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
   </div>
@endsection