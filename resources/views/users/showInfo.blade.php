<x-html-base>
  <x-hero-section>

  </x-hero-section>
    <div class="container bootstrap snippet">
        <div class="row">
              <div class="col-sm-10"><h1><small>User name:</small>{{$user->username}}</h1></div>
              @php
                  foreach($car as $obj):
              @endphp
                
              @php
                  endforeach;
              @endphp
            <div class="col-sm-2"><a href="/users" class="pull-right"></a></div>
        </div>
        <div class="row">
              <div class="col-sm-3">
          <div class="text-center">
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
          </div></hr><br>
    
                   
              <!--<div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
              </div>-->
              
              
              <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Send a message</strong></span></li>
              </ul> 
                   
              
            </div><!--/col-3-->
            <div class="col-sm-9">
              <section class="section" id="trainers">
              <div class="container">
                  <!--<div class="row">
                      <div class="col-lg-6 offset-lg-3">
                          <div class="section-heading">
                              <h2>Featured <em>Cars</em></h2>
                              <img src="assets/images/line-dec.png" alt="">
                              <p>Check the cars from our newest offer</p>
                          </div>
                      </div>
                  </div>-->
                  <div class="row">
                      @php
                          foreach ($car as $obj):
                      @endphp
                      <div class="col-lg-4">
                          <div class="trainer-item">
                              <div class="image-thumb">
                                  <img src="{{asset('storage/'.$obj->cover_image)}}" alt="">
                              </div>
                              <div class="down-content">
                                  <span>
                                      <sup>$</sup>{{$obj->car_price}}
                                  </span>
      
                                  <h4>{{$obj->brand->brand_name}} {{$obj->carModel->car_model}}</h4>
      
                                  <p>
                                      <i class="fa fa-dashboard"></i> {{$obj->mileage}}km &nbsp;&nbsp;&nbsp;
                                      <i class="fa fa-cube"></i> {{$obj->carEngine->car_engine}}l &nbsp;&nbsp;&nbsp;
                                      <i class="fa fa-cog"></i> {{ucfirst($obj->transmission->transmission_type)}} &nbsp;&nbsp;&nbsp;
                                      <i class="fa fa-cog"></i>Owner: {{$obj->user?->username}} &nbsp;&nbsp;&nbsp;
                                  </p>
      
                                  <ul class="social-icons">
                                      <li><a href="/cars/{{$obj->id_offer}}/edit"><i class="fa fa-edit"></i>Edit offer</a></li>
                                      <li><a href="/cars/{{$obj->id_offer}}"><i class="fa fa-trash"></i>Delete offer</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      @php
                          endforeach;
                      @endphp
      
                  </div>
      
                  <br>
      
                  <!--<div class="main-button text-center">
                      <a href="cars.html">View Cars</a>
                  </div>-->
              </div>
              </section>
            </div>
                 
            </div>
    
            </div><!--/col-9-->
        </div><!--/row-->
</x-html-base>