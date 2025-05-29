<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        
            'file_path' => 'exclude_unless:linkOrfile,file|file|mimes:mp4,avi,wmv,mov,webm,ogg|max:204800',
            'link' => 'exclude_unless:linkOrfile,link|string|required_if:linkOrfile,link',
        
            'linkOrfile' => 'required|in:file,link',
        ]);
        
        // Process the uploaded images
        $resource = null;

        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('resources', 'public');
            $resource = Resource::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $path,
                'linkorfile' => "file",
                'link' => null, // just to be explicit
            ]);
        } else if ($request->filled('link')) {
            $resource = Resource::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => null,  // no file uploaded
                'linkorfile' => "link",
                'link' => $request->link,
            ]);
        } else {
            // Handle error: neither file nor link provided
            return back()->withErrors(['Please provide a file or a link.'])->withInput();
        }

        if ($resource) {
            return redirect()->route('Resources')->with('success', 'Resource added successfully');
        } else {
            return response()->json(['error' => 'Resource not added successfully: ' . $request->file('file_path')->getErrorMessage()], 500);
        }
    }
    public function EditResource(Request $request) {}
    public function DeleteResource($id) {

        $resource = Resource::where('resource_id', $id)->firstOrFail();

        if ($resource->file_path && Storage::exists($resource->file_path)) {
            Storage::delete($resource->file_path);
        }

        if ($resource->delete()) {
            return redirect()->route('Resources')->with('success', 'Resource deleted successfully');
        } else {
            return response()->json(['error' => 'Resource not deleted successfully'], 500);
        }
    }
}
