<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content ="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>STEGGY Home</title>
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <script src="/js/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  {{-- <link rel="stylesheet" type="text/css" href="css"> --}}
  {{-- <link rel="stylesheet" type="text/css" href="index.css"> --}}
  <link href="/css/styles.css" rel="stylesheet">
</head>
<body>
  

<div class="wrapper">
  <nav class="navbar navbar-expand-lg navbar-light bg-info m-0 p-0">
    <div class="container">
     <li class="nav-item dropdown" style="list-style:none;" id="navbarNav">
       <a class="nav-link dropdown-toggle mx-2" data-toggle="dropdown" href="/destination.html" role="button" style="text-decoration: none; color: white;" aria-haspopup="true" aria-expanded="false">Menu</a>
       <div class="dropdown-menu">
         <a class="dropdown-item" href="/destination.html">User Profile</a>
         <a class="dropdown-item" href="#">User History</a>
         <a class="dropdown-item" href="#">Feeds</a>
     </li>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse mt-0 " id="navbarNav">
       <ul class="navbar-nav ml-auto">
        
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown text-white">
           <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="mr-2 d-none d-lg-inline text-white small">{{auth()->user()->name}}</span>
               <img class="img-profile rounded-circle"
                   src="avatar.png" height="25px" width="23px">
           </a>
           <!-- Dropdown - User Information -->
           <div class="dropdown-menu dropdown-menu-right bg-gray shadow animated--grow-in text-white"
               aria-labelledby="userDropdown">
               <a class="dropdown-item "  href="/user">
                   <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                   Profile
               </a>
               <a class="dropdown-item " href="#">
                   <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                   Settings
               </a>
               <a class="dropdown-item " href="#">
                   <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                   Activity Log
               </a>
               <div class="dropdown-divider text-white"></div>
               <form action="/logout" method="POST" class="dropdown-item">
                 @csrf
                   <button type="submit" >
                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                   </button>
                </a>
               </form>
           </div>
       </li>
   
       </ul>
     </div>
    </div>
     </nav>
     <div class="wrap__body mt-3">
       <div class="container">
       <div class="gallery">
         <div class="row">
           <h3>Gallery</h3>
           <div class="card-deck">
        @foreach ($gallery as $gall)
        <div class="col-sm-3 mt-3">
        <div class="card ">
            <img class="card-img-top" src="{{$gall->image}}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">{{$gall->text}}</p>
                <div class="icons">
                    <a href=""><i class="fa fa-bookmark" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>

                </div>
            </div>
          </div>
        </div>

            
        @endforeach
         
        </div>
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
                <button type="button" class=" mt-3 btn btn-primary" data-toggle="modal" data-target="#decodeModalCenter">
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

<!-- Modal encode -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/gallery" enctype="multipart/form-data">
              @csrf
                <div class="row">
                   <div class="col-md-6">
                        <div class="drag-area gap-3">
                            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                            <header>Encode</header>
                            <span>OR</span>
                            <span class="btn btn-secondary btn-file">
                              Browse file<input type="file" name="encode">
                          </span>
                          <p id="filename"></p>
                          </div>
                    </div>
                    <div class="col-md-6 p-5">
                      <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Text to be encoded</label>
                        <input type="text" placeholder="Hidden text" class="form-control" name="encode_text" />
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="visibility" id="chkYes" onclick="ShowHideDiv()" value="public">
                        <label class="form-check-label" for="exampleRadios2">
                          Post Publicly
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="visibility" id="chkNo" onclick="ShowHideDiv()" value="private" checked>
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
                  ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
      </div>
    </div>
</div>

{{-- Modal Decode --}}
<!-- Modal -->
<div class="modal fade" id="decodeModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="drag-darea gap-3">
                            <div class="icons"><i class="fas fa-cloud-upload-alt"></i></div>
                            <header>Encode</header>
                            <span>OR</span>
                            <span class="btn btn-secondary btn-file">
                              Browse file<input type="file" name="decode">
                          </span>
                          <p id="filename"></p>
                          </div>
                    </div>
                    <div class="col-md-6 p-5">
                      <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Text after Decoding</label>
                        <p>This is encoding</p>
                      </div>
                      
                  </div>
                  ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
      </div>
    </div>
</div>





  
  
  



<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvtext = document.getElementById("dvtext");
        dvtext.style.display = chkYes.checked ? "block" : "none";
    }
//     var fileInput = document.querySelector('input[type=file]');
//     var filenameContainer = document.querySelector('#filename');
//     fileInput.addEventListener('change', function() {
// 	filenameContainer.innerText = fileInput.value.split('\\').pop();
// });
         //selecting all required elements
// const dropArea = document.querySelector(".drag-area"),


// dragText = dropArea.querySelector("header"),
// button = dropArea.querySelector("button"),
// input = dropArea.querySelector("input");

