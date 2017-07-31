<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

<<<<<<< HEAD
    //返回所有用户信息
    public function index()
    {
        $all = user::all();
        return $this->returnMsg('200','ok',$all);
    }

    //返回某一用户信息
    public function show($id)
    {
        $user = user::findOrFail($id);
        if($user) {
          return $this->returnMsg('200','ok',$user);
        }
          return $this->returnMsg('404','Not found');
    }

    //增加用户
    public function addUser(Request $request)
    {
        $payload = $request->only('name', 'picture', 'phone', 'email', 'wechat');
        $result = Usr::create([
            'name' => $payload['name'],
            'picture' => $payload['picture'],
            'phone' => $payload['phone'],
            'email' => $payload['email'],
        ]);

        if ($result) {
            return $this->response->array(['success' => '创建用户成功']);
        } else {
            return $this->response->array(['error' => '创建用户失败']);
        }
    }

    //编辑某用户信息
    public function editUser($id)
    {
        $edit = Usr::find($id);
        if($edit) {
           $result = $edit->update();
           if($result) {
              return $this->returnMsg('200','ok');
           }
           else {
              reutrn $this->returnMsg('500','fail');
           }
        }
        else {
           return $this->returnMsg('404','Not found');
        }
    }

    //删除某用户信息
    public function delUser($id)
    {
        $delete = Usr::find($id);
        if($delete) {
           $result = $delete->delete();
           if($result) {
              return $this->returnMsg('200','ok');
           }
           else {
              return $this->reutrnMsg('500','fail');
           }
        }
        else {
           return $this->returnMsg('404','Not found');
        }
=======
    public function index()
    {
        return user::all();
    }

    public function show($id)
    {
        $user = user::findOrFail($id);
        // 数组形式
        return $user;
>>>>>>> 23d4fa8c801894e8197c4093d5237d4b279377a4
    }
}
