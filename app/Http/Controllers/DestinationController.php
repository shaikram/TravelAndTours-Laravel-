<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $destinationData = Destination::where('delete_status', 0)->orderBy('id', 'DESC')->get();

        return response()->json([
            'code' => 200,
            'records' =>  $destinationData
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = DB::table('destinations')
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
        $product = new Destination();
        $product->destination = $request->destination; //$request->username
        $product->image = $request->file;
        $product->description = $request->description;
        $product->user_id = $request->id;


        if($product->save()) {

            return response()->json([
                'code' => 200,
                'description' => 'New destination successfully added' 
            ], 200);

        } else {
            return response()->json([
                'code' => 500,
                'description' => 'Server Error!' 
            ], 401);
        }
    }

    public function upload_product(Request $request)
    {
        $request->validate([
            'images' => 'required'
          ]);
    
          if ($request->hasfile('images')) {
                $images = $request->file('images');
    
                foreach($images as $image) {
                    $name = $image;
                    $name->move(public_path('assets/destination/'), $name);

                }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destination = Destination::where('id', $id)->get();
        
        return view('admin/show_product', ['destination' => $destination]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
