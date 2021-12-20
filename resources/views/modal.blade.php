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
                        <div class="drag-area gap-3">
                            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                            <header>Encode</header>
                            <span>OR</span>
                            <button>Browse File</button>
                            <input type="file" hidden>
                          </div>
                    </div>
                    <div class="col-md-6 p-5">
                      <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Text to be encoded</label>
                        <input type="text" placeholder="Regular" class="form-control" name="text" />
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="chkYes" onclick="ShowHideDiv()" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                          Post Publicly
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="chkNo" onclick="ShowHideDiv()" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                          Post Privately
                        </label>
                      </div>
                      <div class="form-group mt-3" id="dvtext" style="display: none">
                        <label for="exampleInputEmail1">Small Message</label>
                        <input type="text" placeholder="Regular" class="form-control" name="sm_text" />
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