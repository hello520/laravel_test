<?php
/**
 * Created by phpstorm.
 * User: lazycao
 * Date: 2017/7/5 0005
 * Time: 11:36
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('Home.Index.index')->with('name','cao');
    }
}