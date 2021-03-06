<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Issue;
use App\Models\IssueResolveHistory;
use App\Models\User;
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

    public function complete($id)
    {
        $winn = Winner::find($id);
        $history = IssueResolveHistory::create([
            'winner_id' => $winn->id,
            'extension_count' => $winn->extensionCount,
            'status' => 'resolving',
        ]);
        return redirect()->route('winners.index')->withMessage('Successfully Assigned!');
    }

    public function myResolve($user_id)
    {
        $me = Winner::where('user_id', $user_id)->first();
        $issue = $me->bid->issue;
        
        return [$me];
    }

    public function complt(Request $request, $winner_id, $user_id)
    {
        $comWinner = Winner::where('id', '=', $winner_id )->first();
        $hisForDelete = IssueResolveHistory::all();
        // foreach ($hisForDelete as $his) {
        //     $his->delete();
        // }
        $newWinnerHistory = IssueResolveHistory::create([
            'winner_id' => $comWinner->id,
            'extension_count' => $comWinner->extensionCount,
            'status' => 'done',
            'user_id' => $request->user_id,
            'bid_id' => $comWinner->bid_id,
            'issue_id' => $comWinner->bid->issue_id,
            'stepsFollowed' => $request->stepsFollowed,
            'extended_date' => "15-10-2020",
        ]);
        $user = User::where('id', $user_id)->first();
        $user->score = 100;
        $user->update();
        $comWinner->delete();
        $issueSolved = Issue::where('id', $newWinnerHistory->issue_id)->first();
        $issueSolved->status = 'done';
        $issueSolved->update();
        // $newUser = User::where('id', "=", $user_id)->first();

        
        return [$newWinnerHistory, $user];
    }

    public function histCheck()
    {
        $his = IssueResolveHistory::all();
        return $his;
    }

    public function bidCheck()
    {
        $bid = Bid::all();
        return $bid;
    }

    public function winnerCheck()
    {
        $winners = Winner::all();
        return $winners;
    }

    public function userCheck()
    {
        $users = User::all();
        return $users;
    }

    

    
}
