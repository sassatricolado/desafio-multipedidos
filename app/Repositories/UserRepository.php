<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function save(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
    }

    public function remove(User $user)
    {
        $user->delete();
    }

    public function findUser($id)
    {
        return User::find($id);
    }

    public function update(User $user, array $data)
    {
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
    }
}
