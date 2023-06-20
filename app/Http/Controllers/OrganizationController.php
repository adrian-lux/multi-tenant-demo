<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Providers\RouteServiceProvider;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = auth()->user()->organizations;

        return view('organizations', compact('organizations'));
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
    public function store(StoreOrganizationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }

    public function switch(Organization $organization)
    {
        $user = auth()->user();

        //return [$user];
        $orgUser = OrganizationUser::where('organization_id', $organization->id)->where('user_id', $user->id)->get();

        if (!isset($orgUser[0])) {
            return response(['access denied'], 403);
        }

        $user->update(['active_organization_id' => $organization->id]);

        return redirect(RouteServiceProvider::HOME);
        // return redirect('organizations.index');
    }
}
