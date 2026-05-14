<div>
    <div class="relative mb-6 w-full">
        <?php if (isset($component)) { $__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::heading','data' => ['size' => 'xl','level' => '1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'xl','level' => '1']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Chat <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9)): ?>
<?php $attributes = $__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9; ?>
<?php unset($__attributesOriginale0fd5b6a0986beffac17a0a103dfd7b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9)): ?>
<?php $component = $__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9; ?>
<?php unset($__componentOriginale0fd5b6a0986beffac17a0a103dfd7b9); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal43e8c568bbb8b06b9124aad3ccf4ec97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal43e8c568bbb8b06b9124aad3ccf4ec97 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::subheading','data' => ['size' => 'lg','class' => 'mb-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::subheading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'lg','class' => 'mb-6']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>
Manage your Text and Word settings <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal43e8c568bbb8b06b9124aad3ccf4ec97)): ?>
<?php $attributes = $__attributesOriginal43e8c568bbb8b06b9124aad3ccf4ec97; ?>
<?php unset($__attributesOriginal43e8c568bbb8b06b9124aad3ccf4ec97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal43e8c568bbb8b06b9124aad3ccf4ec97)): ?>
<?php $component = $__componentOriginal43e8c568bbb8b06b9124aad3ccf4ec97; ?>
<?php unset($__componentOriginal43e8c568bbb8b06b9124aad3ccf4ec97); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalc481942d30cc0ab06077963cf20a45e8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc481942d30cc0ab06077963cf20a45e8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::separator','data' => ['variant' => 'subtle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'subtle']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc481942d30cc0ab06077963cf20a45e8)): ?>
<?php $attributes = $__attributesOriginalc481942d30cc0ab06077963cf20a45e8; ?>
<?php unset($__attributesOriginalc481942d30cc0ab06077963cf20a45e8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc481942d30cc0ab06077963cf20a45e8)): ?>
<?php $component = $__componentOriginalc481942d30cc0ab06077963cf20a45e8; ?>
<?php unset($__componentOriginalc481942d30cc0ab06077963cf20a45e8); ?>
<?php endif; ?>
    </div>

    <div class="flex h-[550px] text-sm border rounded-xl shadow overflow-hidden bg-white">

        <!-- Left: User List -->
        <div class="w-1/4 border-r bg-gray-50">
            <div class="p-4 font-bold text-gray-700 border-b">
                Users
            </div>
            <div class="divide-y">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div wire:click="selectUser(<?php echo e($user->id); ?>)" class="p-3 cursor-pointer hover:bg-blue-100 transition
                    <?php echo e($selectedUser && $selectedUser->id === $user->id ? 'bg-blue-200' : ''); ?>">
                        <div class="flex items-center gap-2">
                            
                            <span class="w-2 h-2 rounded-full <?php echo e(in_array($user->id, $onlineUsers) ? 'bg-green-500' : 'bg-gray-300'); ?>"></span>
                            <div class="text-gray-800"><?php echo e($user->name); ?></div>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        <!-- Right: Chat Section -->
        <div class="w-3/4 flex flex-col">
            <!-- Header -->
            <div class="p-4 border-b bg-gray-50">
                <div class="text-lg font-semibold text-gray-800">
                    <?php echo e($selectedUser->name); ?>

                </div>
            </div>

            <!-- Messages -->
            <div class="flex-1 p-4 overflow-y-auto space-y-2 bg-gray-50">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="flex <?php echo e($message->sender_id === auth()->id() ? 'justify-end' : 'justify-start'); ?>">
                        <div class="max-w-xs px-4 py-2 rounded-2xl shadow <?php echo e($message->sender_id === auth()->id() ? 'bg-blue-600 text-red-100' : 'bg-gray-300 text-gray-800'); ?>">
                            <?php echo e($message->message); ?>

                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <form wire:submit.prevent="submit" class="p-4 border-t bg-gray-100 flex items-center gap-2">
                <input
                    wire:model.live="newMessage"
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
    document.addEventListener('livewire:initialized', () => {

        // ✅ Presence channel — HANYA untuk online status (jangan listen event disini)
        window.Echo.join('chat')
            .here((users) => {
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('onlineUsers', users.map(u => u.id));
            })
            .joining((user) => {
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('userJoined', user.id);
            })
            .leaving((user) => {
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('userLeft', user.id);
            });

        // ✅ Private channel — untuk TERIMA pesan realtime
        window.Echo.private('chat.<?php echo e(auth()->id()); ?>')
            .listen('MessageSent', (e) => {
                console.log('pesan masuk:', e);
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('receiveMessage', e);
            });

            Livewire.on('scroll-bottom', () => {
                const container = document.querySelector('.overflow-y-auto');
                if (container) container.scrollTop = container.scrollHeight;
            });

    });
    </script>
</div><?php /**PATH C:\laragon\www\chat-app\resources\views/livewire/chat.blade.php ENDPATH**/ ?>