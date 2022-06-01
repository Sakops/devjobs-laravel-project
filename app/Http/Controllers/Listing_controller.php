<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class Listing_controller extends Controller
{
    protected $fillable = [
        'title', 'description', 'company', 'location', 'website', 'description', 'email', 'tags', 
        'user_id', 'created_at', 'updated_at'
    ];
    public function index() {
        return view('listings', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);    
    }
    public function show(Listing $listing) {
        return view('listing', [
            'listing' => $listing
        ]);
    }
    public function create() 
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required', 
            'email' => ['required', 'email'], 
            'tags' => 'required', 
        ]);

        $validatedData['user_id'] = auth()->id();
        
        Listing::create($validatedData);
        return redirect('/')->with('message', 'Your listing has been created');
    }
    public function edit(Listing $listing)
    {
        return view('edit', 
            ['listing' => $listing]
        );
    }
    //update submit 
    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id !== Auth::id()) {
            abort(403);
        }
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required', 
            'email' => ['required', 'email'], 
            'tags' => 'required', 
        ]);
        $listing->update($validatedData);
        return back()->with('message', 'Your listing has been updated');
    }

    //destroy 
    public function destroy(Listing $listing)
    {   
        if ($listing->user_id !== Auth::id()) {
            abort(403);
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Your listing has been deleted');
        
    }
    //manage 
    public function manage(Listing $listing)
    {
        return view('manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }
}
