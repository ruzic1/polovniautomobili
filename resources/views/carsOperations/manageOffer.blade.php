<x-html-base>
    <h2 class='text-center'>Your offers</h2>
    <div class="container">
    <div class="row" style="display:flex;flex-wrap:wrap;">
        <div class="col-lg-12">
            <div class="row">
                    
                    @php
                        if(count($offers)!=0):
                        foreach($offers as $obj):
                        $year=$obj->production_date;
                        $format=new DateTime($year);      
                    @endphp
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                              <img src="{{ asset('storage/'.$obj->cover_image) }}" class='card-img-top' alt=""/>
                              <h5 class="card-title">{{$obj->brand->brand_name}} {{$obj->carModel->car_model}}</h5>
                              <p class="card-text">Color: {{$obj->color}}</p>
                              <p class="card-text">{{$obj->description}}</p>
                              <p class="card-text">Engine type: {{$obj->carEngine->car_engine}}</p>
                              <p class="card-text">Fuel type: {{$obj->fuelType->fuel_type}}</p>
                              <p class="card-text">Year of production: {{date_format($format,'Y')}}</p>
                              <p class="card-text">Mileage(in km): {{$obj->mileage}}</p>
                              <p class="card-text">Price: {{$obj->car_price}}&euro;</p>
                              <p class="card-text">Posted by: <a href='/users/showUserInfo/{{$obj->user_id}}'>{{$obj->user?->username}}</a></p>
                              <a href="/cars/{{$obj->id_offer}}" class="btn btn-primary">See more</a>
                            </div>
                        </div>
                    </div>
                    @php
                        endforeach;
                    else:
                        echo "<div class='alert alert-primary' role='alert'>There are no cars with applied filters</div>";
                    endif;
                    @endphp
            </div>
        </div>
        
    </div>
</div>
</x-html-base>