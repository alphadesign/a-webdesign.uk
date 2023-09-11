<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string',
            'mobile'    => 'required',
            'email'     => 'required|email',
            'message'   => 'required',
        ]);
        Contact::create($data);
        return to_route('contact')->withSuccess("Your message submitted to us! we will reach you soon.");
    }
}
