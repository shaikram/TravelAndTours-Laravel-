<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packageData = Packages::where('delete_status', 0)->get();

        return response()->json([
            'code' => 200,
            'records' =>  $packageData
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = new Packages;
        $package->package = $request->package; //$request->username
        $package->title = $request->package_title;
        $package->description = $request->package_description;
        $package->destination_id = $request->destination_id;

        $isPackage_existed = Packages::where('package', $package->package)
                                    ->where('delete_status', 0)
                                    ->count();

        if($isPackage_existed <= 0) {

            if($package->save()) {

                return response()->json([
                    'code' => 200,
                    'description' => 'New package successfully added' 
                ], 200);
    
            } else {
                return response()->json([
                    'code' => 500,
                    'description' => 'Server Error!' 
                ], 401);
            }
        } else {
            return response()->json([
                'code' => 401,
                'description' => 'Package is already existed!' 
            ], 401);
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function show(Packages $packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function edit(Packages $packages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Packages $packages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packages $packages)
    {
        //
    }
}
