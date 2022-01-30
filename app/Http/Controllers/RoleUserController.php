<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Get All Users and Roles ID.
     *
     * @return JsonResponse
     */
    public function index() {
        $user_role = RoleUser::all();
        return response()->json($user_role, 200);
    }


    public function join() {
        $user = RoleUser::select('users.id as ID DE USUARIO', 'users.name as NOMBRE DE USUARIO', 'roles.name as ROL DE USUARIO', 'roles.id as ID DEL ROL')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->join('users', 'role_user.user_id', '=', 'users.id')
            ->get();

        return response()->json($user, 200);
    }

}
