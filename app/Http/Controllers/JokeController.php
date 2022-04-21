<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers;
use App\Models\Joke;
use Illuminate\Support\Facades\Cookie;

class JokeController extends Controller
{
    public function getJoke (Request $request){
        $value = Cookie::get('name');
        if ($value){
            if (Joke::find($value + 1)) {
                $joke = Joke::where('id','=',$value)->get();
                return view('joke_view')->with(compact('joke'));
            } else {
                $joke = false;
                return view('joke_view')->with(compact('joke'));
                
            }
            
        } else {
            $joke = Joke::limit(1)->get();
            foreach ($joke as $item){
                $va = $item -> id;
            }
            $cookie = cookie('name' ,$va ,1440);
            return response(view('joke_view')->with(compact('joke')))->cookie($cookie);
        }
        
       
    }

    public function voteFun(Request $request, $id){
        $value = Cookie::get('name');

        if ($request->status == 1){
            //Save vote
            $joke = Joke::find($value);
            $joke->vote_fun ++;
            $joke->save();

        } else {
            //Save vote
            $joke = Joke::find($value);
            $joke->vote_nofun ++;
            $joke->save();
        }

        if ( $contens = Joke::find($value+1)){

            $conten = $contens -> jokecontent;
            $cookie = cookie('name' ,$value+1 ,1440);

            return response()->json($conten,200)->cookie($cookie);

        } else {
           $conten = "That's all the jokes for today! Come back another day!";
            return response()->json($conten,200);
        }
    }
}
