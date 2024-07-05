<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Requests\UserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Stringable;

use function PHPUnit\Framework\returnSelf;

class userController extends Controller
{
 
   
    public function index():JsonResponse
    {
       // $users = User::all();
     //   return view("user.user", compact("users"));
    return response()->json(User::all(), 200);
    }
  
  //function view, for monolite
    //  public function create(): View
   // {
     //   return view ("user.create");
   // }
    public function store (UserRequest $request): JsonResponse
    {
     //   User::create($request -> all());
      //  return(redirect()-> route("user.user"))->with("success", "User Created");
      $user = User::create($request->all());
        return response()->json([
            'message' => 'User created', 
            'data'=> $user], 201);

    }
   
   /*
    public function edit (User $user): View
    {
        
        return view("user.edit", compact("user"));
    }*/
    public function update (UserRequest $request, String $id): JsonResponse
    {
      //  $user -> update($request ->all());
        $user = User::find($id);
       // return(redirect()-> route("user.user"))->with("success", "User Updated");
        $user -> update($request->all());
      return(response()->json([
        'message' => 'User updated', 
        'data'=> $user], 201));
    }

    
    public function show (String $id): JsonResponse
    {
        return response()->json(User::find($id), 200);
    }
    public function destroy ( String $id): JsonResponse
    {
       User::destroy($id);
       return response()->json(['message' => 'User deleted'], 200);
    }
}  
