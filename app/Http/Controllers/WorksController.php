<?php

 namespace App\Http\Controllers;

 use App\Works;
 use App\Http\Controllers\Controller;

 class WorksController extends Controller
 {

     public function index()
     {
         return works::all();
     }

     public function show($id)
     {
         $user = works::findOrFail($id);
         // 数组形式
         return $user;
     }
 }
