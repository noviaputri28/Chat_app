import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

function initEcho() {
    // Jangan buat instance baru jika sudah ada dan masih terkoneksi
    if (window.Echo && window.Echo.connector && window.Echo.connector.pusher) {
        const state = window.Echo.connector.pusher.connection.state;
        if (state === 'connected' || state === 'connecting') {
            return;
        }
    }

    window.Echo = new Echo({
        broadcaster:       'reverb',
        key:               import.meta.env.VITE_REVERB_APP_KEY,
        wsHost:            import.meta.env.VITE_REVERB_HOST,
        wsPort:            import.meta.env.VITE_REVERB_PORT ?? 8080,
        wssPort:           import.meta.env.VITE_REVERB_PORT ?? 8080,
        forceTLS:          false,
        enabledTransports: ['ws'],
    });
}

// Init pertama kali saat halaman load
initEcho();

// FIX: wire:navigate adalah SPA — setelah navigasi, Livewire re-init
// tapi <script> di layout tidak dijalankan ulang, sehingga Echo perlu
// dipastikan masih aktif setiap kali Livewire selesai navigasi.
document.addEventListener('livewire:navigated', () => {
    initEcho();
});