// let file; //this is a global variable and we'll use it inside multiple functions
// button.onclick = ()=>{
//   input.click(); //if user click on the button then the input also clicked
// }
// input.addEventListener("change", function(){
//   //getting user select file and [0] this means if user select multiple files then we'll select only the first one
//   file = this.files[0];
//   dropArea.classList.add("active");
//   showFile(); //calling function
// });
// //If user Drag File Over DropArea
// dropArea.addEventListener("dragover", (event)=>{
//   event.preventDefault(); //preventing from default behaviour
//   dropArea.classList.add("active");
//   dragText.textContent = "Release to Upload File";
// });
// //If user leave dragged File from DropArea
// dropArea.addEventListener("dragleave", ()=>{
//   dropArea.classList.remove("active");
//   dragText.textContent = "Drag & Drop to Upload File";
// });
// //If user drop File on DropArea
// dropArea.addEventListener("drop", (event)=>{
//   event.preventDefault(); //preventing from default behaviour
//   //getting user select file and [0] this means if user select multiple files then we'll select only the first one
//   file = event.dataTransfer.files[0];
//   showFile(); //calling function
// });
// function showFile(){
//   let fileType = file.type; //getting selected file type
//   let validExtensions = ["image/jpeg", "image/jpg", "image/png", "image/mp4", ]; //adding some valid image extensions in array
//   if(validExtensions.includes(fileType)){ //if user selected file is an image file
//     let fileReader = new FileReader(); //creating new FileReader object
//     fileReader.onload = ()=>{
//       let fileURL = fileReader.result; //passing user file source in fileURL variable
//         // UNCOMMENT THIS BELOW LINE. I GOT AN ERROR WHILE UPLOADING THIS POST SO I COMMENTED IT
//       let imgTag = `<img src="${fileURL}" alt="image">`; //creating an img tag and passing user selected file source inside src attribute
//       dropArea.innerHTML = imgTag; //adding that created img tag inside dropArea container
//     }
//     fileReader.readAsDataURL(file);
//   }else{
//     alert("This is not an Image File!");
//     dropArea.classList.remove("active");
//     dragText.textContent = "Drag & Drop to Upload File";
//   }
// }

// // Decode area

// const dropDarea = document.querySelector(".drag-darea"),

// dragDtext = dropDarea.querySelector("header"),
// buttons = dropDarea.querySelector("button"),
// inputs = dropDarea.querySelector("input");
// let files; //this is a global variable and we'll use it inside multiple functions
// buttons.onclick = ()=>{
//   inputs.click(); //if user click on the button then the inputs also clicked
// }
// inputs.addEventListener("change", function(){
//   //getting user select file and [0] this means if user select multiple files then we'll select only the first one
//   files = this.files[0];
//   dropDarea.classList.add("active");
//   showFile(); //calling function
// });
// //If user Drag File Over DropArea
// dropDarea.addEventListener("dragover", (event)=>{
//   event.preventDefault(); //preventing from default behaviour
//   dropDarea.classList.add("active");
//  dragDtext.textContent = "Release to Upload File";
// });
// //If user leave dragged File from DropArea
// dropDarea.addEventListener("dragleave", ()=>{
//   dropDarea.classList.remove("active");
//  dragDtext.textContent = "Drag & Drop to Upload File";
// });
// //If user drop File on DropArea
// dropDarea.addEventListener("drop", (event)=>{
//   event.preventDefault(); //preventing from default behaviour
//   //getting user select file and [0] this means if user select multiple files then we'll select only the first one
//   files = event.dataTransfer.files[0];
//   showFile(); //calling function
// });
// function showFile(){
//   let fileType = files.type; //getting selected file type
//   let validExtensions = ["image/jpeg", "image/jpg", "image/png", "image/mp4", ]; //adding some valid image extensions in array
//   if(validExtensions.includes(fileType)){ //if user selected file is an image file
//     let fileReader = new FileReader(); //creating new FileReader object
//     fileReader.onload = ()=>{
//       let fileURL = fileReader.result; //passing user file source in fileURL variable
//         // UNCOMMENT THIS BELOW LINE. I GOT AN ERROR WHILE UPLOADING THIS POST SO I COMMENTED IT
//       let imgTag = `<img src="${fileURL}" alt="image">`; //creating an img tag and passing user selected file source inside src attribute
//       dropDarea.innerHTML = imgTag; //adding that created img tag inside dropDarea container
//     }
//     fileReader.readAsDataURL(files);
//   }else{
//     alert("This is not an Image File!");
//     dropDarea.classList.remove("active");
//    dragDtext.textContent = "Drag & Drop to Upload File";
//   }
// }




  AOS.init({
    duration: 1000,
    once: true,
  });
</script>














 


  
<script type="text/javascript" href="/js/bootstrap.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
          
 
</body>
</html>
