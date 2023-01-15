<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Message;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = Message::get();
        return view('admin.pages.message.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $camp = Campaign::where('status', 'Active')->get();
        return view('admin.pages.message.create', get_defined_vars());
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
            'camp_id' => 'required',
            'delay' => 'required',
            'message' => 'required',
        ]);

        $camp_id = $request->camp_id;
        $message = $request->message;
        $delay = $request->delay;

        for ($i = 1; $i < count($camp_id); $i++) {
            // echo $message[$i];
            $messages = new Message();
            $messages->camp_id = $camp_id[$i];
            $messages->message = $message[$i];
            $messages->delay = date('H:i:s', strtotime($delay[$i]));
            $messages->save();
        }
        return redirect('/messagelist')->with('message', 'Message created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
