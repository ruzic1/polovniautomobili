<x-html-base>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Cars</em></h2>
                        <p>Check our popular offers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <div class="contact-form">
                <form action="/showAllOffers" id="contact">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <!--<label>Used/New:</label>
                     
                                 <select>
                                      <option value="">All</option>
                                      <option value="new">New vehicle</option>
                                      <option value="used">Used vehicle</option>
                                 </select>-->
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Vehicle Type:</label>
                     
                                 <select name='carType'>
                                    <option value="">Choose none</option>
                                      @foreach ($carType as $obj)
                                          <option value="{{$obj->id_car_type}}" {{(request()->input('carType')==$obj->id_car_type)?'selected':''}}>{{$obj->car_type??false}}</option>
                                      @endforeach
                                 </select>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Brand:</label>
                     
                                 <select name='brand'>
                                    <option value="">Choose none</option>
                                    @foreach ($brand as $obj)
                                        <option value="{{$obj->id_brand}}" {{(request()->input('brand')==$obj->id_brand)?'selected':''}}>{{$obj->brand_name??false}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Model:</label>
                     
                                 <select name='carModel' placeholder='Models'>
                                    <!--<option disabled selected value="0">Models</option>-->
                                    <option value="">Choose none</option>
                                    @foreach ($carModel as $obj)
                                        <option value="{{$obj->id_car_model}}" {{(request()->input('carModel')==$obj->id_car_model)?'selected':''}}>{{$obj->car_model??false}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Price from</label>
                                <input type="text" name='priceFrom' value="{{old('priceFrom',request()->input('priceFrom'))}}"/>                     
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Price to</label>
                                <input type="text" name='priceTo' value="{{old('priceTo',request()->input('priceTo'))}}"/>                             
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mileage:</label>
                                
                                <input type="range" id="rangeInput" min="0" max="300000" step="1000" value="{{old('mileage',request()->input('mileage'))}}" name='mileage'>
                        <div id="rangeValue" name='mileage'>{{old('mileage',request()->input('mileage'))}}</div>
                            </div>
                        </div>
                        <script>
                            const rangeInput = document.getElementById('rangeInput');
                            const rangeValue = document.getElementById('rangeValue');
                            rangeInput.addEventListener('input', function() {
                                rangeValue.textContent = this.value;
                            });
                        </script>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Engine:</label>
                     
                                 <select name='carEngine'>
                                    <option value="">Choose none</option>
                                      @foreach ($carEngine as $obj)
                                          <option value="{{$obj->id_car_engine}}" {{(request()->input('carEngine')==$obj->id_car_engine)?'selected':''}}>{{$obj->car_engine??false}}</option>
                                      @endforeach
                                 </select>
                            </div>
                        </div>
                
                        <!--<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Power:</label>
                     
                                 <select>
                                      <option value="">-- All --</option>
                                      <option value="">-- All --</option>
                                      <option value="">-- All --</option>
                                      <option value="">-- All --</option>
                                 </select>
                            </div>
                        </div>-->
                
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Fuel:</label>
                     
                                 <select name='fuelType'>
                                    <option value="">Choose none</option>
                                      @foreach ($fuelType as $obj)
                                          <option value="{{$obj->id_fuel_type}}" {{(request()->input('fuelType')==$obj->id_fuel_type)?'selected':''}}>{{$obj->fuel_type??false}}</option>
                                      @endforeach
                                 </select>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Transmission:</label>
                     
                                 <select name='transmission'>
                                    <option value="">Choose none</option>
                                      @foreach ($transmission as $obj)
                                          <option value="{{$obj->id_transmission}}" {{(request()->input('transmission')==$obj->id_transmission)?'selected':''}}>{{$obj->transmission_type??false}}</option>
                                      @endforeach
                                 </select>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Doors:</label>
                     
                                 <select name='doors'>
                                    <option value="">Choose none</option>
                                      <option value="2" {{(request()->input('doors')=='2')?'selected':''}}>2 Doors</option>
                                      <option value="3" {{(request()->input('doors')=='3')?'selected':''}}>3 Doors</option>
                                      <option value="4" {{(request()->input('doors')=='4')?'selected':''}}>4 Doors</option>
                                      <option value="5" {{(request()->input('doors')=='5')?'selected':''}}>5 Doors</option>
                                 </select>
                            </div>
                        </div>
                
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Number of seats:</label>
                     
                                 <select name='numberOfSeats'>
                                    <option value="">Choose none</option>
                                      <option value="2" {{(request()->input('numberOfSeats')=='2')?'selected':''}}>2 Seats</option>
                                      <option value="4" {{(request()->input('numberOfSeats')=='4')?'selected':''}}>4 Seats</option>
                                      <option value="5" {{(request()->input('numberOfSeats')=='5')?'selected':''}}>5 Seats</option>
                                      <option value="7" {{(request()->input('numberOfSeats')=='7')?'selected':''}}>7 Seats</option>
                                 </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4 offset-sm-4">
                      <div class="main-button text-center">
                          <!--<a href="#" id='applyFilters'>Search</a>-->
                          <button type='submit'>Search</button>
                      </div>
                    </div>
                    <br>
                    <br>
                </form>
            </div>

            <div class="row">
                @if (count($offers)!=0)
                    
                @foreach ($offers as $obj)
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <!--<img src="assets/images/product-1-720x480.jpg" alt="">-->
                            
                            <img src="{{asset('storage/'.$obj->cover_image)}}" alt=""/>
                        </div>
                        <div class="down-content">
                            <span>
                                <sup>$</sup>{{$obj->car_price}}
                            </span>

                            <h4>{{$obj->brand->brand_name}} {{$obj->carModel->car_model}}</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> {{$obj->mileage}}km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> {{$obj->carEngine->car_engine}} &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> {{ucfirst($obj->transmission->transmission_type)}} &nbsp;&nbsp;&nbsp;                             
                                <i class="fa fa-cog"></i> {{$obj->user->username}} &nbsp;&nbsp;&nbsp;
                                
                            </p>

                            <ul class="social-icons">
                                <li><a href="/cars/{{$obj->id_offer}}">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

                @else

                <div class="alert alert-primary" role="alert" style='background-color:#ed563b;color:white'>
                    There are no offers with applied filters
                  </div>
                @endif
                <!--<div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-1-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-2-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-3-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-4-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-5-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/product-6-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>

                            <h4>Lorem ipsum dolor sit amet, consectetur</h4>

                            <p>
                                <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                            </p>

                            <ul class="social-icons">
                                <li><a href="car-details.html">+ View Car</a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            </div>

            <br>
                
            <nav>
              <!--<ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>-->
            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    
    <!-- ***** Footer Start ***** -->
    </x-html-base>