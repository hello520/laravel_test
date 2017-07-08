<?php
/**
 * Created by PhpStorm.
 * User: lazycao
 * Date: 2017/7/6 0006
 * Time: 13:49
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
       // var_dump($request->getPort());
        if ($request->isMethod('POST')) {
            $file = $request->file('file');
            //判断文件是否上传成功
            if ($file->isValid()) {
                //获取原文件名
                $originalName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //文件类型
                $type = $file->getClientMimeType();
                //临时绝对路径
                $realPath = $file->getRealPath();

                $filename = date('Y-m-d-H-i-S') . '-' . uniqid() . '-' . $ext;
                $bool = Storage::disk(config('filesystems.local.root'))->put($filename, file_get_contents($realPath));
                exit($filename);
            }
        }
    }
}