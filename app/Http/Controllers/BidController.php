<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class BidController extends Controller
{
    
    public function index()
    {
        $bids = Bid::latest()->get();
        return $bids;
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'issue_id'=> 'required',
            'user_id'=> 'required',
            'timeToFix'=> 'required|numeric',
            'sendBackDate' => 'required',
            'needSupport'=> 'required',
            'needSpare'=> 'required',
            'possibleCost'=> 'required',
            'haveExistingTask'=> 'required'
        ]);

        // $firstWinner = Bid::where('issue_id', '=', $request->issue_id)->get()->max('score');
        // return $firstWinner;
        // dd("hello");
        $allBids = Bid::where('issue_id', '=', $request->issue_id)->get();
        for($i = 0; $i < count($allBids); $i++){
            if($allBids[$i]->user_id == $request->user_id){
                return response()->json(['error' => 'You have already bid on this issue']);
            }
        }

        $newBid =  Bid::create([
            'issue_id' => $request->issue_id,
            'user_id' => $request->user_id,
            'timeToFix' => (int)$request->timeToFix,
            'sendBackDate' => $request->sendBackDate,
            'needSupport' => $request->needSupport,
            'needSpare' => $request->needSpare,
            'possibleCost' => (int)$request->possibleCost,
            'haveExistingTask' => $request->haveExistingTask,
            'score' => 50,
        ]);

        return $newBid;
        // return redirect()->route('issues.running')->withMessage('Successfully!');

        // $topScore = Bid::where('issue_id', '=', $request->issue_id)->get()->max('score');
        // $firstWinner = Bid::where('issue_id', '=', $request->issue_id)->
        //                     where('score', $topScore)->
        //                     first();

        // $current = Carbon::now();

        // // return $firstWinner;

        // $prevWinner = Winner::where('bid_id', $firstWinner->id)->get();
        // if(!isset($prevWinner))
        // {
            
        //     $win = Winner::create([
        //         'bid_id' => $firstWinner->id,
        //         'extensionCount' => 1,
        //         'position' => 1,
        //         'endingAt' => $current->addHour($firstWinner->timeToFix)
        //         ]);
        //         return $win;
            

        // }
        // return $prevWinner;
        
        
        
        
        
        // if(!isset($prevWinner)){
        //     $win = Winner::create([
        //         'bid_id' => $firstWinner->id,
        //         'extensionCount' => 1,
        //         'position' => 1,
        //         'endingAt' => $current->addHour($firstWinner->timeToFix)
        //     ]);
        //     return $win;
        // }
        // else{
        //     $prevWinner->bid_id = $firstWinner->id;
        //     $prevWinner->endingAt = $current->addHour($firstWinner->timeToFix);
        //     $prevWinner->update();
        // }
        // return $prevWinner;

        
        // $response = [
        //     'user' => $user,
        //     'token' => $token
        // ];
    // return "hello";
    
    }

    public function showBids($issue_id)
    {
        $bids = Bid::where('issue_id', $issue_id)->get();
        $bidWinner = Bid::orderBy('score', 'desc')->where('issue_id', $issue_id)->first();
        return view('backend.bids.issue_wise_bids', ['bids' => $bids, 'bidWinner' => $bidWinner]);
    }
}
