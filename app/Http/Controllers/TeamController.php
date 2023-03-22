<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('team.index', [
            'teams' => Team::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('team.new', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $person_name        = $request->person_name;
        $person_description = $request->person_description;
        $person_position    = $request->person_position;
        $facebook_url       = $request->facebook_url;
        $twitter_url        = $request->twitter_url;
        $instagram_url      = $request->instagram_url;
        $linkedin_url       = $request->linkedin_url;

        $image      = $request->file('image');
        
        $image_path = $image->store('images', ['disk' => 'public']);

        Team::create([
            'person_name'       => $person_name,
            'person_description'    => $person_description,
            'person_position'   => $person_position,
            'facebook_url'      => $facebook_url,
            'twitter_url'       => $twitter_url,
            'instagram_url'     => $instagram_url,
            'linkedin_url'      => $linkedin_url,
            'image'             => $image_path
        ]);
        
        return redirect()->route('dashboard.team')->with('success', 'Success add person to team');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
