<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private $service;

    public function __construct(CarService $service)
    {
        $this->service = $service;
    }

    private function getValidationRules(): array
    {
        return [
            'model' => 'required|string|min:3',
            'make' => 'required|string',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
        ];
    }

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->getValidationRules());
        $this->service->saveCar($validated);

        return response()->json('Car successfully created!');
    }

    public function edit(string $id, Request $request)
    {
        $this->service->checkCarExistance($id);
        $validated = $request->validate($this->getValidationRules());
        $this->service->updateCar($id, $validated);

        return response()->json("Car with id $id successfully updated!");
    }

    public function delete(string $id)
    {
        $this->service->softDelete($id);

        return response()->json("Car with id $id and all of his relationships successfully deleted! (soft-deleted).");
    }
}
