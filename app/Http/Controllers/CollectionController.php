<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    //
    public function index(){
        $users=collect([
            ['name'=>'Ram'],
            ['name'=>'Sita']
        ]);
        $users=$users->pluck('name');
        return view('collection.users',compact('users'));
    }
    public function filter(){
$users = collect([
    ['name' => 'Ram', 'active' => true],
    ['name' => 'Sita', 'active' => false],
    ['name' => 'Hari', 'active' => true],
    ]);
    $users=$users->filter(function ($item){
        return $item['active']==true;

    });
return view('collection.users',compact('users'));
    }
}
