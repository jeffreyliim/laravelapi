<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserRolesResourceCollection;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new UserRolesResourceCollection($request->user()->roles()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        /**
         * For many to many relationship, syncWithoutDetaching detaching allows multiple roles
         * without having multiple rows of
         * the same role attached to the same user in the DB
         */

        $role = Role::find($request->get('roleID'));
        $user->roles()->syncWithoutDetaching($role->id);

        return response()->json('success', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Role $role)
    {
        /*
         * To update a many to many relationships field, use updateExistingPivot instead of update method.
         * */

        $user->roles()->updateExistingPivot($role->id, ['role_id' => Role::find($request->get('roleID'))->id]);
        return response()->json('success', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Role $role)
    {
        $user->roles()->detach($role->id);

        return response()->json('success', 204);
    }
}
