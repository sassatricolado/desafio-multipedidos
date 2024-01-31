<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Support\Facades\DB;

class UserCarRepository
{
    public function findOrFailUser($id)
    {
        return User::findOrFail($id);
    }

    public function findOrFailCar($id)
    {
        return Car::findOrFail($id);
    }

    public function save(User $user, Car $car)
    {
        $user->cars()->attach($car->id);
    }

    public function searchRelation(User $user, Car $car)
    {
        $exists = DB::table('cars_users')
            ->where('user_id', $user->id)
            ->where('car_id', $car->id)
            ->exists();

        if (!$exists) {
            throw new RelationNotFoundException("Relationship not found.");
        }
    }

    public function remove(User $user, Car $car)
    {
        $this->searchRelation($user, $car);
        $user->cars()->detach($car->id);
    }

    public function get(User $user)
    {
        $cars = $user->cars()->paginate(10);
        if (!$cars) {
            return [];
        }
        return $cars;
    }
}
