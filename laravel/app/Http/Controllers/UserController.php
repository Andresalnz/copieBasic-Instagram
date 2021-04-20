<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\user;
use App\image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function update(Request $request)
    {
        $user=Auth::user();
        $id=$user->id;// recupera la id del usuario

        $validate = $this->validate($request,[
            'name' => 'required', 'string', 'max:255',
            'surname'=>'required', 'string', 'max:255',
            'nick'=>'required', 'string', 'max:255', 'unique:user', 'nick'.$id,
            'email' => 'required', 'string', 'email', 'max:255', 'unique:user'.$id
        ]);

        $image_path = $request->file('avatar');

        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk ('users')->put ($image_path_name,File::get($image_path));
            $user->image = $image_path_name;
        }
        $user->update();
        return redirect()->route('User.config');
    }

    public function config(Request $request){
        $user = Auth::user();
        return view('Auth/config',array ('user'=>$user));
    }

    public function getImage($filename){
       $file = Storage::disk('users')->get($filename);
        return new Response ($file, 200);

    }

    public function getProfile($id){
        $id_user = User::find($id);
        $image = new Image();
        return view('profile',['user'=>$id_user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
