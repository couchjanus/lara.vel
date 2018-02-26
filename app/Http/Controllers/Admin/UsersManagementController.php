<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UsersManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(env('USER_LIST_PAGINATION_SIZE'));
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTrashed()
    {
        $users = User::onlyTrashed()->paginate(env('USER_LIST_PAGINATION_SIZE'));
        return view('admin.users.trashed', compact('users'));
    }
    
    public function restore($id)
    {
        
        User::withTrashed()
        ->where('id', $id)
        ->restore();

        return redirect(route('users.trashed'))->with('message', 'An user has been restored successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {

        $user = User::create([
            'name'             => $request->input('name'),
            'first_name'       => $request->input('first_name'),
            'last_name'        => $request->input('last_name'),
            'email'            => $request->input('email'),
            'password'         => bcrypt($request->input('password')),
        ]);

        $profile = new Profile();
        $user->profile()->save($profile);
        
        $user->save();
        return redirect(route('users.index'))->with('message', 'An user has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $currentUser = Auth::user();
        $user = User::find($id);
        $user = $request->all();
        $user->save();
        return back()->with('message', 'User has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $currentUser = Auth::user();
        $user = User::findOrFail($id);
        $user->delete();

        // if ($user->id != $currentUser->id) {
        //     $user->delete();
        //     return redirect(route('users.index'))->with('message', 'An user has been deleted successfully');
        // }
        // return back()->with('message', 'This user cannot be deleted');
        return redirect(route('users.index'))->with('message', 'An user has been deleted successfully');
    }
}
