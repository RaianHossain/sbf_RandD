<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::latest()->get();
        return $issues;
    }

    public function store(Request $request)
    {
        $request->validate([
            'alarm'=> 'required',
            'history'=> 'required',
            'description'=> 'required',
            'stepsTaken'=> 'required',
            'status' => 'required',
            'occuringDate'=> 'required'
        ]);

        return Issue::create([
            'alarm' => $request->alarm,
            'history' => $request->history,
            'description' => $request->description,
            'stepsTaken' => $request->stepsTaken,
            'status' => $request->status,
            'occuringDate' => $request->occuringDate
        ]);

        // return Issue::create([
        //     'alarm' => "red",
        //     'history' => "no history11",
        //     'description' => "Some description for the issue that you have to fix. You know",
        //     'stepsTaken' => "jani na tumio jano na ke jane",
        //     'status' => "pending",
        //     'occuringDate' => "12-123-123"
        // ]);
    }

    public function show(Issue $issue)
    {
        return $issue;
    }

    public function update(Request $request, $id)
    {
        $issue = Issue::find($id);
        $issue->update($request->all());
        return $issue;
    }

    public function pendingIssues(){
        $issues = Issue::where('status', 'pending')->get();
        return $issues;
    }

    public function runningIssues()
    {
        $issues = Issue::where('status', 'running')->get();
        return $issues;
    }

    public function doneIssues()
    {
        $issues = Issue::where('status', 'done')->get();
        return $issues;
    }

    public function myUpload($id){
        $myUploads = Issue::where('user_id', $id)->get();
        return $myUploads;
    }
}
