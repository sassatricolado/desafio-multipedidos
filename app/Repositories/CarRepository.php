<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository
{
    public function get()
    {
        return Car::select('id', 'model', 'make', 'year')->get();
    }

    public function findCar($id)
    {
        return Car::find($id);
    }

    public function save(array $data)
    {
        $car = new Car;
        $car->model = $data['model'];
        $car->make = $data['make'];
        $car->year = $data['year'];
        $car->save();
    }

    public function update(Car $car, array $data)
    {
        $car->model = $data['model'];
        $car->make = $data['make'];
        $car->year = $data['year'];
        $car->save();
    }

    public function remove(Car $car)
    {
        $car->users()->detach();
        $car->delete();
    }
}
