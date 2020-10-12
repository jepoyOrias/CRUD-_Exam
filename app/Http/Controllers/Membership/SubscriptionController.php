<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = DB::table('memberships')
                            ->join('membership_types','memberships.membership_type_id','membership_types.id')
                            ->select('membership_types.membershiptype_title','memberships.*')
                            ->get();
        return response()->json($subscriptions);
    }

    /**

     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             $validateData = $request->validate([
                 'name' => 'required',
             ]);

             $data = array();
             $data['name'] = $request->name;
             $data['membership_type_id'] = $request->subscription_id;
             $data['membership_date'] = date('M/d/y');
             Membership::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscriptions = Membership::where('id',$id)->first();
        return response()->json($subscriptions);
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

        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['membership_type_id'] = $request->subscription_id;
        $data['membership_date'] = date('d/m/y');
        $membershiptype = Membership::where('id' , $id)->first()->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Membership::where('id' , $id)->delete();
    }
}
