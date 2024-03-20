<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(){
        // request('tag')
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(2)
        ]);
    }
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }
    public function create(){
        return view('listings.create');
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required','email'],
            'description' => 'required',
            'tags' => 'sometimes|nullable',
            'website' => 'sometimes|nullable',
        ]);
        Listing::create($formFields);
        return redirect('/')->with('message','Listing created successfully!');
    }
}
