<?php
namespace App\Events;

use App\Models\ChatMessage;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastnow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastnow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public ChatMessage $message) {}

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat.' . $this->message->receiver_id),
            new PrivateChannel('chat.' . $this->message->sender_id), // ← TAMBAH INI
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'id'          => $this->message->id,
            'message'     => $this->message->message,
            'sender_id'   => $this->message->sender_id,
            'receiver_id' => $this->message->receiver_id,
            'sender_name' => $this->message->sender->name,
            'created_at'  => $this->message->created_at->format('H:i'),
        ];
    }
}