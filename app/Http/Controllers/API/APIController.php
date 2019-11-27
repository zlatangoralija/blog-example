<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function updateNotification(Notification $notification){
        $notification->is_read = true;
        $notification->save();
    }
}
