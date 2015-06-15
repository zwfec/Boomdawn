<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use Hash;
use Session;
use App\Models\User;

class WelcomeController extends Controller
{

  public function __construct()
  {
    view()->share('current', 'index');
  }

  /**
   * 控制台
   */
  public function getIndex()
  {
    //获得控制台信息
    $data['os'] = PHP_OS . '/' . $_SERVER["SERVER_SOFTWARE"] . '/PHP ' . PHP_VERSION;
    $data['max_upload'] = ini_get_all()['max_file_uploads']['global_value'] . 'M';
    $user = User::where('id',session('uid'))->first();
    return view('manage.welcome')->withUser($user)->withData($data);
  }

  /**
   * 退出登录
   */
  public function getLogout()
  {
    Session::flush();
    return redirect('login');
  }

  /**
   * 修改密码
   */
  public function getChangePwd()
  {
    return view('manage.change-pwd');
  }

  /**
   * 修改密码
   */
  public function postChangePwd()
  {
    $uid = session('uid');

    $v = Validator::make([
      'oldpwd' => Request::input('oldpwd'),
      'newpwd' => Request::input('newpwd'),
    ], [
      'oldpwd' => 'required',
      'newpwd' => 'required',
    ],[
      'oldpwd.required' => '原密码不能为空',
      'newpwd.required' => '新密码不能为空',
    ]);

    if ($v->fails()) {
      return redirect()->back()->withErrors($v->errors())->withInput();
    }

    //判断两次密码是否一致
    if (Request::input('newpwd') != Request::input('newpwd2')) {
      return redirect()->back()->withErrors('两次密码不一致')->withInput();
    }

    //判断原密码是否正确
    $user = User::where('id',$uid)->first();
    if (!Hash::check(Request::input('oldpwd'), $user->password)) {
      return redirect()->back()->withErrors('原密码错误')->withInput();
    } else {
      //修改密码
      $user->password = Hash::make(Request::input('newpwd'));
      $user->save();
      //重新登录
      Session::flush();
      return redirect('login');
    }
  }
}
