<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageStoreRequest;
use App\Mail\AutoReply;
use App\Mail\ContactUS;
use App\Models\Message;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function send_message(MessageStoreRequest $request)
    {
        try {
            $message = new Message();
            $message->full_name = $request->full_name;
            $message->email = $request->email;
            $message->phone_number = $request->phone_number;
            $message->message = $request->message;
            $message->company_name = $request->company_name;
            $message->save();

           try {
               Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactUS($request->full_name, $request->email, $request->phone_number, $request->message, $request->company_name));
               Mail::to($request->email)->send(new AutoReply($request->full_name));
           } catch (\Throwable $exception) {
               Log::info($exception->getMessage());
           }

            return response()->success('Message has been send successfully');

        } catch (\Throwable $exception) {
            return response()->error($exception->getMessage(), 500);
        }
    }
}
