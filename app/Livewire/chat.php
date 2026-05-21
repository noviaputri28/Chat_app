<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\ChatMessage;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

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
        $this->users = User::whereNot('id', auth()->id())->latest()->get();
        $this->selectedUser = $this->users->first();
        $this->loadMessages();
        $this->loginID = Auth::id();
    }

    public function selectUser($id)
    {
        $this->selectedUser = User::find($id);
        $this->loadMessages();
        $this->dispatch('scroll-bottom');
    }

    public function loadMessages()
    {
        if (!$this->selectedUser) {
            $this->messages = collect();
            return;
        }

        $this->messages = ChatMessage::query()
            ->where(function ($q) {
                $q->where('sender_id', Auth::id())
                  ->where('receiver_id', $this->selectedUser->id);
            })
            ->orWhere(function ($q) {
                $q->where('sender_id', $this->selectedUser->id)
                  ->where('receiver_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();
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
        $this->newMessage = '';

        broadcast(new MessageSent($message));

        $this->loadMessages();
        $this->dispatch('scroll-bottom');
    }

    // Dipanggil dari JS via $wire.call() — tanpa #[On]
    public function onOnlineUsersUpdated(array $ids): void
    {
        // $wire.call() mengirim array langsung tanpa wrapping
        $this->onlineUsers = array_map('intval', $ids);
    }

    // Dipanggil dari JS via $wire.call() — tanpa #[On]
    public function onUserJoined(int $id): void
    {
        if (!in_array($id, $this->onlineUsers)) {
            $this->onlineUsers[] = $id;
        }
    }

    // Dipanggil dari JS via $wire.call() — tanpa #[On]
    public function onUserLeft(int $id): void
    {
        $this->onlineUsers = array_values(
            array_filter($this->onlineUsers, fn($i) => $i !== $id)
        );
    }

    // Dipanggil dari JS via $wire.call() saat pesan masuk
    public function receiveMessage(array $data): void
    {
        $senderId = $data['sender_id'] ?? null;

        if (!$senderId) return;
        if ((int) $senderId === Auth::id()) return;

        if ($this->selectedUser && (int) $senderId === (int) $this->selectedUser->id) {
            $this->loadMessages();
            $this->dispatch('scroll-bottom');
        }
    }

    public function render()
    {
        return view('livewire.chat')
            ->layout('components.layouts.app');
    }
}