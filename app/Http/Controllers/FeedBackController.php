<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumFeedback;
use App\Models\ForumLike;
use Illuminate\Support\Facades\Auth;


class FeedBackController extends Controller
{
   public function AddComment(Request $request,$id)
   {
      $request->validate([
         'content' => 'required|string',
      ]);

      $comment = ForumFeedback::create([
         'content' => $request->content,
         'user_id' => Auth::user()->id,
         'post_id' => $id,
      ]);
      // Return a JSON response with the newly created comment(so well use it in js api call to not reload page n add cmnt dynamically.)
      return redirect()->route('discussion')->with('success', 'Comment added successfully.');
   }
   public function LikePost($id)
   {
       $userId = Auth::user()->id;
   
       // Checking if the like already exists(cause itd be stupid not to duh!)
       $like = ForumLike::where('post_id', $id)
                        ->where('user_id', $userId)
                        ->first();
   
       if ($like) {
           // If the like  remove it (basically unlike z damn post...)
           $like->delete();
           return response()->json(['message' => 'Post unliked successfully.'], 200);
       } else {
           // If the like does not exist, create a new one
           ForumLike::create([
               'post_id' => $id,
               'user_id' => $userId,
           ]);
           return response()->json(['message' => 'Post liked successfully.'], 201);
       }
   }
}
