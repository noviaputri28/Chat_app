<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\ChatMessage;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class chat extends Component
{
    public $users;
    public $selectedUser;
    public $newMessage;
    public $messages;
    public $loginID;
    public array $onlineUsers = [];

    public function mount()
    {
        //auth()->user()->update(['last_seen' => now()]);

        $this->users = User::whereNot('id', auth()->id())->latest()->get();
        $this->selectedUser = $this->users->first();
        $this->loadMessages();
        $this->loginID = Auth::id();
    }

    public function selectUser($id)
    {
        $this->selectedUser = User::find($id);
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = ChatMessage::query()
            ->where(function ($q) {
                $q->where('sender_id', Auth::id())
                  ->where('receiver_id', $this->selectedUser->id);
            })
            ->orWhere(function ($q) {
                $q->where('sender_id', $this->selectedUser->id)
                  ->where('receiver_id', Auth::id());
            })->get();
    }

    public function receiveMessage(array $data): void
    {
        if ((int)$data['sender_id'] === Auth::id()) return;

        if ($this->selectedUser && (int)$data['sender_id'] === $this->selectedUser->id) {
            $this->loadMessages();
            $this->dispatch('scroll-bottom'); // ← tambahkan ini
        }
    }

    public function submit()
    {
        if (!$this->newMessage) return;

        $message = ChatMessage::create([
            'sender_id'   => Auth::id(),
            'receiver_id' => $this->selectedUser->id,
            'message'     => $this->newMessage,
        ]);

        $message->load('sender');
        $this->messages->push($message);
        $this->newMessage = '';

        broadcast(new MessageSent($message));
    }

    public function userJoined(int $userId): void
    {
        if (!in_array($userId, $this->onlineUsers)) {
            $this->onlineUsers[] = $userId;
        }
    }

    public function userLeft(int $userId): void
    {
        $this->onlineUsers = array_values(
            array_filter($this->onlineUsers, fn($id) => $id !== $userId)
        );
    }


    public function render()
    {
        return view('livewire.chat')
            ->layout('components.layouts.app');
    }
}