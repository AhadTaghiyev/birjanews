<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PhpMaillerController extends Controller
{

    public function sendMailContact(Request $request)
    {

        $rules = [
            'fullname' => 'required|max:50|min:3',
            'email' => 'required|email|max:100',
            'text' => 'required'
        ];

        $customMessages = [
            'fullname.required' => __('validation.name'),
            'fullname.min' => __('validation.name_min'),
            'fullname.max' => __('validation.name_max'),
            'email.required' => __('validation.c_email'),
            'email.email' => __('validation.c_email_email'),
            'email.max' => __('validation.c_email_max'),
            'text.required' => __('validation.c_message'),
        ];


        $validator = Validator::make($request->all(), $rules, $customMessages);


        if ($validator->fails()) {
            return redirect(url()->previous() .'#CommentForm')->withErrors($validator)->withInput()->with('contactError', __('validation.mail_not_sent'));
        }

        $name = $request->fullname;
        $email = $request->email;
        $phone = $request->phone;
        $content = $request->text;

        Mail::send('email.visitor_email', ['name' => $name, 'phone' => $phone, 'email' => $email, 'content' => $content], function ($message) use ($request) {

            $message->from($request->email, $request->name);

            $message->to('info@oko.az')->subject('Subject of the message!');
        });


        return redirect(url()->previous() .'#CommentForm')->with('contactStatus', __('validation.mail_sent'));
    }
}
