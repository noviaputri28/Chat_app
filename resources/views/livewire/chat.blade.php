<div
    x-data="{
        init() {
            const chatBox = document.getElementById('chatBox');

            const scrollToBottom = () => {
                if (chatBox) chatBox.scrollTop = chatBox.scrollHeight;
            };

            scrollToBottom();

            if (!window.Echo) {
                console.error('[Echo] window.Echo belum tersedia!');
                return;
            }

            // Presence channel — status online realtime
            window.Echo.join('chat')
                .here((users) => {
                    console.log('[Echo] here:', users);
                    const ids = users.map(u => parseInt(u.id));
                    $wire.call('onOnlineUsersUpdated', ids);
                })
                .joining((user) => {
                    console.log('[Echo] joining:', user);
                    $wire.call('onUserJoined', parseInt(user.id));
                })
                .leaving((user) => {
                    console.log('[Echo] leaving:', user);
                    $wire.call('onUserLeft', parseInt(user.id));
                })
                .error((err) => console.error('[Echo] presence error:', err));

            // Private channel — terima pesan realtime
            window.Echo.private('chat.{{ auth()->id() }}')
                .listen('MessageSent', (e) => {
                    console.log('[Echo] pesan masuk:', e);
                    $wire.call('receiveMessage', e);
                    setTimeout(scrollToBottom, 100);
                });

            Livewire.on('scroll-bottom', scrollToBottom);
        }
    }"
>
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
            <div class="divide-y">
                @foreach ($users as $user)
                    <div
                        wire:click="selectUser({{ $user->id }})"
                        class="p-3 cursor-pointer hover:bg-blue-100 transition {{ $selectedUser && $selectedUser->id === $user->id ? 'bg-blue-200' : '' }}"
                    >
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full {{ in_array($user->id, $onlineUsers) ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                            <div class="text-gray-800">{{ $user->name }}</div>
                        </div>
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
            </div>

            <!-- Messages -->
            <div id="chatBox" class="flex-1 p-4 overflow-y-auto space-y-2 bg-gray-50">
                @foreach ($messages as $message)
                    <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-xs px-4 py-2 rounded-2xl shadow
                            {{ $message->sender_id === auth()->id()
                                ? 'bg-blue-600 text-white'
                                : 'bg-gray-300 text-gray-800' }}">
                            {{ $message->message }}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Input -->
            <form wire:submit.prevent="submit" class="p-4 border-t bg-gray-100 flex items-center gap-2">
                <input
                    wire:model="newMessage"
                    type="text"
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none text-gray-800"
                    placeholder="Type your message..."
                />
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-full"
                >
                    Kirim
                </button>
            </form>
        </div>
    </div>
</div>