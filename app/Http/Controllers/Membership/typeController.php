<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MembershipType;

class typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $membershiptype = MembershipType::get();
            return response()->json($membershiptype);

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
            'membershiptype_title' =>'required | unique:membership_types',
            'membershiptype_description' =>'required',
            'membershiptype_price' =>'required',
    ]);

                $data = array();
                $data['membershiptype_title'] = $request->membershiptype_title;
                $data['membershiptype_description'] = $request->membershiptype_description;
                $data['membershiptype_price'] = $request->membershiptype_price;
                $data['membershiptype_date'] = date('d/m/y');

                MembershipType::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membershiptype = Membershiptype::where('id',$id)->first();
        return response()->json($membershiptype);
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
            'membershiptype_title' =>'required',
            'membershiptype_description' =>'required',
            'membershiptype_price' =>'required',
    ]);

                $data = array();
                $data['membershiptype_title'] = $request->membershiptype_title;
                $data['membershiptype_description'] = $request->membershiptype_description;
                $data['membershiptype_price'] = $request->membershiptype_price;
                $data['membershiptype_date'] = date('d/m/y');
                $membershiptype = membershiptype::where('id' , $id)->first()->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        membershiptype::where('id' , $id)->delete();
    }
}
