<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Error;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function checkUserExistance(string $id)
    {
        $user = $this->repository->findUser($id);
        if($user == null) {
            throw new Error("User with id $id not found", 404);
        }
        return $user;
    }

    public function saveUser(array $data)
    {
        $this->repository->save($data);
    }

    public function updateUser(string $id, array $data)
    {
        $user = $this->repository->findUser($id);
        $this->repository->update($user, $data);
    }

    public function softDelete(string $id)
    {
        $user = $this->checkUserExistance($id);
        $this->repository->remove($user);
    }
}
