<?php
namespace app\Helpers;

class helper
{
    public static function menu($menus)
    {
        $html = "";
        foreach ($menus as $key => $menu) {
            $html .= '
            <tr>
            <td>' . $menu->id . '</td>
            <td>' . $menu->name . '</td>
            <td>' . $menu->active . '</td>
            <td>' . $menu->updated_at . '</td>
            <td>
                <a class="btn btn-primary btn-sm" href="admin/menus/edit' . $menu->id . '">
                <i class="fas fa-edit"></i>
                </a>


            </td>
        </tr>';
            unset($menus[$key]);
            //      $html .= self::menu($menus);
        }

        return $html;
    }
}

// <a class="btn btn-danger btn-sm" href="#"
// onclick="removeRow(' . $menu->id . ' , \'/admin/menus/destroy\')">
// <i class="fas fa-trash"></i>
// </a>