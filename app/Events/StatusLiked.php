<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StatusLiked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    // public $username;
    public $message;
    public $userIDs;
    // public $commentid;
    // public $postid;
    public $data;
    // public $not_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$userIDs = null,$data)
    {

        $this->message = $message;
        $this->userIDs = $userIDs;
        $this->data = $data;
        // $this->username = $username;
        // $this->commentid = $commentid;
        // $this->postid = $postid;
        // $this->message = "{$username} liked your status";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        $channels = [];
        if($this->userIDs == null){
            $channels = ['status-liked'];
        }
        else{
            foreach($this->userIDs as $userID){
                array_push($channels, 'status-liked.'.$userID);
            }
        }
        return $channels;
        // return ['status-liked'];
    }
}
