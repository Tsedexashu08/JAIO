<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resource = Resource::all();
        return view('Resources-page',['resources'=>$resource]);
    }

    public function AddResource(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'file_path' => 'required|file|mimes:pdf,jpeg,png,jpg,gif,svg,mp4,avi,wmv,mov,MP4,docx,pptx|max:20480',
        ]);
        // Process the uploaded images
        $resource = null;
        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('resources', 'public');
            $resource =  Resource::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $path,
                'linkorfile'=>"file"
            ]);
        }
        if ($resource) {
            return redirect()->route('Resources')->with('success', 'Resource added successfully');
        } else {
            return response()->json(['error' => 'Resource not added successfully: ' . $request->file('file_path')->getErrorMessage()], 500);
        }
    }
    public function EditResource(Request $request) {}
    public function DeleteResource($id) {
         $resource = Resource::findOrFail($id);

        if ($resource->delete()) {
            return redirect()->route('Resources')->with('success', 'Resource deleted successfully');
        } else {
            return response()->json(['error' => 'Resource not deleted successfully'], 500);
        }
    }
}
