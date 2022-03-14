@extends('layout')
@section('contents')

<div class="wrap__body mt-3">
  <div class="container">
  <div class="gallery">
 
   <div class="card-deck mt-3">
   @foreach ($gallery as $gall)
    <div class="col-3 mt-5">
        <div class="card position-relative" style="margin-left: 0px; margin-right:0px; height:333px;">
            <img class="card-img-top" src="images/{{$gall->image}}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text" style="font-size: 15px;">{{\Illuminate\Support\Str::limit($gall->text,50,'....')}}</p>
              <div class="icons position-absolute" style="bottom: 15px;left: 155px;">
                <a href="#"   data-toggle="modal" data-target="#exampleModal{{$gall->id}}" 
                  onclick="createGraph({{$gall->id}},{{$gall->before}},{{$gall->after}}); return false;">
                  <i class="fas fa-chart-line text-warning"></i>
                </a>
                    <form action="{{route('favourite.store')}}" method="post" enctype="multipart/form-data" style="  position: relative; top: -5px;">
                      @csrf
                      <input type="hidden" value="{{$gall->id}}" name="gall_id">
                      <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                      <button type="submit" class="btn"><i class="fa fa-bookmark text-info" aria-hidden="true"></i></button>
                    </form>
                    <a href=""><i class="fa fa-eye text-danger" aria-hidden="true"></i></a>
              </div>

            </div>
        </div>
    </div>
    <!-- Modal for histogram --> 
    <div class="modal fade bd-example-modal-lg" id="exampleModal{{$gall->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Comparison of historgram after encode and decode</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="chartCard">
              <div class="chartBox">
                <canvas id="myChart{{$gall->id}}"></canvas>
              </div>
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
           <button type="button" class=" mt-3 btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
           Start Encode
           </button>               
       </div>
       <div class="category">
           <div class="hell mt-5">Decode</div>   
           {{-- <form action="/decode" method="POST" enctype="multipart/form-data">
             @csrf
             <input type="file" name="decode" required>
             <button type="submit" class="btn btn-primary">Start Decode</button>
           </form>           --}}
           <!-- Button trigger modal -->
           <button type="button" class=" mt-3 btn btn-primary" data-toggle="modal" data-target="#exampleModaldecode">
            Start Decode
            </button>   
       </div>

   </div>
    <!-- <div class="box">
      <div class="enc"><h6 class="hide">Hide message</h6></div>
      <div class="dec"><h6 class="decc">Decode message</h6></div>
    </div> -->

  </div>
 

  </div>
  <div class="back" mt-></div>
</div>

</div>

<!-- Modal encode-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title mx-auto" id="exampleModalLongTitle">Encoding the Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="/encode" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                    <div class="col-md-6">
                          {{-- <div class="drag-area gap-3">
                              <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                              <header>Encode</header>
                              <span>OR</span>
                              <button>Browse File</button> --}}
                              <div class="drop-zone">
                                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                <input type="file" name="myFile" class="drop-zone__input">
                              </div>
                          {{-- </div> --}}
                    </div>  
                      {{-- <input type="file" name="encode"> --}}
                      <div class="col-md-6 p-5">
                        <div class="form-group mt-3">
                          <label for="exampleInputEmail1">Text to be encoded</label>
                          <input type="text" placeholder="Hidden text" class="form-control" name="encode_text" autocomplete="off" />
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="visibility" value="public" id="chkYes" onclick="ShowHideDiv()">
                          <label class="form-check-label" for="exampleRadios2">
                            Post Publicly
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="visibility" value="public" id="chkNo" onclick="ShowHideDiv()">
                          <label class="form-check-label" for="exampleRadios2">
                            Post Privately
                          </label>
                        </div>
                        <div class="form-group mt-3" id="dvtext" style="display: none">
                          <label for="exampleInputEmail1">Small Message</label>
                          <input type="text" placeholder="Regular" class="form-control" name="message" />
                        </div>
            
                        
                      </div>
                  </div>
                    
          </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    {{-- modal decode --}}
    <div class="modal fade" id="exampleModaldecode" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Decode </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="/encode" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                    <div class="col-md-6">
                              <input type="file" name="encode">
                      
                    </div>  
                      {{-- <input type="file" name="encode"> --}}
                      <div class="col-md-6 p-5">
                        <div class="form-group mt-3">
                          <label for="exampleInputEmail1">Text to be encoded</label>
                          <input type="text" placeholder="Hidden text" class="form-control" name="encode_text" autocomplete="off" />
                        </div>
                  
            
                        
                      </div>
                  </div>
                    
          </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
          </form>
        </div>
      </div>
    </div>
@endsection
@section('javascripts')
<script>
  function ShowHideDiv() {
  var chkYes = document.getElementById("chkYes");
  var dvtext = document.getElementById("dvtext");
  dvtext.style.display = chkYes.checked ? "block" : "none";
}
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
function createGraph(id,before,after){
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
      borderColor:  'rgba(255, 26, 104, 1)',
        
      borderWidth: 1
    },
    {
      label: 'Weekly Sales',
      data: after,
      backgroundColor:'rgba(54, 162, 235, 0.2)',
      
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
document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
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
 */
function updateThumbnail(dropZoneElement, file) {
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
    
@endsection