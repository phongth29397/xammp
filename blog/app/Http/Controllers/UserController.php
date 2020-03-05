<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdateRequest;
use App\Repositories\User\UserRepository;
use App\Requests;
use DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        return view('profile');
    }

    public function listUser()
    {
        $users = $this->userRepository->paginate(config('common.per_page'));
        return view('users.userlist', compact('users'));
    }

    public function search(Request $request)
    {
        $users = $this->userRepository->search($request->get('search'));
        return view('users.userlist', compact('users'));
    }

//    public function profileUser(Request $request,$id)
//    {
//        $user = $this->userRepository->findUser($id);
//        return view('users.profileUser', compact('user'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateInformation(UpdateRequest $request)
    {
        $id=(Auth::user()->id);
//        if ($request['id']){
//            $id=$request['id'];
//        }
        User::find($id)->update($request->all());
        Session::flash('message', __('mesages.success'));
        return redirect(route('me'));
    }

    public function showPassword()
    {
        return view('password');
    }

    public function changePassword(ResetPasswordRequest $request)
    {
        $userModel = User::find(Auth::user()->id);
        $userModel->password = Hash::make($request['new_password']);
        $userModel->save();
        Session::flash('message', __('mesages.changePassword'));
        return redirect(route('me'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
