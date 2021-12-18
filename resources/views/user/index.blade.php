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
                                <div class="profile_name">Karishma Karki</div>
                                <p class="email">Karkikarishma143@gmail.com</p>
                                <button type="Admin" class="btn btn-primary">Edit Profile</button>
                            </div>
                           </div>
                           <div class="form col-md-8">
                            <form>
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
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="wrap">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus ratione deserunt veritatis, quod pariatur quos deleniti maxime non dolor, neque sequi ducimus maiores molestiae, odio esse est ut quis blanditiis consequatur doloribus minus nulla. Impedit magnam fuga amet, vero neque hic asperiores, velit quae illo exercitationem quisquam necessitatibus nobis odit reiciendis at id dolor earum repellat quidem rerum, nulla incidunt? Suscipit inventore eveniet ab, sequi illum nihil temporibus quam totam dolorum amet quae esse. Impedit ratione temporibus reprehenderit, eum unde earum fugit, quisquam atque, exercitationem sunt voluptatibus dolorum autem distinctio necessitatibus iure tenetur error iste molestiae excepturi accusamus fugiat dolorem. Dolorum, ab eveniet repellendus praesentium nobis porro atque explicabo, aperiam vel ipsam quia consectetur modi impedit magni, sunt fuga quas quam sapiente quis saepe at iure. Dicta odio, voluptatem earum esse harum delectus fugit vitae in ratione voluptatibus ex deserunt quisquam, exercitationem pariatur. Est et exercitationem corrupti distinctio totam consequatur dolorem, perspiciatis soluta impedit similique suscipit excepturi optio non vero consequuntur dolores ad temporibus omnis rerum, unde assumenda! Consequatur vitae rem asperiores numquam error assumenda, laboriosam molestias earum perspiciatis expedita sint unde voluptatem optio, suscipit mollitia quod eius ipsam repudiandae ipsum omnis enim minima doloribus neque quam. Minima, eligendi dolorum!
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
              </div>
          
       </div>
         
    </div>
</div>
    
@endsection