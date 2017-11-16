<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\IssuesResourceCollection;
use App\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new IssuesResourceCollection(Issue::paginate());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         * $request->user() is used to get user data is because the User $user parameter cannot be passed
         * in the method
         * */

        $issue = $request->user()->issues()->create([
            'issue' => $request->issue
        ]);
        return response()->json($issue);
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
    public function update(Request $request, $id)
    {
        /*
         * $request->user() is used to get user data is because the User $user parameter cannot be passed
         * in the method
         * */

        $request->user()->issues()->find($id)->update([
            'issue' => $request->get('issue')
        ]);

        return response()->json('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Issue::destroy($id);
        return response()->json($id . ' has been deleted', 200);
    }
}
