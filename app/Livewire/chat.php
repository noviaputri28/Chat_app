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

    public function mount()
    {
        auth()->user()->update(['last_seen' => now()]);

        $this->users = User::whereNot('id', auth()->id())->latest()->get();
        $this->selectedUser = $this->users->first();
        $this->loadMessages();
        $this->loginID = auth::id();
    }

    public function selectUser($id)
    {
        $this->selectedUser = User::find($id);
        $this->loadMessages();
    }

    public function refreshUsers()
    {
        $this->users = User::whereNot('id', auth()->id())->latest()->get();
    }

    public function LoadMessages(){
        $this->messages = ChatMessage::query()
            ->where(function ($q) {
                $q->where("sender_id", Auth::id())
                ->where("receiver_id", $this->selectedUser->id);
            })
            ->orWhere(function ($q) {
                $q->where("sender_id", $this->selectedUser->id)
                ->where("receiver_id", Auth::id());
            }) ->get();
    }

    public function submit()
    {
        //dd($this->newMessage);
        if(!$this->newMessage) return;

        $messages = ChatMessage::create([
            "sender_id" => Auth::id(),
            "receiver_id" => $this->selectedUser->id,
            "message" => $this->newMessage
        ]);

        $this->messages->push($messages);

        $this->newMessage = '';

        broadcast(new MessageSent($messages));  
        //$this->loadMessages();
    }

    public function getListeners()
    {
        return [
            "echo-private:chat.{$this->loginID},MessageSent" => 'newChatMessageNotification'
        ];
    }

    public function newChatMessageNotification($message)
    {
        if ($message['sender_id'] == $this->selectedUser->id) {
            $messageObj = ChatMessage::find($message['id']);
            $this->messages->push($messageObj);
        }
    }

    public function render()
    {
        return view('livewire.chat')
            ->layout('components.layouts.app');
    }
}