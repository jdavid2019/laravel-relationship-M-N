<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Get all roles.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse {
        $role = Role::all();
        return response()->json($role, 200);
    }


    /**
     * Find role to id.
     *
     * @param $id
     * @return JsonResponse
     */
    public function findRole($id): JsonResponse {
        $role = Role::find($id);
        if (!isset($role)) {
            return response()->json(['message' => 'Data no encontrada'], 404);
        }
        else {
            return response()->json($role, 200);
        }
    }

    /**
     * Create role.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createRole(Request $request): JsonResponse {
        $role = Role::create($request->all());
        return response()->json($role, 200);
    }

    /**
     * Edit role to id.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function editRole(Request $request, $id): JsonResponse {
        $role = Role::find($id);
        if (!isset($role)) {
            return response()->json(['message' => 'Data no encontrada'], 404);
        }
        else {
            $role->update($request->all());
            return response()->json(['message' => 'Data actualizada correctamente'], 200);
        }
    }

    /**
     * Delete Role to id.
     *
     * @param $id
     * @return JsonResponse
     */
    public function deleteRole($id): JsonResponse {
        $role = Role::find($id);
        if (!isset($role)) {
            return response()->json(['message' => 'Data no encontrada'], 404);
        }
        else {
            $role->delete();
            return response()->json(['message' => 'Data eliminada correctamente'], 200);
        }
    }
}
