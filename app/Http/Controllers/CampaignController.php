<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaign = Campaign::get();
        return view('admin.pages.campaign.index', get_defined_vars());
    }
    public function userSubscription()
    {



        $campaignForUser = subscribe::where('user_id', Auth::user()->id)
            ->join('campaigns', 'campaigns.id', '=', 'subscribes.camp_id')
            ->get();

        // dd($campaignForUser);

        return view('admin.pages.campaign.usersubscripton', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.campaign.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'campaign_name' => 'required',
            'campaign_description' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        $Campaign = new Campaign();
        $Campaign->campaign_name = $request->campaign_name;
        $Campaign->campaign_description = $request->campaign_description;
        $Campaign->from_date = date('Y-m-d H:i:s', strtotime($request->from_date));
        $Campaign->to_date = date('Y-m-d H:i:s', strtotime($request->to_date));
        $Campaign->save();


        return redirect('/campaigns')->with('message', 'Campaign created Successfully');
    }


    public function subscribeCamp(Request $request)
    {

        $subscribe = subscribe::select('camp_id')->where('user_id', Auth::user()->id)->get();




        $campaignForUser = Campaign::where('status', 'Active')
            ->whereNotIn('id', $subscribe)
            ->get();


        $campaignForAdmin = Campaign::where('status', 'Active')->get();

        return view('admin.pages.campaign.subscribe', get_defined_vars());
    }

    public function subscribestore($campid, $uid)
    {

        if (empty($uid)) {
            session()->flash('ops', 'Invalid.');
            return redirect('/subscribeCamp');
        }

        if (empty($campid)) {
            session()->flash('ops', 'Invalid.');
            return redirect('/subscribeCamp');
        }

        $subscribe = new subscribe();
        $subscribe->user_id = $uid;
        $subscribe->camp_id = $campid;
        $subscribe->save();
        session()->flash('success', 'Campaign create Successfully.');
        return redirect('/subscribeCamp');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
