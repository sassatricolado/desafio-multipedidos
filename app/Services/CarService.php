<?php

namespace App\Services;

use App\Repositories\CarRepository;
use Error;

class CarService
{
    private $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function checkCarExistance(string $id)
    {
        $car = $this->repository->findCar($id);
        if ($car == null) {
            throw new Error("Car with id $id not found", 404);
        }
        return $car;
    }

    public function getAll()
    {
        return $this->repository->get();
    }

    public function saveCar(array $data)
    {
        $this->repository->save($data);
    }

    public function updateCar(string $id, array $data)
    {
        $car = $this->repository->findCar($id);
        $this->repository->update($car, $data);
    }

    public function softDelete(string $id)
    {
        $car = $this->checkCarExistance($id);
        $this->repository->remove($car);
    }
}
