<?php

namespace App\Repositories\User;

use App\User;

class UserRepository
{
    protected $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findUser($id)
    {
        return $this->user->findorfail($id);
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function paginate($number)
    {
        return $this->user->orderBy('last_name', 'asc')->paginate($number);
    }

    public function search($search)
    {
//        return $this->user->where('last_name','like','%'.$search.'%')
//            ->orWhere('first_name','like','%'.$search.'%')
//            ->orWhere('email','like','%'.$search.'%')
//            ->orWhere('birthday','like','%'.$search.'%')
//            ->paginate(5);
        return $this->user->where(function ($query) use ($search)   {
            $query->orderBy('last_name', 'asc')
                ->orwhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('first_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('birthday', 'like', '%' . $search . '%');
        })->paginate(5);
    }

    public function getById($id)
    {

    }

    public function cread(array $attributest)
    {

    }

    public function update($id, array $attributest)
    {

    }

    public function delete($id)
    {

    }


}
