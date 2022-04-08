@extends('layout')
@section('contents')
    @if (session('error'))
        <div class="alert alert-danger d-flex justify-content-center">{{ session('error') }}</div>
    @endif
    <div class="wrap__body mt-3">
        <div class="container">
            <div class="gallery">

                <div class="card-deck mt-3">
                    @foreach ($gallery as $gall)
                        <!-- Modal -->
                        <div class="modal fade" id="decodeeye{{ $gall->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Decoded Text</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        The decoded text is: {{ $gall->decoded }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 mt-5">
                            <div class="card position-relative" style="margin-left: 0px; margin-right:0px; height:333px;">
                                <img class="card-img-top" src="images/{{ $gall->image }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text" style="font-size: 15px;">
                                        {{ \Illuminate\Support\Str::limit($gall->text, 50, '....') }}</p>
                                    <div class="icons position-absolute" style="bottom: 15px;left: 155px;">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal{{ $gall->id }}"
                                            onclick="createGraph({{ $gall->id }},{{ $gall->before }},{{ $gall->after }}); return false;">
                                            <i class="fas fa-chart-line text-warning"></i>
                                        </a>
                                        <form action="{{ route('favourite.store') }}" method="post"
                                            enctype="multipart/form-data" style="  position: relative; top: -5px;">
                                            @csrf
                                            <input type="hidden" value="{{ $gall->id }}" name="gall_id">
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                            <button type="submit" class="btn"><i class="fa fa-bookmark text-info"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                        <a href="#" data-toggle="modal" data-target="#decodeeye{{ $gall->id }}"><i
                                                class="fa fa-eye text-danger" aria-hidden="true"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Modal for histogram -->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal{{ $gall->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Comparison of histogram after
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
                                        <div class="mse_psn">
                                            <span><b>Mean Square Error(MSE): </b><br>{{ $gall->mse }}</span><br>
                                            <span><b>Peak Signal-to-Noise Ratio(PSNR):</b> <br>{{ $gall->psnr }}</span>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach




                </div>
            </div>
            <div class="encode mt-5 mb-5">
                <h3>Encode and Decode</h3>
                <div class="cat-wrap">
                    <div class="category">
                        <div class="hell mt-5">Encoding</div>
                        <!-- Button trigger modal -->
                        <button type="button" class=" mt-3 btn btn-primary" data-toggle="modal" id="encodeModal"
                            data-target="#exampleModalCenter">
                            Start Encode
                        </button>
                    </div>
                    <div class="category">
                        <div class="hell mt-5">Decode</div>

                        <button type="button" class=" mt-3 btn btn-primary" data-toggle="modal" id="decodeModal"
                            data-target="#exampleModaldecode">
                            Start Decode
                        </button>
                    </div>

                </div>


            </div>


        </div>
        <div class="back" mt-></div>
    </div>

    </div>

    <!-- Modal encode-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="exampleModalLongTitle">Encoding the Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="text-danger text-center" style="margin: 0px 60px;">{{ $error }}</div>

                       @endforeach
                        @endif
                  
                    <form method="POST" action="/encode" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mt-5">

                                <div class="drop-zone">
                                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                    <input type="file" name="encode" class="drop-zone__input" required>
                                </div>

                            </div>
                            <div class="col-md-6 p-5">
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Text to be encoded</label>
                                    <input type="text" placeholder="Hidden text" class="form-control" name="encode_text"
                                        autocomplete="off" required />
                                </div>
                                <div class="form-group ">
                                    <label for="passphrase">Passphrase</label>
                                    <input type="text" pattern="\w{16}" id="passphrase" placeholder="16 digit passphrase"
                                        class="form-control" name="passphrase" autocomplete="off" required />
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visibility" value="public"
                                        id="public" onclick="ShowHideDiv()" required>
                                    <label class="form-check-label" for="public">
                                        Post Publicly
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visibility" value="private"
                                        id="private" onclick="ShowHideDiv()">
                                    <label class="form-check-label" for="private">
                                        Post Privately
                                    </label>
                                </div>
                                <div class="form-group mt-3" id="dvtext" style="display: none">
                                    <label for="exampleInputEmail1">Small Message</label>
                                    <input type="text" placeholder="Text Describing the image" class="form-control"
                                        name="message" />
                                </div>


                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Encode Message</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal decode --}}
    <div class="modal fade" id="exampleModaldecode" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="exampleModalLongTitle">Decoding the Image </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @error('passphrases')
                        <div class="text-danger" style="margin: 0px 60px;">{{ $message }}</div>
                    @enderror
                    @if (session('decode_error'))
                        <div class="text-danger" style="margin: 0px 60px;">{{ session('decode_error') }}</div>
                    @endif
                    @if (session()->has('decodedText'))
                        <div class="text__decode">
                            The Decoded Text is
                            {{ session('decodedText') }}
                        </div>
                    @endif
                    <form method="POST" action="/decode" enctype="multipart/form-data" id="formdecode">
                        @csrf
                        <div class="row">
                            <div class="col-md-12" style="margin-left:70px;">
                                <div class="drop-zone">
                                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                    <input type="file" name="decode" class="drop-zone__input" required>
                                </div>


                            </div>
                        </div>

                </div>
                <div class="form-group mx-auto">
                    <label for="passphrase">Enter PassPhrase:</label>
                    <input type="text" name="passphrases" id="passphrase" placeholder="16 digit passphrase">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Decode</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascripts')
    <script>
        function ShowHideDiv() {
            var chkYes = document.getElementById("public");
            var dvtext = document.getElementById("dvtext");
            dvtext.style.display = chkYes.checked ? "block" : "none";
        }
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        label: 'Before Encoding',
                        data: before,
                        backgroundColor: 'rgba(255, 26, 104, 0.2)',
                        borderColor: 'rgba(255, 26, 104, 1)',

                        borderWidth: 1
                    },
                    {
                        label: 'After Encoding',
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
        $(window).on('load', function() {

            @if (session()->has('decodedText'))
                $("#decodeModal").click();
                // $('#formdecode').css('display', 'none');
                // location.reload();
            @endif
            
            @if ($errors->has('passphrases') || session()->has('decode_error'))
                $("#decodeModal").click();
            @endif

            @if ($errors->has('encode_text','passphrase' ,'encode'))
                $('#encodeModal').click();
            @endif

            @if (session()->has('encode'))
                var a = document.createElement('a');
                a.href = "/images/{{session()->get('encode')}}";
                a.download = "encoded.png";
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            @endif
        });
    </script>
@endsection
