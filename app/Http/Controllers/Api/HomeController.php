<?php

namespace App\Http\Controllers\Api;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class HomeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function _home() {
        $username = 'Sohana Afsana'; // Replace with dynamic data
        return view('home', compact('username'));
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
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
