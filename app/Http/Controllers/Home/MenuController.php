<?php
/**
 * Created by PhpStorm.
 * User: lazycao
 * Date: 2017/7/5 0005
 * Time: 13:25
 */

namespace App\Http\Controllers\Home;
use App\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class MenuController
 * @package App\Http\Controllers\Home
 * 菜单操作类
 */
class MenuController extends Controller
{
    public function index(){
        return view('Home.Menu.index');
    }
    public function menu(){
        $menus = DB::table('menus')->where('status',1)->select('id','name')->get()->all();
        return view('Home.Menu.add')->with('menus',$menus);
    }

    /**
     * @param Request $request
     * 添加菜单
     */
    public function add(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'parent_id' => 'required|exists:menus,id'
        ]);
        $menu = new Menu;
       //s $menu->add();
        $menu->name = self::I($request->name);
        $menu->pic = self::I($request->pic);
        $menu->des = self::I($request->des);
        $menu->mark = strtolower(self::I($request->mark));
        $menu->url = self::I($request->url);
        $menu->parent_id = self::I($request->parent_id);
        $parent_level = Menu::where('id',$menu->parent_id)->value('level');
        $menu->level = $parent_level + 1;
        $menu->save();
        return back();
    }
    public function ajax_menu(){
        $menu = new Menu();
        $menus = $menu->getMenus();
        foreach ($menus as $key => $val){
            $menus[$key]->icon = 'icon-th';
            $menus[$key]->code = 'one'.$key;
            if (!empty($val->child)){
                foreach ($val->child as $key1=>$val1){
                    $menus[$key]->child[$key1]->icon = 'icon-minus-sign';
                    $menus[$key]->child[$key1]->code = 'two'.$key1;
                    $menus[$key]->child[$key1]->parentCode = 'one'.$key;
                    if (!empty($val1->child)){
                        foreach ($val1->child as $key2=>$val2) {
                            $menus[$key]->child[$key1]->child[$key2]->icon = 'icon-minus-sign';
                            $menus[$key]->child[$key1]->child[$key2]->code = 'three' . $key2;
                            $menus[$key]->child[$key1]->child[$key2]->parentCode = 'two' . $key1;
                        }
                    }
                }
            }
        }
        return response()->json($menus);
    }
    /**
     *修改
     */
    public function update(Request $request){
        if ($request->isMethod('put')){
            $this->validate($request, [
                'id'  =>'required|exists:menus,id',
                'name' => 'required|max:255',
                'parent_id' => 'required|exists:menus,id'
            ]);
            $id = $request->id;
            $data['name'] = self::I($request->name);
            $data['pic'] = self::I($request->pic);
            $data['des'] = self::I($request->des);
            $data['mark'] = strtolower(self::I($request->mark));
            $data['url'] = self::I($request->url);
            $data['parent_id'] = self::I($request->parent_id);

            $parent_level = Menu::where('id',$request->parent_id)->value('level');
            $data['level'] = $parent_level + 1;
            if (Menu::where("id",$id)->update($data)){
                return redirect('menu/index');
            }else{
                return redirect()->back()->withInput()->withErrors('修改失败！');
            }

        }else{
            $menus = DB::table('menus')->where('status',1)->select('id','name')->get()->all();
            $menu = Menu::find($request->id);
            return view('Home.Menu.edit')->with('menus',$menus)->with('menu_info',$menu);
        }
    }

    /**
     * 删除
     */
    public function delete(Request $request){
       /* $this->validate($request, [
            'id'  =>'required|exists:menus,id',
        ]);*/
        $menu = Menu::find($request->id);
        var_dump($menu);exit();
        $menu->delete();

        if ($menu->trashed()){
            return back();
        }else{
            return back()->withErrors('删除失败！');
        }
    }
    protected static function I($name,$default=''){
        return $name===NULL?$default:$name;
    }
}