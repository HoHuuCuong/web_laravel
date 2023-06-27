<?php

namespace App\Http\Services\Menu;

use Illuminate\Support\Facades\Session;
use App\Models\Menu;

class MenuService
{
    public function getParent()
    {
        return Menu::Where('parent_id', 0)->get();
    }
    public function getAll()
    {
        // return Menu::orderby('id')->paginate(20);
        return Menu::orderbyDesc('id')->paginate(20);
    }
    public function create($request)
    {
        try {
            if (Menu::isUsernameExists($request->name)) {

                session::flash('error', 'Tên đã tồn tại, tạo danh mục không thành công');


            } else {
                $news = new Menu;
                $news->name = $request->name;
                $news->parent_id = $request->parent_id;
                $news->description = $request->description;
                $news->content = $request->content;
                $news->active = $request->active;
                $news->save();
                session::flash('success', 'Tạo danh mục thành công');

                // return Menu::create([
                //     'name' => (string) $request->input('name'),
                //     'parent_id' => (int) $request->input('parent_id'),
                //     'description' => (string) $request->input('description'),
                //     'content' => (string) $request->input('content'),
                //     'active' => (int) $request->input('active')
                // ]);
            }

        } catch (\Exception $err) {
            session::flash('error', 'Tạo danh mục không thành công, vui lòng nhập đầy đủ thông tin');
            return false;
        }
        return true;
    }
    // public function destroy($request)
    // {
    //     $id = (int) $request->input('id');
    //     $menu = Menu::Where('id', $id)->first; //kiem tra xem co id do k, neu co tra ve true
    //     if ($menu) {
    //         return Menu::where('id', $id)->delete(); //xoa dong co id do
    //     }
    //     return false;
    // }

    public function update($request, $menu)
    {
        $menu->name = (string) $request->input('name');
        $menu->parent_id = (int) $request->input('parent_id');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active');
        $menu->save();
        Session::flash('success', 'Cập nhật thành công danh mục');
        return true;
    }


}