<x-html-base>
  <div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="cta-content">
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
    <section class="section" id="trainers" style='position:relative;top:0px'>
        <div class="container">
            <br>
            <br>
            <div class="container " style='display:grid;grid-template-columns: 75% 25%;'>
              <div class='item ' style='margin:8px;'>
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              
              <div class="carousel-inner">
                
                @foreach ($secondary as $item)
                <div class="carousel-item" >
                    <img class="d-block active" src="{{asset('storage/'.$item->secondary_image_src)}}" style='width:100%;height:700px;object-fit:cover' alt="Second slide">
                  </div>
                @endforeach
                
              </div>
              </div>
            
                <br>
                <br>
              <div class="image-list-container">
                <ul class="image-list d-flex flex-row" style='overflow-x:auto;white-space:nowrap;' id='imageCollection'>
                @foreach ($secondary as $imageObj)
                <!-- Your list of image items goes here -->
                <img class='childElement' src="{{asset('storage/'.$imageObj->secondary_image_src)}}" alt="Image 1" style='width:200px;border-radius:10px;border:3px solid white;margin:5px' data-id={{$imageObj->id_secondary_image}}>              
                
                @endforeach
                <script>
                  document.addEventListener('DOMContentLoaded',function(event){
                    //console.log('Klik je primecen');
                    var imageList=document.querySelectorAll('.image-list img');

                    imageList.forEach(function(image){
                      image.addEventListener('click',function(){
                        imageList.forEach(function(img){
                          img.classList.remove('active');
                        })

                        image.classList.add('active');
                        var mainImage = document.querySelector('.carousel-item img');
                        mainImage.src = image.src;
                      })
                    })

                  });
                </script>
                </ul>
              </div>
              </div>
              <div class="item " id='infoAboutOfferPrice' style='height:fit-content;margin:8px;padding:15px'>
                <h1>{{$preciseCar->brand->brand_name}} {{$preciseCar->carModel->car_model}}</h1>
                <h2>{{$preciseCar->car_price}}&dollar;</h2>
                <em>Rate this owner:</em>
                <form action="/submitMessage/{{$preciseCar->id_offer}}" method='GET'>
                  @csrf
                  <textarea class='form-control' name="reviewOwner" id="" cols="30" rows="10" placeholder='Give your opinion about owner.'></textarea>
                  <div class="rating">
    
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                  </div>
                  <button class="btn btn-primary d-flex justify-content-center" style='margin:0px auto;background-color:#ed563b;'>Submit your review</button>
                  <!--<button class="btn btn-primary d-flex justify-content-center" data-toggle="modal" data-target="#exampleModal" style='margin:0px auto;background-color:#ed563b;'>Submit your review</button>-->
                </form>
                
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">

                      <div class="modal-body">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                      
                    </div>
                  </div>
                </div>
                @if(session()->has('submitMessageInfo'))
                  <script>
                    $('#exampleModal').modal('show');
                    $('.modal-body').text("Only authorized users can submit reviews.")
                    console.log('Submitted message');
                  </script>
                {{session()->forget('message')}}
                @endif
                
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Launch demo modal
                </button>-->

                <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>-->
              </div>
            </div>
            

            <div class="row">
              @php
                  if(Auth::check()&&(($preciseCar->user_id)==(auth()->user()->user_id))):
              @endphp
              <li><a href='/cars/{{$preciseCar->id_offer}}/edit'><i class="fa fa-edit"></i>Edit offer</a></li>
              <li><a href='/cars/{{$preciseCar->id_offer}}'><i class="fa fa-trash"></i>Delete offer</a></li>
              @php
                  endif;   
              @endphp
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><i class="fa fa-cog"></i> Vehicle Specs</a></li>
                  <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Vehicle Description</a></li>
                  <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Vehicle Extras</a></li>
                  <li><a href='#tabs-4'><i class="fa fa-phone"></i> Contact Details</a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content' style="width: 100%;">
                  <article id='tabs-1'>
                    <h4>Vehicle Specs</h4>

                    <div class="row">
                       <div class="col-sm-6">
                            <label>Type</label>
                       
                            <p>Used vehicle</p>
                       </div>

                       <div class="col-sm-6">
                            <label>Make</label>
                       
                            <p>{{$preciseCar->brand->brand_name??false}}</p>
                       </div>

                       <div class="col-sm-6">
                            <label> Model</label>
                       
                            <p>{{$preciseCar->carModel->car_model??false}}</p>
                       </div>

                       <div class="col-sm-6">
                            <label>Mileage</label>
                       
                            <p>{{$preciseCar->mileage??false}}</p>
                       </div>

                       <div class="col-sm-6">
                            <label>Fuel</label>
                       
                            <p>{{ucfirst($preciseCar->fuelType->fuel_type??false)}}</p>
                       </div>

                       <div class="col-sm-6">
                            <label>Engine size</label>
                       
                            <p>{{$preciseCar->carEngine->car_engine??false}}l</p>
                       </div>

                       <div class="col-sm-6">
                            <label>Power</label>
                       
                            <p>85 hp</p>
                       </div>


                       <div class="col-sm-6">
                            <label>Gearbox</label>
                       
                            <p>{{ucfirst($preciseCar->transmission->transmission_type??false)}}</p>
                       </div>

                       <div class="col-sm-6">
                            <label>Number of seats</label>
                       
                            <p>{{$preciseCar->number_of_seats}}</p>
                       </div>

                       <div class="col-sm-6">
                            <label>Doors</label>
                       
                            <p>{{$preciseCar->number_of_doors}}</p>
                       </div>

                       <div class="col-sm-6">
                            <label>Color</label>
                       
                            <p>{{$preciseCar->color??false}}</p>
                       </div>
                    </div>
                  </article>
                  <article id='tabs-2'>
                    <h4>Vehicle Description</h4>
                    <p>{{$preciseCar->car_price??false}}</p>


                    <p>{{$preciseCar->description??false}}</p> 
                   </article>
                  <article id='tabs-3'>
                    <h4>Vehicle Extras</h4>

                    <div class="row">
                        @foreach ($equipment as $obj)
                        <div class="col-sm-6">
                          <p>{{$obj->car_equipment??false}}</p>
                      </div>
                        @endforeach   
                        <!--<div class="col-sm-6">
                            <p>ABS</p>
                        </div>
                        <div class="col-sm-6">
                            <p>Leather seats</p>
                        </div>
                        <div class="col-sm-6">
                            <p>Power Assisted Steering</p>
                        </div>
                        <div class="col-sm-6">
                            <p>Electric heated seats</p>
                        </div>
                        <div class="col-sm-6">
                            <p>New HU and AU</p>
                        </div>
                        <div class="col-sm-6">
                            <p>Xenon headlights</p>
                        </div>-->
                    </div>
                  </article>
                  <article id='tabs-4'>
                    <h4>Contact Details</h4>

                    <div class="row">   
                        <div class="col-sm-12">
                            <label>Name</label>

                            <p>{{$user->first_name}} {{$user->last_name}}</p>

                            <label>Mobile phone</label>
                            <p>{{$user->phone_number}}</p>

                            <label>Email</label>
                            <p><a href="#">{{$user->email}}</a></p>
                        </div>
                        
                    </div>
                  </article>
                </section>
              </div><!--Vehicle specs-->
            </div>
        </div>
        
        <script>
          const carouselItems = document.querySelectorAll('.carousel-item');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

// Function to display the specified item and hide others
function showCarouselItem(index) {
carouselItems.forEach((item, i) => {
if (i === index) {
  item.style.display = 'block';  // Display the item
} else {
  item.style.display = 'none';   // Hide other items
}
});
}

// Initially display the first item
let currentIndex = 0;
showCarouselItem(currentIndex);

// Event listener for the previous button
prevBtn.addEventListener('click', () => {
currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
showCarouselItem(currentIndex);
});

// Event listener for the next button
nextBtn.addEventListener('click', () => {
currentIndex = (currentIndex + 1) % carouselItems.length;
showCarouselItem(currentIndex);
});
      </script>
    </section>
</x-html-base>