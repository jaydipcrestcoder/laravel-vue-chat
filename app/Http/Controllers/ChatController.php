<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

/**
 * ChatController
 * 
 * 
 * @package    Laravel
 * @subpackage Controller
 * @author     ChatApp <ChatApp@domain.com>
 */
class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This function is used to initialize the application
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexMultiple()
    {
        return view('chat-multiple');
    }

    /**
     * This function is used to get all the messages based on user and group
     * @return array
     */
    public function fetchMessages()
    {
        $data = Message::with('user')->get();
        if (!empty($data)) {
            $temp = array();
            foreach ($data as &$value) {
                $value->created_at_formatted = date('d-m-Y h:i A', strtotime($value->created_at));
                $temp[] = $value;
            }
            unset($value);
            $data = $temp;
        }
        return $data;
    }

    /**
     * This function is used to fetchUsers registered on the portal
     * @param $request
     */
    public function fetchUsers(Request $request)
    {
        return User::get();
    }

    /**
     * This function is used to sendMessage to the new user/group
     * @param $request
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();
        return ['status' => 'Message Sent!'];
    }
}
