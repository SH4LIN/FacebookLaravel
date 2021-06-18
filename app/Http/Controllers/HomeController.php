<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(\Auth::user()->id);

        $action = "Edit Cover Photo";
        $coverMenu = [

            'Upload photo'=>[
                'icon'=>"upload_file",
                'link'=>route('coverEdit'),
                'action'=>'addCover'
                ],
            'Remove'=>[
                'icon'=>"delete",
                'link'=>route('coverEdit'),
                'action'=>'removeCover'
                ],
        ];

        $profileMenu = [
            'Upload photo'=>[
                'icon'=>"upload_file",
                'link'=>route('profileEdit'),
                'action'=>'addProfile'
            ],
            'Remove'=>[
                'icon'=>"delete",
                'link'=>route('profileEdit'),
                'action'=>'removeProfile'
            ],
        ];


        if($user->profile->coverImage == null){
            $action = "Add Cover Photo";
            $coverMenu = [
                'Upload photo'=>[
                    'icon'=>"upload_file",
                    'link'=>route('coverEdit'),
                    'action'=>'addCover'
                ],
            ];
        }
        return view('home')->with(['action'=>$action,'menuItems'=>$coverMenu,'profileMenuItems'=>$profileMenu,'user'=>$user]);
    }

    public function bioEdit(Request $request){

        $user = Auth::user();
        $user->profile->bio = $request->bio;
        $user->push();

        return redirect()->back();
    }

    public function coverEdit(Request $request){
        if($request->requestOf == "removeCover"){
            $this->removeCover($request);
        }else{
            $this->addCover($request);
        }

        return redirect()->back();
    }

    private function removeCover(Request $request){
        $user = Auth::user();
        $user->profile->coverImage = "";
        $user->push();

    }

    private function addCover(Request $request){
        $file = $request->file('photo');

        $url = \Storage::disk('public')->put("image",$file);
        $url = "/storage/".$url;

        $user = Auth::user();
        $user->profile->coverImage = $url;
        $user->push();

    }

    public function profileEdit(Request $request){
        if($request->requestOf == "removeProfile"){
            $this->removeProfile($request);
        }else{
            $this->addProfile($request);
        }

        return redirect()->back();
    }

    private function removeProfile(Request $request){
        $user = Auth::user();
        $user->profile->profileImage = "/storage/image/download.png";
        $user->push();
    }

    private function addProfile(Request $request){
        $file = $request->file('photo');

        $url = \Storage::disk('public')->put("image",$file);
        $url = "/storage/".$url;

        $user = Auth::user();
        $user->profile->profileImage = $url;
        $user->push();

    }

    public function display(Request $request){
        dd($request);
    }
}
