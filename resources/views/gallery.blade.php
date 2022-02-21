@extends('layout')
@section('contents')
<div class="wrap__body mt-3">
  <div class="container">
  <div class="gallery">
  <div class="row">
   <div class="card-deck mt-3">
   @foreach ($gallery as $gall)
   <div class="col-sm-3 mt-5">
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
           <form action="/decode" method="POST" enctype="multipart/form-data">
             @csrf
             <input type="file" name="decode">
             <button type="submit" class="btn btn-primary">Start Decode</button>
           </form>          
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

<!-- Modal -->
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
       <form method="POST" action="/encode" enctype="multipart/form-data">
         @csrf
           <div class="row">
             <!-- <div class="col-md-6">
                   <div class="drag-area gap-3">
                       <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                       <header>Encode</header>
                       <span>OR</span>
                       <button>Browse File</button>
                       <input type="file" name="encode">
                   </div>
             </div>  -->
               <input type="file" name="encode">
               <div class="col-md-6 p-5">
                 <div class="form-group mt-3">
                   <label for="exampleInputEmail1">Text to be encoded</label>
                   <input type="text" placeholder="Hidden text" class="form-control" name="encode_text" autocomplete="off" />
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

    
@endsection
@section('javascripts')
<script>
  function ShowHideDiv() {
  var chkYes = document.getElementById("chkYes");
  var dvtext = document.getElementById("dvtext");
  dvtext.style.display = chkYes.checked ? "block" : "none";
}
  </script>
    
@endsection