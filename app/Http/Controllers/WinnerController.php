<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    public function index()
    {
        $winners = Winner::latest()->get();
        return view('backend.winners.index', ['winners' => $winners]);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'bid_id'=> 'required',
    //     ]);

    //     $firstWinner = Bid::where('issue_id', '=', $request->bid_id)->max('score');
    //     return $firstWinner->name;
    //     // dd("hello");


    //     return Winner::create([
    //         'bid_id' => $request->bid_id,
    //         'extensionCount' => $request->extensionCount,
    //         'position' => 1,
    //         'endingAt' => 1,           
    //     ]);
    // }
    public function resolvingNow ($user_id)
    {
        $issue = Winner::where('user_id', $user_id)->get();
        return $issue;
    }
}
