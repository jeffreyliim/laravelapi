<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\IssueConversationResourceCollection;
use App\Issue;
use App\IssueConversations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssueConversationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new IssueConversationResourceCollection(IssueConversations::paginate());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Issue $issue)
    {
        /*
         * either use  Issue::find($id) // $issue
         * */

        $conversation = $issue->conversations()->create([
            'user_id' => $request->user()->id,
            'conversation' => $request->get('message')
        ]);

        return response()->json($conversation, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $issueID, $issueConversationID)
    {
        $conversation = Issue::find($issueID)->conversations()->find($issueConversationID)->update([
            'conversation'=>$request->get('message')
        ]);

        return response()->json($conversation, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($issueID, $issueConversationID)
    {
        $conversation = Issue::find($issueID)->conversations()->find($issueConversationID)->delete();

        return response()->json($conversation,200);
    }
}
