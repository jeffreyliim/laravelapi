<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\IssueRequest;
use App\Http\Resources\IssueResource;
use App\Http\Resources\IssuesResourceCollection;
use App\Issue;
use App\IssueConversations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @SWG\Get(path="/api/issues/",
     *     tags={"Get Issues"},
     *     operationId="index",
     *     summary="Get all issues that user has access to",
     *     produces={"application/json"},
     *     @SWG\Parameter(name="page", in="query", description="Page number", required=true,type="integer", format="int64"),
     *     @SWG\Response(response=200,
     *      description="Successful",
     *      @SWG\Schema(
     *      type="object",
     *      @SWG\Property(property="data",type="array",title="data",
     *             @SWG\Items(ref="#/definitions/App\Issue")
     *      ),
     *      @SWG\Property(property="links", ref="#/definitions/collectionLinks"),
     *      @SWG\Property(property="meta", ref="#/definitions/collectionMeta")
     *      )
     * )
     * )
     *
     */
    public function index(Request $request)
    {
        return new IssuesResourceCollection($request->user()->issues()->paginate(), Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(IssueRequest $request)
    {
        /*
         * $request->user() is used to get user data is because the User $user parameter cannot be passed
         * in the method
         * */

        $issue = $request->user()->issues()->create([
            'issue' => $request->issue
        ]);
        return response()->json(new IssueResource($issue), Response::HTTP_CREATED);
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
    public function update(IssueRequest $request, Issue $issue)
    {
        $issue->update($request->all());

        return response()->json(new IssueResource($issue), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function deleteIssue(Issue $issue)
    {
        $issue->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }



}
