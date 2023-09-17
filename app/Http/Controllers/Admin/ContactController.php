<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::when($request->order, function ($query) use ($request) {
            $query->orderBy('name', $request->order);
        }, function ($query) use ($request) {
            $query->latest();
        })->paginate(100);
        return view('admin.contacts.index')->with([
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return to_route('admin.contacts.index')->withSuccess('SUCCESS !! Query has been successfully deleted');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        Contact::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Queries has been Deleted successfully."]);
        // return to_route('admin.contacts.index')->withSuccess('SUCCESS !! Queries has been successfully deleted');
    }
}
