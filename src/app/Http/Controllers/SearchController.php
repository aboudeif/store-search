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
    $page = $_GET['page'] ?? 0;
    if(array_key_exists('search',$_GET))
      if(strlen($request->input('search'))){
        if($page <= 0)
        $result = Product::where('name','like','%'.$request->input('search').'%')->skip(0*$page++)->take(10)->get('name');
        else
        $result = Product::where('name','like','%'.$request->input('search').'%')->skip(10*$page++)->take(10)->get('name');
        if(! isset($result[0]->name)){
          unset($result);
          $result = "No results for your search, Tray to use mobile brand ";
        }
      }
      else{
        $result = "No results for your search, Tray to use mobile brand ";
      }
    return view('home',['result'=> $result,'page'=>$page]);
  }
}
