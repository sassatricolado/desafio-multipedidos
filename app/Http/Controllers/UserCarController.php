<?php

namespace App\Http\Controllers;

use App\Services\UserCarService;

class UserCarController extends Controller
{
    private $service;

    public function __construct(UserCarService $service)
    {
        $this->service = $service;
    }

    public function userCars(string $id)
    {
        $userCars = $this->service->getCars($id);

        return response()->json($userCars);
    }

    public function associate(string $userId, string $carId)
    {
        $this->service->associate($userId, $carId);

        return response()->json("Successfull association!");
    }

    public function disassociate(string $userId, string $carId)
    {
        $this->service->disassociate($userId, $carId);

        return response()->json("Successfull desassociation!");
    }
}
