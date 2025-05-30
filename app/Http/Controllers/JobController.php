<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{

    public function index(){
        $jobs = JobListing::all();
        return view('job-listing-page',['jobs'=>$jobs]);
    }
    public function AddJob(Request $request) {
        $request->validate([
            'type' => 'required|string',
            'company_name' => 'required|string',
            'title' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|string',
            'application_deadline' => 'required|date',
            'application_link' => 'required|string',
        ]);
     
        $folderPath = 'public/company_logos';
    
        // Check if the folder exists, if not, create it
        if (!Storage::disk('public')->exists($folderPath)) {
            Storage::disk('public')->makeDirectory($folderPath);
        }
    
        $logo = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store($folderPath, 'public');
        }
    
        try {
            $job = JobListing::create([
                'type'=> $request->type,
                'company_name'=> $request->company_name,
                'title'=> $request->title,
                'location'=> $request->location,
                'description'=> $request->description,
                'category'=> $request->category,
                'logo'=> $logo,
                'application_deadline'=> $request->application_deadline,
                'application_link'=> $request->application_link,
            ]);
            
            return redirect()->route('joblisting')->with('success', 'Job added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Job not added successfully: ' . $e->getMessage());
        }
    }

public function DeleteJob($id){
    $job = JobListing::findOrFail($id);
    if($job){
        $job->delete();
        return redirect()->back()->with('success', 'Job deleted successfully');
    }else
    {
        return redirect()->back()->with('error', 'something went wrong');
    }
}
}
