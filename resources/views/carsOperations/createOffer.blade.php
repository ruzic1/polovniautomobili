<x-html-base>
  <div class="p-10 max-w-lg mx-auto mt-24">
  <section class="section section-bg" id="call-to-action" style="background-image: url({{asset('assets/images/banner-image-1-1920x500.jpg')}})">
      <div class="container">
          <div class="row">
              <div class="col-lg-10 offset-lg-1">
                  <div class="cta-content">
                      <br>
                      <br>
                      <h2>Create <em>Offer</em></h2>
                      <p>Create new offer that will be publicly visible</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <div class='d-flex justify-content-center'>
    <form method="POST" action="/cars" enctype="multipart/form-data" class='d-flex justify-content-center flex-column w-50'>
      @csrf
      <div>
        <h2 class='text-center'>Create new offer</h2>
      <div class="mb-6">
        <label for="brand" class="inline-block text-lg mb-2">Car brand</label>
        <select class='custom-select my-1 mr-sm-2' name="brand" id="brandRelations" onchange='handleDropdownChange(this)'>
          @php
              foreach($car as $obj):
          @endphp
              <option value="{{$obj->id_brand}}">{{$obj->brand_name}}</option>
          @php
              endforeach;    
          @endphp
        </select>

        @error('brand')
        <p class="text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="carModel" class="inline-block text-lg mb-2">Car model</label>
        <select class='custom-select my-1 mr-sm-2' name="carModel" id="carModel" disabled>
          
        </select>

        @error('carModel')
        <p class=" text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="carType" class="inline-block text-lg mb-2">Car type</label>
        <select class='custom-select my-1 mr-sm-2' name="carType" id="">
          @php
            foreach ($carType as $obj):
          @endphp
          <option value="{{$obj->id_car_type}}">{{$obj->car_type}}</option>
          @php
              endforeach;
          @endphp
        </select>

        @error('carType')
        <p class=" text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="fuelType" class="inline-block text-lg mb-2">Fuel Type</label>

          <select class='custom-select my-1 mr-sm-2' name="fuelType" id="">
            @php
            foreach ($fuelType as $obj):
          @endphp
          <option value="{{$obj->id_fuel_type}}">{{$obj->fuel_type}}</option>
          @php
              endforeach;
          @endphp

          </select>
        @error('fuelType')
        <p class="text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="transmission" class="inline-block text-lg mb-2">
          Transmission
        </label>
        <select class='custom-select my-1 mr-sm-2' name="transmission" id="">
          @php
            foreach ($transmission as $obj):
          @endphp
          <option value="{{$obj->id_transmission}}">{{$obj->transmission_type}}</option>
          @php
              endforeach;
          @endphp
        </select>
        @error('transmission')
        <p class="text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="carEngine" class="inline-block text-lg mb-2">
          Car engine
        </label>
        <select class='custom-select my-1 mr-sm-2' name="carEngine" id="">
        @php
            foreach ($carEngine as $obj):
          @endphp
          <option value="{{$obj->id_car_engine}}">{{$obj->car_engine}}</option>
          @php
              endforeach;
          @endphp
        </select>
        @error('carEngine')
        <p class="text-red-500 text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="carColor" class="form-inline inline-block text-lg mb-2">
          Car Color
        </label>
        <input type="text" id='carColor' name='carColor' placeholder='Enter car color'/>
        @error('carColor')
        <p class="text-red-500 text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="carColor" class="inline-block text-lg mb-2">
          Mileage
        </label>
        <input type="range" id="rangeInput" min="0" max="300000" step="1000" value="20000" name='mileage'>
                        <div id="rangeValue" name='mileage'>20000</div>
        @error('carEngine')
        <p class="text-red-500 text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="coverImage" class="inline-block text-lg mb-2">
          Car cover image
        </label>
        <input type="file" class='form-control-file border border-gray-200 rounded p-2 w-full' name='coverImage'>
        @error('coverImage')
        <p class="text-red-500 text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="additionalImages" class="inline-block text-lg mb-2">
          Car additional images
        </label>
        <input type='file' class="form-control-file border border-gray-200 rounded p-2 w-full" name="additionalImages[]"
          multiple/>

        @error('additionalImages')
        <p class="text-red-500 text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>
      <script>
        const rangeInput = document.getElementById('rangeInput');
        const rangeValue = document.getElementById('rangeValue');
        rangeInput.addEventListener('input', function() {
            rangeValue.textContent = this.value;
        });
    </script>
      

      <!--<div class="mb-6">
        <label for="coverImage" class="inline-block text-lg mb-2">
          Car image
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="coverImage" />

       
      </div>-->

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Car Description
        </label>
        <textarea class="form-control border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Put your car description here">{{old('description')}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="carPrice" class="inline-block text-lg mb-2">
          Car price
        </label>
        <input class="form-control border border-gray-200 rounded p-2 w-full" name="carPrice"
          placeholder="Put your car price here"/>

        @error('carPrice')
        <p class="text-red-500 text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="">Number of seats</label>
        <select class='custom-select my-1 mr-sm-2' name="numberOfSeats" id="">
          <option value="2">2</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select>

        @error('numberOfSeats')
        <p class="text-red-500 text-xs mt-1" >{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="numberOfDoors" class="inline-block text-lg mb-2">
          Number of doors
        </label>
        <select class='custom-select my-1 mr-sm-2' name="numberOfDoors" id="">
          <option value="2">2</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>

        @error('numberOfDoors')
        <p class="text-red-500 text-xs mt-1" >{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6">
        <button class="bg-laravel text-black rounded py-2 px-4 hover:bg-black">
          Create Offer
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <!--<div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>-->
          <div class="modal-body">
            Only authorized users can submit a review
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
          </div>
        </div>
      </div>
    </div>
    
    
  </div>
  </x-html-base>