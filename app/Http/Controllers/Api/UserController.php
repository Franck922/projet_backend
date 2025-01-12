<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Afficher tous les utilisateurs
    public function index(){
        $users = User::get();
        return $users;
    }

    //Enregistrer un utilisateur
    public function store(Request $request){
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:6',
            'usertype' => 'required|in:admin,user',
        ]);
     User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'usertype'=> $request->usertype,
        ]);
        return   response()->json(
[
        'message'=>'Utilisateur ajoutée avec succès']);
    }
    //Afficher le formulaire de modification
public function show($id){
    $user = User::findOrFail($id);
    $usertype = $user->usertype;
    return $user;}


//Mettre à jour un utilisateur
public function update(Request $request, $id){
    $user = User::find($id);
    $request->validate([
        'name'=> 'required|string|max:255',
        'email'=> 'required|email|unique:users,email',
        'userType' => 'required|in:admin,user',
    ]);
    $newUser = $user->update($request->only('name','email','usertype')) ;
    return $newUser ;
}


//Mettre à jour le role  utilisateur
public function updateRole(Request $request, $id){
    $user = User::find($id);
    $request->validate([
        'usertype' => 'required|in:admin,user',
    ]);
    $newUser = $user->update($request->only('usertype')) ;
    return $newUser ;
}
public function destroy($id){
    $user = User::findOrFail($id);
    $user->delete();
    return   response()->json(
        [
                'message'=>'Utilisateur supprimé avec succès']);
            }
}
