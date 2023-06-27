<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục',
            'menus' => $this->menuService->getParent()
        ]);
    }
    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);

        return redirect()->back();
    }
    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục mới nhất',
            'menus' => $this->menuService->getAll()
        ]);
    }
    public function destroy($id)
    {

        $menus = Menu::find($id);
        $menus->delete();
        session::flash('success', 'Xóa danh mục thành công');
        return redirect()->back();


    }
    public function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục ' . $menu->name . '',
            'menu' => $menu,
            'menus' => $this->menuService->getAll()
        ]);

    }

    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($request, $menu);
        return redirect('/admin/menus/list');
    }
    // public function destroy(Request $request): \Illuminate\Http\JsonResponse
    // {
    //     $result = $this->menuService->destroy($request);
    //     if ($result) {
    //         return response()->json([
    //             'error' => false,
    //             'message' => 'Xoa thanh cong'
    //         ]);
    //     } else {
    //         return response()->json([
    //             'error' => true,
    //         ]);
    //     }
    // }
}