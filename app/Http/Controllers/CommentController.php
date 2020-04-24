<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function putComment(Request $request, $id) {
        $post = Post::query()->findOrFail($id);

        $rules = [
            'body' => 'required|max:100'
        ];

        $data = [
            'body' => $request->input('body')
        ];
        $commentValidator = Validator::make($data, $rules);

        if($commentValidator->fails()) {
            return $this->goBackWithQueries($this->sendAlertMessage('danger', "The post doesn't accomplish with the rules"));
        }

        if(!empty($request->input('id'))) {
            $comment = Comment::query()->findOrFail($request->input('id'));
            if(!$this->isCommentOwnedByUser($comment))
                
                return $this->goBackWithQueries($this->sendAlertMessage('danger', "You're not the owner of this comment"));
            $comment->body = $data['body'];
            if(!$comment->isDirty())
                return $this->goBackWithQueries($this->sendAlertMessage('danger', "There aren't changes to commit in this comment"));
            $comment->save();
            return $this->goBackWithQueries($this->sendAlertMessage('success', "Comment updated succesfully"));
        } else {
            $data['user_id'] = Auth::user()->id;
            $data['post_id'] = $id;
            $comment = Comment::create($data);
            return $this->goBackWithQueries($this->sendAlertMessage('success', "Comment created succesfully"));
        }
    }

    public function deleteComment(Request $request) {
        $comment = Comment::query()->findOrFail($request->input('id'));
        if(!$this->isCommentOwnedByUser($comment))
                return $this->goBackWithQueries($this->sendAlertMessage('danger', "You're not the owner of this comment"));
        $comment->delete();
        return $this->goBackWithQueries($this->sendAlertMessage('success', "Comment deleted succesfully"));
    }

    private function isCommentOwnedByUser($comment) {
        $user = Auth::user();
        return $user->id == $comment->user->id;
    }

    private function goBackWithQueries($queries) {
        $previousUrl = strtok(url()->previous(), '?');
        return redirect()->to(
            $previousUrl . '?' . http_build_query($queries)
        );
    }
}
