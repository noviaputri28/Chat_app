<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Chat</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage your Text and Word settings</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex h-[550px] text-sm border rounded-xl shadow overflow-hidden bg-white">

        <!-- Left: User List -->
        <div class="w-1/4 border-r bg-gray-50">
            <div class="p-4 font-bold text-gray-700 border-b">
                Users
            </div>
            <div class="divide-y" wire:poll.5s="refreshUsers">
                @foreach ($users as $user)
                    <div wire:click="selectUser({{ $user->id }})" class="p-3 cursor-pointer hover:bg-blue-100 transition
                    {{ $selectedUser && $selectedUser->id === $user->id ? 'bg-blue-200' : '' }}">
                        <div class="flex items-center gap-2">
                            {{-- Dot indikator online --}}
                            <span class="w-2 h-2 rounded-full {{ $user->last_seen && $user->last_seen->gt(now()->subMinutes(1)) ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                            <div class="text-gray-800">{{ $user->name }}</div>
                        </div>
                        <!-- <div class="text-xs text-gray-500 ml-4">
                            {{ $user->email }}
                        </div> -->
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right: Chat Section -->
        <div class="w-3/4 flex flex-col">
            <!-- Header -->
            <div class="p-4 border-b bg-gray-50">
                <div class="text-lg font-semibold text-gray-800">
                    {{ $selectedUser->name }}
                </div>
                <!-- <div class="text-xs text-gray-500">
                    {{ $selectedUser->email }}
                </div> -->
            </div>

            <!-- Messages -->
            <div class="flex-1 p-4 overflow-y-auto space-y-2 bg-gray-50">
                @foreach ($messages as $message)
                    <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-xs px-4 py-2 rounded-2xl shadow {{ $message->sender_id === auth()->id() ? 'bg-blue-600 text-red-100' : 'bg-gray-300 text-gray-800' }}">
                            {{ $message->message }}
                        </div>
                    </div>
                @endforeach
            </div>

            <form wire:submit="submit" class="p-4 border-t bg-gray-100 flex items-center gap-2">
                <input
                    wire:model="newMessage"
                    type="text"
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none text-gray-800"
                    placeholder="Type your message..." />
                <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-full">
                    Kirim
                </button>
            </form>
        </div>
    </div>
    <script>
    // Kirim heartbeat setiap 30 detik selama user aktif di halaman ini
    function sendHeartbeat() {
        fetch('/update-last-seen', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        });
    }

    // Kirim saat pertama buka
    sendHeartbeat();

    // Kirim setiap 30 detik
    setInterval(sendHeartbeat, 30000);
</script>
</div>