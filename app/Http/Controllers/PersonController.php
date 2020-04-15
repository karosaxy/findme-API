<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
   
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName'      => 'required',
            'lastName'       => 'required',
            'email'          => 'required',
            'phone'          => 'required',
            'city'           => 'required',
        ]);
        
        $person = Person::create($request->all());
        
        return new PersonResource($person);
    }


    public function Update(Person $person, Request $request): PersonResource
    {
        $person->update($request->all());

        return new PersonResource($person);
    }


    public function destroy(Person $person)
    {
       $person->delete();

       return response()->json(["message"=>"person deleted"]);
    }
} 