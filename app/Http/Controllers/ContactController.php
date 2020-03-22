<?php namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{

    public function index()
    {
        $data = Contact::all();
        return Inertia::render('contacts/index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        Contact::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if ($request->has('id')) {
            Contact::find($request->input('id'))->update($request->all());
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Contact::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }
}
