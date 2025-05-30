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

    public function AddResource(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
    
            'file_path' => 'exclude_unless:linkOrfile,file|file|mimes:mp4,avi,wmv,mov,webm,ogg|max:204800',
            'pdf_path' => 'exclude_unless:linkOrfile,pdf|file|mimes:pdf,docx|max:20480',
    
            'link' => 'exclude_unless:linkOrfile,link|string|required_if:linkOrfile,link|url|starts_with:https://www.youtube.com',
    
            'linkOrfile' => 'required|in:file,link,pdf',
        ]);
    
        $resource = null;
    
        if ($request->hasFile('file_path') && $request->linkOrfile === 'file') {
            $path = $request->file('file_path')->store('resources/videos', 'public');
            $resource = Resource::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $path,
                'linkorfile' => "file",
                'link' => null,
            ]);
        } elseif ($request->hasFile('pdf_path') && $request->linkOrfile === 'pdf') {
            $path = $request->file('pdf_path')->store('resources/pdfs', 'public');
            $resource = Resource::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => $path,
                'linkorfile' => "pdf",
                'link' => null,
            ]);
        } elseif ($request->filled('link') && $request->linkOrfile === 'link') {
            $resource = Resource::create([
                'title' => $request->title,
                'description' => $request->description,
                'file_path' => null,
                'linkorfile' => "link",
                'link' => $this->getSafeYoutubeEmbedUrl($request->link),
            ]);
        } else {
            return back()->withErrors(['Please provide a valid resource (file, link, or PDF).'])->withInput();
        }
    
        if ($resource) {
            return redirect()->route('Resources')->with('success', 'Resource added successfully');
        } else {
            return response()->json(['error' => 'Resource not added successfully.'], 500);
        }
    }
    
    /**
     * Generate safe YouTube embed URL
     */
    protected function getSafeYoutubeEmbedUrl($url)
    {
        $videoId = $this->extractYouTubeId($url);

        if (!$videoId) {
            return '';
        }

        return "https://www.youtube.com/embed/{$videoId}?rel=0&enablejsapi=1";
    }

    /**
     * Extract YouTube ID (more robust version)
     */
    protected function extractYouTubeId($url)
    {
        $patterns = [
            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i',
            '/^([^"&?\/\s]{11})$/i' // Just in case only ID is stored
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
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
