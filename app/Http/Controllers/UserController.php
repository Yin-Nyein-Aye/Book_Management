<?php

namespace App\Http\Controllers;

use App\Contracts\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private UserInterface $userInterface;
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("auth.register");
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store()
    {
        $formData=request()->validate([
            "name" =>["required","max:255","min:3"],
            "email"=>["required",Rule::unique("users","email")],
            "password"=>["required","min:8"]
            ]);
            $user = $this->userInterface->store("User",$formData);
            auth()->login($user);
            return redirect("/")->with("success","Welcome Dear, ".$user->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
