<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Afficher tous les utilisateurs
    public function index(){
        $users = User::paginate(10);
        return view('admin.users.index',compact("users"));
    }
    //Afficher le formulaire d'ajout
    public function create(){
        return view('admin.users.create');

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
        return redirect()->route('admin.users.index')->with('success','Utilisateur ajoutée avec succès');
    }
    //Afficher le formulaire de modification
public function edit($id){
    $user = User::findOrFail($id);
    $usertype = $user->usertype;
    return view('admin.users.edit',compact('user', 'usertype'));
}
//Mettre à jour un utilisateur
public function update(Request $request, $id){
    $user = User::find($id);
    $request->validate([
        'name'=> 'required|string|max:255',
        'email'=> 'required|email|unique:users,email',
        'usertype' => 'required|in:admin,user',
    ]);
    $user->update($request->only('name','email','usertype')) ;
    return redirect()->route('admin.users.index')->with('success','Utilisateur modifié avec succès');
}
public function destroy($id){
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.users.index')->with('success','Utilisateur supprimé avec succès');
}
}
