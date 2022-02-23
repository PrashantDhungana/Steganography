@extends('layout')
@section('contents')

<div class="wrap__body mt-3">
  <div class="container">
  <div class="gallery">
 
   <div class="card-deck mt-3">
   @foreach ($gallery as $gall)
    <div class="col-3 mt-5">
        <div class="card position-relative" style="margin-left: 0px; margin-right:0px; height:325px;">
            <img class="card-img-top" src="images/{{$gall->image}}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text" style="font-size: 15px;">{{$gall->text}}</p>
              <div class="icons position-absolute" style="bottom: 15px;left: 148px;">
                <a href="#"   data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-chart-line text-warning"></i>
                </a>
                    <a href=""><i class="fa fa-bookmark text-info" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-eye text-danger" aria-hidden="true"></i></a>
              </div>

            </div>
        </div>
    </div>
  

       
   @endforeach



<!-- Modal for histogram --> 
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // setup 
    const data = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: 'rgba(255, 26, 104, 0.2)',
        borderColor:  'rgba(255, 26, 104, 1)',
         
        borderWidth: 1
      },
      {
        label: 'Weekly Sales',
        data: [1, 19, 6, 9, 2, 8, 9],
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
      document.getElementById('myChart'),
      config
    );
    </script>
    
@endsection