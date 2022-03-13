<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Issue;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IssueControllerBack extends Controller
{
    public function pendingIssues(){
        $issues = Issue::where('status', 'pending')->get();
        return view('backend.issues.pendingIssues', ['issues' => $issues]);
    }

    public function runningIssues()
    {
        $issues = Issue::where('status', 'running')->get();
        return view('backend.issues.runningIssues', ['issues'=> $issues]);
    }

    public function doneIssues()
    {
        $issues = Issue::where('status', 'done')->get();
        return view('backend.issues.doneIssues', ['issues'=> $issues]);
    }

    public function assign(Issue $issue)
    {
        // dd($issue);
        
        $topScore = Bid::where('issue_id', '=', $issue->id)->get()->max('score');
        $firstWinner = Bid::where('issue_id', '=', $issue->id)->
                            where('score', $topScore)->
                            first();
        $current = Carbon::now();
        
        $win = Winner::create([
            'bid_id' => $firstWinner->id,
            'issue_id'=> $issue->id,
            'user_id' => $firstWinner->user_id,
            'extensionCount' => 1,
            'position' => 1,
            'endingAt' => $current->addHour($firstWinner->timeToFix)
            ]);
        $issue->status = 'running';
        $issue->update();
        return redirect()->route('issues.running')->withMessage('Successfully Created!');
    }
}

