<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|string',
            'email' => 'required|string|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|string|min:3'
        ]);
        $this->service->saveUser($validated);

        return response()->json("User successfully created!");
    }

    public function delete(string $id)
    {
        $this->service->softDelete($id);

        return response()->json("User with id $id successfully deleted! (soft-deleted).");
    }

    public function edit(string $id, Request $request)
    {
        $this->service->checkUserExistance($id);
        $validated = $request->validate([
            'email' => 'required|string|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,'.$id,
            'password' => 'required|string|min:3'
        ]);
        $this->service->updateUser($id, $validated);

        return response()->json("User with id $id successfully updated!");
    }
}
