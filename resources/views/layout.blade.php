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
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/css/styles.css" rel="stylesheet">
</head>
<body>
  

<div class="wrapper">
  <nav class="navbar navbar-expand-lg navbar-light bg-info m-0 py-2">
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
               <span class="mr-2 d-none d-lg-inline text-white small">Douglas McGee</span>
               <img class="img-profile rounded-circle"
                   src="avatar.png" height="25px" width="23px">
           </a>
           <!-- Dropdown - User Information -->
           <div class="dropdown-menu dropdown-menu-right bg-gray shadow animated--grow-in text-white"
               aria-labelledby="userDropdown">
               <a class="dropdown-item "  href="#">
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
               <!-- <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                   <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                   Logout
               </a> -->
               <form action="/logout" method="POST">
                 @csrf
                 <button type="submit" class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">Logout</button>
               </form>
           </div>
       </li>
   
       </ul>
     </div>
    </div>
     </nav>
     @yield('contents')
   
</div>





  
  
  



<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
         //selecting all required elements
const dropArea = document.querySelector(".drag-area"),
dragText = dropArea.querySelector("header"),
button = dropArea.querySelector("button"),
input = dropArea.querySelector("input");
let file; //this is a global variable and we'll use it inside multiple functions
button.onclick = ()=>{
  input.click(); //if user click on the button then the input also clicked
}
input.addEventListener("change", function(){
  //getting user select file and [0] this means if user select multiple files then we'll select only the first one
  file = this.files[0];
  dropArea.classList.add("active");
  showFile(); //calling function
});
//If user Drag File Over DropArea
dropArea.addEventListener("dragover", (event)=>{
  event.preventDefault(); //preventing from default behaviour
  dropArea.classList.add("active");
  dragText.textContent = "Release to Upload File";
});
//If user leave dragged File from DropArea
dropArea.addEventListener("dragleave", ()=>{
  dropArea.classList.remove("active");
  dragText.textContent = "Drag & Drop to Upload File";
});
//If user drop File on DropArea
dropArea.addEventListener("drop", (event)=>{
  event.preventDefault(); //preventing from default behaviour
  //getting user select file and [0] this means if user select multiple files then we'll select only the first one
  file = event.dataTransfer.files[0];
  showFile(); //calling function
});
function showFile(){
  let fileType = file.type; //getting selected file type
  let validExtensions = ["image/jpeg", "image/jpg", "image/png", "image/mp4", ]; //adding some valid image extensions in array
  if(validExtensions.includes(fileType)){ //if user selected file is an image file
    let fileReader = new FileReader(); //creating new FileReader object
    fileReader.onload = ()=>{
      let fileURL = fileReader.result; //passing user file source in fileURL variable
        // UNCOMMENT THIS BELOW LINE. I GOT AN ERROR WHILE UPLOADING THIS POST SO I COMMENTED IT
      let imgTag = `<img src="${fileURL}" alt="image">`; //creating an img tag and passing user selected file source inside src attribute
      dropArea.innerHTML = imgTag; //adding that created img tag inside dropArea container
    }
    fileReader.readAsDataURL(file);
  }else{
    alert("This is not an Image File!");
    dropArea.classList.remove("active");
    dragText.textContent = "Drag & Drop to Upload File";
  }
}
  AOS.init({
    duration: 1000,
    once: true,
  });
</script>














 


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" href="/js/bootstrap.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

          @yield('javascripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
          
 
</body>
</html>
