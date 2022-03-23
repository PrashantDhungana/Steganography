@extends('layout')
@section('contents')
    {{-- @dd($user); --}}
    <div class="wrapper">
        <div class="container-fluid" id="contains">
            <div class="row">
                <div class=" sidebar nav col-md-2 flex-column nav-pills pt-2" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                        aria-controls="v-pills-home" aria-selected="true">User Profile</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">History</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                        role="tab" aria-controls="v-pills-messages" aria-selected="false">Change Password</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                        role="tab" aria-controls="v-pills-settings" aria-selected="false">Favourite Saved</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-private_gallery"
                        role="tab" aria-controls="v-pills-private_gallery" aria-selected="false">Private Gallery</a>

                </div>


                <div class="col-md-10 tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="wrap mt-3">
                            <div class="row">
                                <div class="user col-md-4">
                                    <div class="profile">
                                        <img src="/storage/profile/{{ auth()->user()->avatar }}" alt="User Profile image"
                                            class="profile_image">
                                        <div class="profile_name">{{ auth()->user()->name }}</div>
                                        <p class="email">{{ auth()->user()->email }}</p>
                                        <button type="Admin" class="btn btn-primary" id="btnedit">Edit Profile</button>
                                    </div>
                                </div>
                                <div class="form col-md-8 display__control " id="editform">
                                    <div class="userb">
                                        <h3 class="text-dark px-auto font-weight-bold" style="padding-left: 256px;">Edit
                                            User Information</h3>
                                        <form class="m-3" method="POST"
                                            action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="name" class="form-control" id="exampleInputEmail1"
                                                    name="name" aria-describedby="emailHelp" placeholder="Enter Name"
                                                    value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    name="email" aria-describedby="emailHelp" placeholder="Enter email"
                                                    value="{{ $user->email }}">
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Profile Image</label>
                                                <input type="file" class="form-control" id="exampleInputPassword1"
                                                    name="avatar" value="">
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
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $post->image }} </td>
                                            <td>{{ $post->public == '0' ? 'private' : 'public' }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                <a href="#" type="button" rel="tooltip" data-toggle="modal"
                                                    data-target="#showModal{{ $post->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#" type="button" rel="tooltip" class="btn  "
                                                    data-toggle="modal" data-target="#postdelete{{ $post->id }}">
                                                    <i class="fas fa-trash-alt"></i></a>

                                            </td>

                                            {{-- modal for deleting post --}}
                                            <div class="modal fade" id="postdelete{{ $post->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title mx-auto" id="exampleModalLabel"
                                                                style="font-size: 1.5rem;">Delete the Post</h2>
                                                        </div>
                                                        <div class="modal-body mx-auto">
                                                            <h3 class="mx-auto">Are you sure you want to delete this
                                                                entry</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="post"
                                                                action="{{ route('gallery.destroy', $post->id) }}">
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

                                            <!-- Modal for viewing image -->
                                            <div class="modal fade bd-example-modal-lg" id="showModal{{ $post->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mx-auto" id="exampleModalLongTitle">View
                                                                Image and Decode Image</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="img-sec">
                                                                        <img src="/images/{{ $post->image }}" alt=""
                                                                            class="img-fluid">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="decode-block"
                                                                        id="decodes{{ $post->id }}"
                                                                        onclick="changeClick(this,{{ $post->id }},'{{ $post->decoded }}')">

                                                                        <a href=""><i class="bi bi-lock-fill mr-2"></i></a>
                                                                        Decode message

                                                                    </div>
                                                                    <span class="enc_text"
                                                                        id="display_text{{ $post->id }}"
                                                                        style="display: none;"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close</button>

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
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <div class="card-pass">
                            <div class="img-sec col-md-6">
                                <h5 class="my-2">Lets Change the Password</h5>
                                <img src="/img/secure.png" / style="width: 100%">
                            </div>
                            <div class="text-sec col-md-6">
                                <form class="m-3" method="post" enctype="multipart/form-data"
                                    action="{{ route('update_password') }}">
                                    @csrf
                                    <div class="button form-group mt-5">
                                        <div class="file-upload mt-2">
                                            <input class="file-upload__input" type="file" name="currentimage" id="myFile">
                                            <button class="file-upload__button" type="button">Choose File(s)</button><br><br>
                                            <span class="file-upload__label"></span>
                                          </div>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Enter Password" name="password">
                                    </div>
                                    <div class="file-upload mt-2">
                                        <input class="file-upload__input" type="file" name="newimage" id="myFile">
                                        <button class="file-upload__button" type="button">Choose File(s)</button><br><br>
                                        <span class="file-upload__label"></span>
                                      </div>

                                      <div>
                                        <button type="submit" class="btn btn-primary mt-5 float-right">Submit</button>

                                      </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
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
                                    @foreach ($favourites as $favourite)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $favourite->image }} </td>
                                            <td>{{ $favourite->public == '0' ? 'private' : 'public' }}</td>
                                            <td>{{ $favourite->created_at }}</td>
                                            <td>
                                                <a href="#" type="button" rel="tooltip" data-toggle="modal"
                                                    data-target="#showModal{{ $favourite->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                {{-- <a href="#" type="button" rel="tooltip" class="btn  " data-toggle="modal" data-target="#postdelete{{ $post->id }}">
                                          <i class="fas fa-trash-alt"></i></a> --}}
                                                {{-- <a href=""><i class="bi bi-unlock-fill"></i></a> --}}

                                            </td>

                                            {{-- modal for deleting post --}}
                                            <div class="modal fade" id="postdelete{{ $favourite->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title mx-auto" id="exampleModalLabel"
                                                                style="font-size: 1.5rem;">Delete the Post</h2>
                                                        </div>
                                                        <div class="modal-body mx-auto">
                                                            <h3 class="mx-auto">Are you sure you want to delete this
                                                                entry</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="post"
                                                                action="{{ route('gallery.destroy', $favourite->id) }}">
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


                                            <!-- Modal for viewing image -->
                                            <div class="modal fade bd-example-modal-lg"
                                                id="showModal{{ $favourite->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mx-auto" id="exampleModalLongTitle">View
                                                                Image and Decode Image</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="img-sec">
                                                                        <img src="/images/{{ $favourite->image }}" alt=""
                                                                            class="img-fluid">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="decode-block"
                                                                        id="decodes{{ $favourite->id }}"
                                                                        onclick="changeClick(this,{{ $favourite->id }},'{{ $favourite->decoded }}')">

                                                                        <a href=""><i class="bi bi-lock-fill"></i></a>
                                                                        Decoding the message

                                                                    </div>
                                                                    <span class="enc_text"
                                                                        id="display_text{{ $favourite->id }}"
                                                                        style="display: none;"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close</button>

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
                    <div class="tab-pane fade" id="v-pills-private_gallery" role="tabpanel"
                        aria-labelledby="v-pills-private_gallery-tab">
                        <div class="private__gallery">
                            <div class="gallery">

                                <div class="card-deck mt-3">
                                    @foreach ($gallery as $gall)
                                        <div class="col-3 mt-5">
                                            <div class="card position-relative"
                                                style="margin-left: 0px; margin-right:0px; height:333px;">
                                                <img class="card-img-top" src="images/{{ $gall->image }}"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <p class="card-text" style="font-size: 15px;">
                                                        {{ \Illuminate\Support\Str::limit($gall->text, 50, '....') }}</p>
                                                    <div class="icons position-absolute" style="bottom: 15px;left: 195px;">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#exampleModal{{ $gall->id }}"
                                                            onclick="createGraph({{ $gall->id }},{{ $gall->before }},{{ $gall->after }}); return false;">
                                                            <i class="fas fa-chart-line text-warning"></i>
                                                        </a>
                                                        <form action="{{ route('favourite.store') }}" method="post"
                                                            enctype="multipart/form-data"
                                                            style="  position: relative; top: -5px;">
                                                            @csrf
                                                            <input type="hidden" value="{{ $gall->id }}"
                                                                name="gall_id">
                                                            <input type="hidden" value="{{ auth()->user()->id }}"
                                                                name="user_id">
                                                            <button type="submit" class="btn"><i
                                                                    class="fa fa-bookmark text-info"
                                                                    aria-hidden="true"></i></button>
                                                        </form>
                                                        {{-- <a href=""><i class="fa fa-eye text-danger" aria-hidden="true"></i></a> --}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal for histogram -->
                                        <div class="modal fade bd-example-modal-lg" id="exampleModal{{ $gall->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Comparison of
                                                            historgram after
                                                            encode and decode</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="chartCard">
                                                            <div class="chartBox">
                                                                <canvas id="myChart{{ $gall->id }}"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach




                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    {{-- //Modal --}}
@endsection

@section('javascripts')
    <script>
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        function generateString(length) {
            let result = '';
            const charactersLength = characters.length;
            for (let i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            return result;
        }

        function changeClick(element, id, finaltext) {

            //Create Decode Text Effect
            let randomString = generateString(finaltext.length)
            $(`#display_text${id}`).html(randomString)
            $(`#display_text${id}`).decrypt_effect({
                speed: 45,
                decrypted_text: finaltext
            });


            const div = document.querySelector(`#decodes${id}`);
            if (div.classList.contains("decode-block")) {
                document.getElementById(`decodes${id}`).innerHTML =
                    `<a href=""><i class="bi bi-unlock-fill mr-2"></i></a> Hide Message`;
                div.classList.remove("decode-block");
                element.classList.add("encodes");
                document.querySelector(`#display_text${id}`).style.display = "block"
            } else {
                document.getElementById(`decodes${id}`).innerHTML =
                    `<a href=""><i class="bi bi-lock-fill mr-2"></i></a> Decode Message`;
                div.classList.remove("encodes");
                element.classList.add("decode-block");
                document.querySelector(`#display_text${id}`).style.display = "none"
            }
        }
        //   $(document).ready( function() {

        // $("#decodes").click( function() {
        //   $(this).html('<a href=""><i class="bi bi-unlock-fill"></i></a> Encoding the message');
        // });


        // });
        // var $uniqueid = $("#decodes");
        // $uniqueid.attr('id', function (index) {
        //     return '#decodes' + index;
        // });


        // $( document ).on( "click", function( event ) {
        //   var listItem = document.getElementById( "decodes" );
        // alert( "Index: " + $( "#decodes" ).index( listItem ) );
        //   if($( "#decodes" ).closest( "#decodes" ).hasClass( "decode-block" )){
        //     console.log("hello")

        //   $( event.target ).closest( "#decodes" ).html('<a href=""><i class="bi bi-unlock-fill"></i></a> Encoding the message').addClass("encodes").removeClass("decode-block");

        //   }
        //   else{
        //     console.log("gulu")
        //     $( event.target ).closest( "#decodes" ).html('<a href=""><i class="bi bi-lock-fill"></i></a> Decoding the message').addClass("decode-block").removeClass("encodes");

        //   }
        // });
    </script>

    <script src="/js/decrypt.js"></script>

    <script>
        $('#btnedit').click(function() {
            $('#editform').toggle();
        });
        $(document).ready(function() {
            $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#v-pills-tab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
    <script>
        function createGraph(id, before, after) {
            let labelArray = []
            console.table(before)
            console.table(after)


            for (let i = 0; i < before.length; i++) {
                labelArray.push(i)
            }
            // setup 
            const data = {
                labels: labelArray,
                datasets: [{
                        label: 'Weekly Sales',
                        data: before,
                        backgroundColor: 'rgba(255, 26, 104, 0.2)',
                        borderColor: 'rgba(255, 26, 104, 1)',

                        borderWidth: 1
                    },
                    {
                        label: 'Weekly Sales',
                        data: after,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',

                        borderColor: 'rgba(255, 206, 86, 1)',

                        borderWidth: 1
                    },
                ]
            };

            // config 
            const config = {
                type: 'bar',
                data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // render init block
            const myChart = new Chart(
                document.getElementById(`myChart${id}`),
                config
            );
        }

        //encode javascript
        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
            const dropZoneElement = inputElement.closest(".drop-zone");

            dropZoneElement.addEventListener("click", (e) => {
                inputElement.click();
            });
            dropZoneElement.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZoneElement.classList.add("drop-zone--over");
            });

            inputElement.addEventListener("change", (e) => {
                if (inputElement.files.length) {
                    updateThumbnail(dropZoneElement, inputElement.files[0]);
                }
            });


            ["dragleave", "dragend"].forEach((type) => {
                dropZoneElement.addEventListener(type, (e) => {
                    // console.log("hello");
                    dropZoneElement.classList.remove("drop-zone--over");
                });
            });

            dropZoneElement.addEventListener("drop", (e) => {
                e.preventDefault();
                console.log(e.dataTransfer.files);

                if (e.dataTransfer.files.length) {
                    inputElement.files = e.dataTransfer.files;
                    // console.log(inputElement.files);
                    updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                }

                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        /**
         * Updates the thumbnail on a drop zone element.
         *
         * @param {HTMLElement} dropZoneElement
         * @param {File} file
        //  */
        function updateThumbnail(dropZoneElement, file) {
            console.log(dropZoneElement);
            console.log(file);
            let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

            // First time - remove the prompt
            if (dropZoneElement.querySelector(".drop-zone__prompt")) {
                dropZoneElement.querySelector(".drop-zone__prompt").remove();
            }

            // First time - there is no thumbnail element, so lets create it
            if (!thumbnailElement) {
                thumbnailElement = document.createElement("div");
                thumbnailElement.classList.add("drop-zone__thumb");
                dropZoneElement.appendChild(thumbnailElement);
            }

            thumbnailElement.dataset.label = file.name;

            // Show thumbnail for image files
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                };
            } else {
                thumbnailElement.style.backgroundImage = null;
            }
        }
    </script>
    <script>
        Array.prototype.forEach.call(
  document.querySelectorAll(".file-upload__button"),
  function(button) {
    const hiddenInput = button.parentElement.querySelector(
      ".file-upload__input"
    );
    const label = button.parentElement.querySelector(".file-upload__label");
    const defaultLabelText = "";

    // Set default text for label
    label.textContent = defaultLabelText;
    label.title = defaultLabelText;

    button.addEventListener("click", function() {
      hiddenInput.click();
    });

    hiddenInput.addEventListener("change", function() {
      const filenameList = Array.prototype.map.call(hiddenInput.files, function(
        file
      ) {
        return file.name;
      });

      label.textContent = filenameList.join(", ") || defaultLabelText;
      label.title = label.textContent;
    });
  }
);

    </script>
@endsection
