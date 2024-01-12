<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TweetUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'content' => 'required'
        ]
        );

        $tweet = Tweet::find($id);

        $tweet->update([
            'content' =>  request('content')
            ]
        );

        $notification = array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
         //redirect to index
         return redirect()->route( 'dashboard' )->with($notification);
    }
}