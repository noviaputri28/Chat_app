<?php

use Illuminate\Support\Facades\Broadcast;

// Private channel untuk kirim/terima pesan
Broadcast::channel('chat.{receiver_id}', function ($user, $receiver_id) {
    return (int) $user->id === (int) $receiver_id;
});

// Presence channel untuk status online
Broadcast::channel('chat', function ($user) {
    return [
        'id'   => $user->id,
        'name' => $user->name,
    ];
});