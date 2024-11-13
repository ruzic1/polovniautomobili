<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Offer;
use App\Models\Brand;
use App\Models\CarType;
use App\Models\Transmission;
use App\Models\FuelType;
use App\Models\CarEngine;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*dd($randomBrand->id_brand);
        dd($randomCarEngine);
        dd($randomCarType);
        dd($randomTransmission);
        dd($randomFuelType);*/
        /*dd(Offer::factory()->create([
            'id_brand'=>$randomBrand->id,
            'id_car_engine'=>$randomCarEngine->id,
            'id_car_type'=> $randomCarType->id,
            'id_transmission'=> $randomTransmission->id,
            'id_fuel_type'=> $randomFuelType->id,
        ]));*/
        Offer::factory(5)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
