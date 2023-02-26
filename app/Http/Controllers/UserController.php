<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;//for hash or encryption
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userData = User::where('delete_status', 0)->get();

        return response()->json([
            'code' => 200,
            'records' =>  $userData
          ]);
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
        $user = new User;
        $user->username = $request->username; //$request->username
        $user->email = $request->email;
        $user->first_name = $request->fname;
        $user->middle_name = $request->mname;
        $user->last_name = $request->lname;
        $user->password = Hash::make($request->password);

        if($user->save()) {

            return response()->json([
                'code' => 200,
                'description' => 'New user successfully added' 
            ], 200);

        } else {
            return response()->json([
                'code' => 500,
                'description' => 'Server Error!' 
            ], 401);
        }

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
    public function delete($id)
    {
        $user = DB::table('users')
          ->where('id', $id)
          ->update(
            [
              'delete_status' => 1
            ]
        );

        if ($user) {
            return response()->json([
                        'code' => 200,
                        'description' => 'Successfully deleted'
                    ]);
        } else {
        return response()->json([
                    'code' => 500,
                    'description' => 'Server Error!'
                ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $user = DB::table('users')
          ->where('id', $id)
          ->update(
            [
              'status' => 0
            ]
        );

        if ($user) {
            return response()->json([
                        'code' => 200,
                        'description' => 'Successfully deleted'
                    ]);
        } else {
        return response()->json([
                    'code' => 500,
                    'description' => 'Server Error!'
                ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $user = DB::table('users')
          ->where('id', $id)
          ->update(
            [
              'status' => 1
            ]
        );

        if ($user) {
            return response()->json([
                        'code' => 200,
                        'description' => 'Successfully deleted'
                    ]);
        } else {
        return response()->json([
                    'code' => 500,
                    'description' => 'Server Error!'
                ]);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
