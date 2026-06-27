<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    public function notification()
    {
        return view("backend.others.notification-test");
    }
    public function notification2()
    {
        return view("backend.others.notification-test2");
    }


    public function notification3()
    {
        return view("backend.others.notification-test3");
    }



    public function storeToken(Request $request)
    {
        Session::put("device_token", $request->device_token);
        Session::get("device_token");
        return response()->json([Session::get("device_token")]);
    }

    public function send_notification(Request $request)
    {
        if ($request->isMethod("get")) {
            return redirect(route('notification'));
        }
        $url = 'https://fcm.googleapis.com/fcm/send';
        // $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();
        $FcmToken = null;
        if (Session::get("device_token") || $request->device_token) {
            $FcmToken = [Session::get("device_token")];
            if ($request->device_token) {
                $FcmToken = $request->device_token;
                dd($FcmToken);
            }
        } else {
            dd('token not found');
        }


        $serverKey = 'AAAAecPkbUE:APA91bFzFP7rdduqNZ_c4ps6yN_mzPAhr_2KCcY6AdvsFHOqP-ISDkZtq2MNWQx6y_Nh2b9nweZU9hcfn2hZVo1h4zWzgb0NIhYHI7XtC8eHmYtkEawv-kfhFSWLRszKAJGl3YpN4Daz';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }
}
