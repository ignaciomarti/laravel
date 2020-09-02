<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Auth;
class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'string|max:50|required',
            'last_name' => 'string|max:50|required',
            'email' => 'email:rfc,dns|required',
            'contact_number' => 'numeric'
        ]);
        Contact::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
        return redirect()->route('home')->with(['success' => 'The user has been saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'first_name' => 'string|max:50|required',
                'last_name' => 'string|max:50|required',
                'email' => 'email:rfc,dns|required',
                'contact_number' => 'numeric'
            ]);

            $contact = Contact::find($id);
            $contact->update($request->all());
            return redirect()->route('home')->with(['success' => 'The contact has been updated successfully']);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with(['error' => 'There was an error. Please, check the contact fields.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->back()->with(['success'=>'The contact has been deleted']);
    }
}
