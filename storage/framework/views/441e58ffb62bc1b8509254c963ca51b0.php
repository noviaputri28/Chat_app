<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        
        <div class="mb-2">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Halo, <?php echo e(auth()->user()->name); ?>! 👋</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Selamat datang kembali.</p>
        </div>

        
        <div class="grid gap-4 md:grid-cols-3">
            
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5">
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Pengguna</div>
                <div class="text-3xl font-bold text-blue-600 mt-1"><?php echo e(\App\Models\User::count()); ?></div>
                <div class="text-xs text-gray-400 mt-1">Terdaftar di sistem</div>
            </div>

            
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5">
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Pesan</div>
                <div class="text-3xl font-bold text-green-600 mt-1"><?php echo e(\App\Models\ChatMessage::count()); ?></div>
                <div class="text-xs text-gray-400 mt-1">Semua percakapan</div>
            </div>

            
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5">
                <div class="text-sm text-gray-500 dark:text-gray-400">Pengguna Online</div>
                <div class="text-3xl font-bold text-yellow-500 mt-1">
                    <?php echo e(\App\Models\User::where('last_seen', '>=', now()->subMinutes(1))->count()); ?>

                </div>
                <div class="text-xs text-gray-400 mt-1">Aktif 1 menit terakhir</div>
            </div>
        </div>

        
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-5">
            <h2 class="text-md font-semibold text-gray-700 dark:text-white mb-3">Pesan Terakhir Saya</h2>
            <?php
                $lastMessages = \App\Models\ChatMessage::where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id())
                    ->latest()
                    ->take(5)
                    ->get();
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $lastMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="flex items-center gap-3 py-2 border-b border-gray-100 dark:border-neutral-700 last:border-0">
                    <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-300 font-bold text-sm">
                        <?php echo e(strtoupper(substr($msg->sender->name ?? '?', 0, 1))); ?>

                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-medium text-gray-700 dark:text-white"><?php echo e($msg->sender->name ?? 'Unknown'); ?></div>
                        <div class="text-xs text-gray-400 truncate"><?php echo e($msg->message); ?></div>
                    </div>
                    <div class="text-xs text-gray-400"><?php echo e($msg->created_at->diffForHumans()); ?></div>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <p class="text-sm text-gray-400">Belum ada pesan.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\chat-app\resources\views/dashboard.blade.php ENDPATH**/ ?>