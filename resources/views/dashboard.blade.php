<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        {{-- Greeting --}}
        <div class="mb-2">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Halo, {{ auth()->user()->name }}! 👋</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Selamat datang kembali.</p>
        </div>

        {{-- Stats Cards --}}
        <div class="grid gap-4 md:grid-cols-3">
            {{-- Total Users --}}
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5">
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Pengguna</div>
                <div class="text-3xl font-bold text-blue-600 mt-1">{{ \App\Models\User::count() }}</div>
                <div class="text-xs text-gray-400 mt-1">Terdaftar di sistem</div>
            </div>

            {{-- Total Messages --}}
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5">
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Pesan</div>
                <div class="text-3xl font-bold text-green-600 mt-1">{{ \App\Models\ChatMessage::count() }}</div>
                <div class="text-xs text-gray-400 mt-1">Semua percakapan</div>
            </div>

            {{-- Online Users --}}
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5">
                <div class="text-sm text-gray-500 dark:text-gray-400">Pengguna Online</div>
                <div class="text-3xl font-bold text-yellow-500 mt-1">
                    {{ \App\Models\User::where('last_seen', '>=', now()->subMinutes(1))->count() }}
                </div>
                <div class="text-xs text-gray-400 mt-1">Aktif 1 menit terakhir</div>
            </div>
        </div>

        {{-- Pesan Terakhir --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5">
            <h2 class="text-md font-semibold text-gray-700 dark:text-white mb-3">Pesan Terakhir Saya</h2>
            @php
                $lastMessages = \App\Models\ChatMessage::where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id())
                    ->latest()
                    ->take(5)
                    ->get();
            @endphp

            @forelse ($lastMessages as $msg)
                <div class="flex items-center gap-3 py-2 border-b border-gray-100 dark:border-neutral-700 last:border-0">
                    <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-300 font-bold text-sm">
                        {{ strtoupper(substr($msg->sender->name ?? '?', 0, 1)) }}
                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-medium text-gray-700 dark:text-white">{{ $msg->sender->name ?? 'Unknown' }}</div>
                        <div class="text-xs text-gray-400 truncate">{{ $msg->message }}</div>
                    </div>
                    <div class="text-xs text-gray-400">{{ $msg->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <p class="text-sm text-gray-400">Belum ada pesan.</p>
            @endforelse
        </div>

    </div>
</x-layouts.app>
