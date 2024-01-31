<?php

namespace App\Services;

use App\Repositories\UserCarRepository;
use Error;
use Illuminate\Database\Eloquent\RelationNotFoundException;

class UserCarService
{
    private $repository;

    public function __construct(UserCarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function associate(string $userId, string $carId)
    {
        $user = $this->repository->findOrFailUser($userId);
        $car = $this->repository->findOrFailCar($carId);
        $this->repository->save($user, $car);
    }

    public function disassociate(string $userId, string $carId)
    {
        $user = $this->repository->findOrFailUser($userId);
        $car = $this->repository->findOrFailCar($carId);
        $this->repository->remove($user, $car);
    }

    public function getCars(string $userId)
    {
        $user = $this->repository->findOrFailUser($userId);
        return $this->repository->get($user);
    }
}
