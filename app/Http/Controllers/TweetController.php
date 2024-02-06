<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function index(Request $request){
        $query = $request->input('query');

        if ($query) {
            // もし検索クエリがあれば、ツイートを検索
            $tweets = Tweet::where('text', 'LIKE', '%' . $query . '%')->latest()->paginate(10);
        } else {
            // もし検索クエリがなければ、全てのツイートを取得
            $tweets = Tweet::latest()->paginate(20);
        }
        return view('tweets.index', compact('tweets'));
    }

    public function create(){
        return view('tweets.create');
    }

    public function destroy($id)
    {
        $tweet = Tweet::findOrFail($id);
        $tweet->delete();
        return redirect('/tweet')->with('success', 'ツイートが削除されました！');
    }

    public function edit($id)
    {
        $tweet = Tweet::findOrFail($id);
        if (Auth::user()->id === $tweet->user_id) {
            return view('tweets.edit', compact('tweet'));
        } else {
            return redirect('/tweet')->with('error', '他のユーザーのツイートは編集できません。');
        }
    }


    public function update(Request $request, $id)
    {
        $tweet = Tweet::findOrFail($id);
        if (Auth::user()->id === $tweet->user_id) {
            $tweet->text = $request->input('text');
            $tweet->save();
            error_log(print_r($tweet, true));
            return redirect()->route('route_tweet')->with('success', 'ツイートが更新されました！');
        }
    }

    public function store(Request $request)
    {

        $tweet = new Tweet();
        $tweet->user_id = auth()->user()->id; // ログインユーザーのIDを取得
        $tweet->text = $request->input('text');


        $tweet->save();

        return redirect('/tweet')->with('success', 'Tweetが投稿されました！');
    }

}