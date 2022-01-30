<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get all users.
     *
     * @return JsonResponse
     */
    public function index() {
        $user = User::all();
        return response()->json($user, 200);
    }

    /**
     * Get Roles to an specific ID.
     * @param $id
     * @return JsonResponse
     */
    public function getRoletoUserId($id): JsonResponse {
        $user = User::find($id);

        if (!isset($user)) {
            return response()->json(['message' => 'no encontrado'], 404);
        }
        else {
            //return response()->json(['user_information' => $user, 'user_roles' => $user->roles], 200);
            return response()->json(['user_roles' => $user->roles], 200);
        }
    }

    /**
     * Get user data to an specific id.
     *
     * @param $id
     * @return JsonResponse
     */
    public function getUserData($id): JsonResponse {
        $user = User::find($id);

        if (!isset($user)) {
            return response()->json(['message' => 'No encontrado'],404);
        }
        else {
            return response()->json($user,200);
        }
    }


    /**
     * Add an user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function addUser(Request $request) {
        $user = User::create($request->all());
        return response()->json($user, 200);
    }

    /**
     * Update an user.
     *
     * @param Request $request
     * @param $id
     */
    public function updateUser(Request $request, $id) {
        $user = User::find($id);

        if (!isset($user)) {
            return response()->json(['message' => 'no encontrado'], 404);
        }
        else {
            $user->update($request->all());
            return response()->json($user, 200);
        }
    }

    public function deleteUser(Request $request, $id) {
        $user = User::find($id);
        if (!isset($user)) {
            return response()->json(['message' => 'no encontrado'], 404);
        }
        else {
            $user->delete();
            return response()->json(['message' => 'Usuario eliminado satisfactoriamente'], 200);
        }
    }
}
