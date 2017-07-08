<?php
/**
 * Created by PhpStorm.
 * User: lazycao
 * Date: 2017/7/5 0005
 * Time: 12:47
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    public function index(){
        return view('Home.Demo.index');
    }
}