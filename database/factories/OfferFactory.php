<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Brand;
use App\Models\Transmission;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\CarEngine;
use App\Models\CarModel;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brand=Brand::pluck('id_brand');
        $transmission=Transmission::pluck('id_transmission');
        $carType=CarType::pluck('id_car_type');
        $fuelType=FuelType::pluck('id_fuel_type');
        $carEngine=CarEngine::pluck('id_car_engine');
        $carModel=CarModel::pluck('id_car_model');
        

        //$factory->define(Offer::class,function(Faker $faker){
            return [
                'id_brand'=>$this->faker->randomElement($brand),
                'id_transmission'=>$this->faker->randomElement($transmission),
                'id_car_type'=>$this->faker->randomElement($carType),
                'id_fuel_type'=>$this->faker->randomElement($fuelType),
                'id_car_engine'=>$this->faker->randomElement($carEngine),
                'id_car_model'=>$this->faker->randomElement($carModel),
                //'id_brand'=>$faker->randomElement($brand),
                //
            ];
        //});
        
    }
}
