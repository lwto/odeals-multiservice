<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\DataTables\NotificationDataTable;

class NotificationController extends Controller
{
    public function index(NotificationDataTable $dataTable)
    {

        $pageTitle = __('messages.list_form_title',['form' => __('messages.provider')] );
        $assets = ['datatable'];

        return $dataTable->render('notification.index', compact('pageTitle','assets'));
    }

    public function notificationList(Request $request){
        $user = auth()->user();
        $user->last_notification_seen = now();
        $user->save();

        $type = isset($request->type) ? $request->type : null;
        if($type == "markas_read"){

            if(count($user->unreadNotifications) > 0 ) {
                $user->unreadNotifications->markAsRead();
            }
            $notifications = $user->notifications->take(5);
        } elseif($type == null) {
            $notifications = $user->notifications->take(5);
        } else {
            $notifications = $user->notifications->where('data.type',$type)->take(5);
        }
        $all_unread_count=isset($user->unreadNotifications) ? $user->unreadNotifications->count() : 0;

        $new_booking_count =  isset($user->unreadNotifications) ? $user->unreadNotifications->where('data.type','booking_added')->count() : 0;
        
        return response()->json([
            'status'     => true,
            'type'       => $type,
            'data'       => view('notification.list', compact('notifications','new_booking_count','all_unread_count','user'))->render()
        ]);
    }

    public function notificationCounts(Request $request)
    {

        $user = auth()->user();

        $unread_count = 0;
        $unread_total_count = 0;

        if(isset($user->unreadNotifications)){
            $unread_count =$user->unreadNotifications->where('created_at', '>', $user->last_notification_seen)->count() ;
            $unread_total_count = $user->unreadNotifications->count();
        }
        return response()->json([
            'status'     => true,
            'counts' => $unread_count,
            'unread_total_count' => $unread_total_count
        ]);
    }
}
