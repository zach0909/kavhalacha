<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        return DB::table('donors')->paginate(2);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $donor = new Donor();
        $donor->first_name = $request->get('first_name');
        $donor->last_name = $request->get('last_name');
        $donor->email = $request->get('email');
        $donor->phone_number = $request->get('phone_number');
        $donor->address = $request->get('address');
        $donor->follow_up_calls = $request->get('follow_up_calls') ?? 0;
        $donor->status = $request->get('status') ?? '';
        $donor->comments = $request->get('comments') ?? '';

        $success = $donor->save();

        return response()->json(['success' => $success]);
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
    public function edit($id)
    {
        //
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

    public function receiveBanquestInfo (Request $request) {
        if ($request->authToken !== env('API_AUTHORIZATION_KEY')) {
            return;
        }

        $donor = new Donor();
        $donor->first_name = $request->get('first_name');
        $donor->last_name = $request->get('last_name');
        $donor->email = $request->get('email');
        $donor->phone_number = $request->get('phone_number');
        $donor->address = $request->get('address');
        $donor->last_four = $request->get('last_four');

        try {
            $success = $donor->save();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

        }

        return response()->json(['success' => true]);
    }
}
