<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\IssueConversationCheck;
use App\Exceptions\UserConversationCheck;
use App\Http\Requests\IssuesConversationsRequest;
use App\Http\Resources\IssueConversationResource;
use App\Http\Resources\IssueConversationResourceCollection;
use App\Http\Resources\IssueResource;
use App\Http\Resources\IssuesResourceCollection;
use App\Issue;
use App\IssueConversations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class IssueConversationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //gets index collection of conversations including meta data

        return new IssueConversationResourceCollection(IssueConversations::paginate(), Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(IssuesConversationsRequest $request, Issue $issue)
    {
        /*
         * either use  Issue::find($id) // $issue
         * */

        $issue->conversations()->create([
            'user_id' => $request->user()->id,
            'conversation' => $request->get('conversation')
        ]);

        //post response 201, want both issue and conversation when store
        return response()->json(new IssueConversationResource($issue->load('conversations')), 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(IssuesConversationsRequest $request, Issue $issue, $issuesConversationID)
    {
        //checking if user id belongs to the conversation
        if ($request->user()->id != IssueConversations::find($issuesConversationID)->user_id) {
            throw new UserConversationCheck;
        } //check if issue id matches the issue id in the conversation
        else if ($issue->id != IssueConversations::find($issuesConversationID)->issue_id) {
            throw new IssueConversationCheck;
        }
        //update
        $issue->conversations()->find($issuesConversationID)->update($request->all());

        //update response 200, only want the conversation when update
        return response(IssueConversations::find($issuesConversationID), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue, $issueConversationsID)
    {

        $issue->conversations()->find($issueConversationsID)->delete();

        //delete response 204
        return response()->json(null, 204);
    }

    private function check($request, $issuesConversationID, $issue)
    {
        //checking if user id belongs to the conversation
        if ($request->user()->id != IssueConversations::find($issuesConversationID)->user_id) {
            throw new UserConversationCheck();
        } //check if issue id matches the issue id in the conversation
        else if ($issue->id != IssueConversations::find($issuesConversationID)->issue_id) {
            return response("Conversation doesn't exist in this issue", 500);
        }
    }


}
