<x-html-base>
  <div class="p-10 max-w-lg mx-auto mt-24">
  <section class="section section-bg" id="call-to-action" style="background-image: url({{asset('assets/images/banner-image-1-1920x500.jpg')}})">
      <div class="container">
          <div class="row">
              <div class="col-lg-10 offset-lg-1">
                  <div class="cta-content">
                      <br>
                      <br>
                      <h2>Edit <em>Offer</em></h2>
                      <p>Make changes to your offer</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <div class='d-flex justify-content-center'>
    <form method="POST" action="/cars" enctype="multipart/form-data" class='d-flex justify-content-center flex-column w-50'>
      @csrf
      <div>
        <h2 class='text-center'>Edit</h2>
      <div class="mb-6">
        <label for="brand" class="inline-block text-lg mb-2">Car brand</label>
        <select class='custom-select my-1 mr-sm-2' name="brand" id="brandRelations" onchange='handleDropdownChange(this)'>
          @php
              foreach($brand as $obj):
              //if($offer->id_brand)
          @endphp
              
              <option value="{{$obj->id_brand}}" {{$obj->id_brand==$offer->id_brand?'selected':''}}>{{$obj->brand_name}}</option>
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
        <select class='custom-select my-1 mr-sm-2' name="carModel" id="carModel" data-model={{$offer->id_car_model}}>
          <option value="{{$offer->id_car_model}}">{{$offer->carModel->car_model}}</option>
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
          <option value="{{$obj->id_car_type}}" {{$obj->id_car_type==$offer->id_car_type?'selected':''}}>{{$obj->car_type}}</option>
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
          <option value="{{$obj->id_fuel_type}}" {{$obj->id_fuel_type==$offer->id_fuel_type?'selected':''}}>{{$obj->fuel_type}}</option>
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
          <option value="{{$obj->id_transmission}}" {{$obj->id_transmission==$offer->id_transmission?'selected':''}}>{{$obj->transmission_type}}</option>
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
          <option value="{{$obj->id_car_engine}}" {{$obj->id_car_engine==$offer->id_car_engine?'selected':''}}>{{$obj->car_engine}}</option>
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
        <input type="range" id="rangeInput" min="0" max="300000" step="1000" value="{{$offer->mileage}}" name='mileage'>
                        <div id="rangeValue" name='mileage'>{{$offer->mileage}}</div>
        @error('carEngine')
        <p class="text-red-500 text-xs mt-1" style='color:red'>{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="coverImage" class="inline-block text-lg mb-2">
          Car cover image
        </label>
        <input type="file" class='form-control-file border border-gray-200 rounded p-2 w-full' name='coverImage'>
        <img class="img-thumbnail"
          src="{{$offer->cover_image ? asset('storage/' . $offer->cover_image) : asset('/images/no-image.png')}}" alt="" />
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

          @foreach ($secondary as $image)
            <img src="{{$image->secondary_image_src ? asset('storage/' . $image->secondary_image_src) : asset('/images/no-image.png')}}" width='200' height='200' alt=""/>
          @endforeach
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
        <button class="bg-laravel text-black rounded py-2 px-4 hover:bg-black">
          Create Offer
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </div>
  </x-html-base>