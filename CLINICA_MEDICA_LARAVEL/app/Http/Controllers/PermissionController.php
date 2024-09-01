<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public static function loadPermissions($role) {

        $sess = Array();

        $perm = Permission::with(['resource'])->where('role_id', $role)->get();
        foreach($perm as $item) {
            $sess[$item->resource->nome] = (boolean) $item->permission;
        }

        //dd($sess);

        session(['user_permissions' => $sess]);
    }

    public static function isAuthorized($resource) {
        $permissions = session('user_permissions', []);

        // Verifica se a chave existe no array
        if (isset($permissions[$resource])) {
            //dd($permissions);
            return $permissions[$resource];
        }

        // Retorna false ou lança uma exceção se a chave não existir
        return false;
    }

/*
    public static function isAuthorized($resource) {
        $permissions = session('user_permissions');
        //dd($permissions);
        return $permissions[$resource];
    }
*/
}
