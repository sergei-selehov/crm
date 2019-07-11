<?php

namespace App\Http\Controllers;

use App\Models\ContactFace;
use App\Models\Counterpart;
use Illuminate\Http\Request;

class ContactFaceController extends Controller
{
    public function index()
    {
        $contactFace = ContactFace::get();
        return view('manager.contact', ['contactFace' => $contactFace]);
    }
}
