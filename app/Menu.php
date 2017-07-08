<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use SoftDeletes;
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'menus';
    protected $dates = ['deleted_at'];
    //指定主键
    //protected $primaryKey = 'id';

    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    //public $timestamps = false;
    /**
     * 模型日期列的存储格式
     *
     * @var string
     */
    //protected $dateFormat = 'U';
    /**
     * The connection name for the model.
     *
     * @var string
     */
    //protected $connection = 'connection-name';
    //
    public function getMenus()
    {
        $menus = DB::table('menus')->where(['status'=>1,'level'=>2,'is_delete'=>0])->select('id','name','mark')->get()->all();
        $menus = $this->getMenu($menus);
        return $menus;
    }
    protected function getMenu($menus)
    {
        foreach ($menus as $key => $val){
            $menu = DB::table('menus')->where(['status'=>1,'is_delete'=>0,'parent_id'=>$val->id])->select('id','name','mark')->get()->all();
            if (count($menu)){
                $menus[$key]->child = $this->getMenu($menu);
            }else{
                $menus[$key]->child = $menu;
            }
        }
        return $menus;
    }
}
