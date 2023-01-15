<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Message;
use App\Models\MessageHistory;
use App\Models\subscribe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function mymessages()
    {
        $messgehistory = MessageHistory::select(
            'message_histories.id as mhid',
            'message_histories.user_id',
            'message_histories.message_id',
            'message_histories.created_at as createtime',
            'campaigns.id as campid',
            'campaigns.campaign_name',
            'messages.message'
        )
            ->where('user_id', Auth::user()->id)
            ->join('messages', 'messages.id', '=', 'message_histories.message_id')
            ->join('campaigns', 'campaigns.id', '=', 'messages.camp_id')
            ->get();

        // dd($messgehistory);
        return view('admin.pages.messageHistory.mymessage', get_defined_vars());
    }

    public function allMessages()
    {
        $messgehistory = MessageHistory::select(
            'message_histories.id as mhid',
            'message_histories.user_id',
            'message_histories.message_id',
            'message_histories.created_at as createtime',
            'campaigns.id as campid',
            'campaigns.campaign_name',
            'messages.message',
            'users.name',
        )

            ->join('messages', 'messages.id', '=', 'message_histories.message_id')
            ->join('campaigns', 'campaigns.id', '=', 'messages.camp_id')
            ->join('users', 'users.id', '=', 'message_histories.user_id')
            ->get();

        return view('admin.pages.messageHistory.allmessages', get_defined_vars());
    }

    public function sendMessageToUser()
    {
        // $user = User::where('type', 'User')->get();
        // $subscribes = subscribe::get();
        // $message = Message::get();
        // $campign = Campaign::where('status', 'Active')->get();


        // $messageData = Message::select(
        //     'messages.message',
        //     'messages.camp_id',
        //     'messages.delay',
        //     'subscribes.user_id',
        //     'users.name',
        //     'users.email',
        //     'users.id as uid',
        //     'campaigns.id as cid',
        //     'campaigns.campaign_name',
        //     'campaigns.from_date',
        // )
        //     ->join('subscribes', 'subscribes.camp_id', 'messages.camp_id')
        //     ->join('users', 'users.id', 'subscribes.user_id')
        //     ->join('campaigns', 'campaigns.id', 'messages.camp_id')
        //     ->get();


        // echo   $todaysDate =  date('Y-m-d H:i:s');
        // echo '<br>';
        // echo '-----------------------------';
        // echo '<br>';

        // foreach ($messageData as $each) {
        //     $d0 = strtotime($todaysDate);
        //     $d1 = strtotime($each->delay);

        //     $sumTime = $d1 + $d0;

        //     $new_time = date("Y-m-d H:i:s", $sumTime);

        //     if ($new_time == $each->from_date) {
        //         echo 'date match';
        //     }
        // }
        // dd($messageData);

        // die('<h1>hello</h1>');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MessageHistory  $messageHistory
     * @return \Illuminate\Http\Response
     */
    public function show(MessageHistory $messageHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MessageHistory  $messageHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageHistory $messageHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MessageHistory  $messageHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MessageHistory $messageHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MessageHistory  $messageHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageHistory $messageHistory)
    {
        //
    }
}
