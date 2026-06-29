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
    public function map(){
        $numbers=collect([1,2,3,4,5]);
          
        $result=$numbers->map(function ($item){
            return $item*2;
        });
        return view('collection.numbers',compact('result'));
    }
    public function first(){
        $students=collect([
            ['name'=>'Ram'],
            ['name'=>'Sita'],
            ['name'=>'Hari']
        ]);
        $students=$students->first();
        return view('collection.students',compact('students'));
    }
    public function count(){
        $products = collect(['Laptop','Mobile','Tablet']);

        $total=$products->count();
        return view('collection.count',compact('total'));
    }
    public function group(){
        $students = collect([
    ['name'=>'Ram','faculty'=>'BCA'],
    ['name'=>'Sita','faculty'=>'BBS'],
    ['name'=>'Hari','faculty'=>'BCA'],
    ['name'=>'Gita','faculty'=>'BBS']
]);
$result=$students->groupBy('faculty');
return view('collection.group',compact('result'));
    }
    public function sort(){
        $users = collect([
    ['name'=>'Ram','age'=>25],
    ['name'=>'Sita','age'=>20],
    ['name'=>'Hari','age'=>30]
]);
    $users=$users->sortBy('age');
    return view('collection.sort',compact('users'));
    }
    public function sum(){
        $prices=collect([100,200,300,400]);
        $total=$prices->sum();
        return view('collection.sum',compact('total'));
    }

    public function avg(){
        $marks=collect([60,70,80,90]);
        $total=$marks->avg();
        return view('collection.sum',compact('total'));
    }
    public function adultUsers(){
         $users = collect([
        ['name' => 'Ram', 'age' => 20],
        ['name' => 'Sita', 'age' => 17],
        ['name' => 'Hari', 'age' => 25],
        ['name' => 'Gita', 'age' => 15],
    ]);
    $result=$users->filter(function($user){
                return $user['age'] > 18;

    });

    return view('collection.adults', compact('result'));
    }
    

}
