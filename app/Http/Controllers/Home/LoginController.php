<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use App\Models\User;
use Hash;
use Session;

class LoginController extends Controller
{
  /**
   * 登录页面
   */
  public function getIndex ()
  {
    //判断是否已经登录
    if (Session::has('uid') && Session::has('username')) {
      return redirect('manage');
    }
    return view('home.login');
  }

  /**
   * 验证登录
   */
  public function postIndex()
  {
    $username = Request::input('username');
    $password = Request::input('password');

    $v = Validator::make([
      'username' => $username,
      'password' => $password,
    ], [
      'username' => 'required',
      'password' => 'required',
    ],[
      'username.required' => '用户名不能为空',
      'password.required' => '密码不能为空',
    ]);

    if ($v->fails()) {
      return redirect()->back()->withErrors($v->errors())->withInput();
    }

    //用户名是否存在
    $username_have = User::where('username',$username)->first();
    if (!$username_have) {
      return redirect()->back()->withErrors('用户名不存在')->withInput();
    } else {
      $password_real = $username_have->password;
    }
    //密码是否正确
    if (!Hash::check($password, $password_real)) {
      return redirect()->back()->withErrors('密码错误')->withInput();
    } else {
      //验证通过 存入session登录
      session(['uid' => $username_have->id, 'username' => $username_have->username]);
      //更新用户登录时间和IP
      $username_have->last_login_time = time();
      $username_have->last_login_ip = Request::ip();
      $username_have->save();
      return redirect('manage');
    }

  }
}
