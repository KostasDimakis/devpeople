<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Saves a new comment.
     *
     * @param CommentRequest $request
     * @param $recipientId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request, $recipientId)
    {
        $this->createComment($request, $recipientId);

        //flash success

        \Auth::user()->update(['last_comment_at' => Carbon::now()]);

        return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Comment $comment)
    {
        $comment->delete();

        return back();
    }

    /**
     * Create a new comment.
     *
     * @param CommentRequest $request
     * @param $recipientId
     */
    private function createComment(CommentRequest $request, $recipientId)
    {
        $authorId = \Auth::user()->id;
        $body = $request->input('body');
        $qualityId = $request->input('quality');

        Comment::create(
            ['body'                      => $body,
             'comment_author_user_id'    => $authorId,
             'comment_recipient_user_id' => $recipientId,
             'quality_id'                => $qualityId
            ]);
    }
}
