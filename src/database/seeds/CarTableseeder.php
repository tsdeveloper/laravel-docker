<?php

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car = factory(Car::class, 10)->create();

    }
}
