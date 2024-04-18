<?php

namespace App\Http\Controllers;

use App\Models\poste;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class PostsController extends Controller
{
     //action
    public function index(){
      //get data form db 
     $postefromdb = poste::all(); //collection object model
      return view('postes.index',['postes'=>$postefromdb]);   
   }
     //action 
     public function create(){
      $users = User::all();
      return view('postes.create',['users'=>$users]);
   }
       //action 
     public function store(){
      // validation data 
        request()->validate([
         'title'=>['required', 'min:3'],
         'description'=>['required' , 'min:4'],
         
      ]);
        // if i need just one think from data
           $title = request()->title;
           $description = request()->description;
           $posted_creator = request()->posted_creator;
        // redirction
        poste::create(['title'=>$title,'description'=>$description,'user_id'=>$posted_creator]);
        return to_route('postes.index');
     }
     //action
 public function show(poste $post){
    $user = User::where('id' , $post->id)->first();;
    return view('postes.show',['post'=>$post,'user'=>$user]); 
 }
    //  action 
    public function edite(poste $poste){
      $users = User::all();
        return view('postes.edite',['users'=>$users,'poste'=>$poste]);
    }
   //  action
   public function update($postid){
       // validation data 
       request()->validate([
         'title'=>['required', 'min:3'],
         'description'=>['required' , 'min:4'],
         'posted_creator'=>['required','exists:User,id'],
         
      ]);
      $title = request()->title;
      $description = request()->description;
      $posted_creator = request()->posted_creator;
      // select post 
      $singlepostfromdb = Poste::find($postid);
      // dd($singlepostfromdb);
      $singlepostfromdb -> update([
         'title'=>$title,
         'description'=>$description,
         'user_id'=>$posted_creator,
      ]);
      // update in db 
      // redirction
      return to_route('postes.show',$postid);
   }
   // action
   public function destroy($postid){
      poste::where('id',"$postid")->delete(); //can i delete by evry thing have id title many  
      // redirction
      return to_route('postes.index');
   } 
}
