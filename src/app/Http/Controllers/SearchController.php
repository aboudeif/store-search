<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
  
  public function search(Request $request){
    // onetime run code to insert 60 products
    #include "products_list.php";
    #Product::insert($products_list);
  $search_word = $request->input('search');
    $result = '';
    if(array_key_exists('search',$_GET))
      if(strlen($request->input('search'))){
        $result = Product::where('name','like','%'.$request->input('search').'%')->get('name');
        if(! isset($result[0]->name)){
          unset($result);
          $result = 'Search result is not found';
        }
      }
      else{
        $result = 'Search result is not found';
      }
    return view('home',['result'=> $result]);
  }
}
