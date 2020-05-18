<?php

namespace App\Http\Controllers;

use App\Book;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications->take(10);
        foreach ($notifications as $notification) {
            switch ($notification->type) {
                case 'App\Notifications\LoanExpiration':
                    $book_id = $notification->data['book_id'];
                    $notification->data = Book::select('id', 'title', 'cover')->find($book_id);
                    break;
                default:
                    break;
            }
        }
        return view('notification.index', compact('notifications'));
    }
    
    public function markAsRead()
    {
        foreach (auth()->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
    }
}
