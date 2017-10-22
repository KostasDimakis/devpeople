<?php

namespace App\Http\Controllers;

use App\Quality;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return all people.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] All people.
     */
    public function index()
    {
        $people = User::orderBy('name')->get();

        return view('people.people_list')->with(compact('people'));
    }

    /**
     * Show the given person.
     *
     * @param User $person
     * @return User
     */
    public function show(User $person)
    {
        $qualities = Quality::all();

        return view('people.show')->with(compact('person', 'qualities'));
    }
}
