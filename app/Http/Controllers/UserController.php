<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    // See User Timetable for the sem
    public function timetable(User $user,$sem){
        
        if($user->is_staff){

            $timetable_courses = $user->timetable_for_sem($sem);
        }else{
            $timetable_courses = $user->timetable_for_sem($sem)->get();

        }
        
        return view('user.timetable_course.show',['timetable_courses'=>$timetable_courses,'user'=>$user]);
    }

    // View user profile
    public function profile(User $user){
        return view('user.profile.show',['user'=>$user]);
    }
}
