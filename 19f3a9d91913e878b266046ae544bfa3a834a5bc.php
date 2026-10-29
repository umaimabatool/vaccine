<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight flex items-center gap-2">
            <span>💉</span> <?php echo e(__('Vaccines List')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 shadow-xl">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-slate-100">Available Vaccines</h3>
                    <a href="<?php echo e(route('vaccines.create')); ?>" class="bg-cyan-500 hover:bg-cyan-600 text-slate-950 font-bold px-4 py-2 rounded-lg shadow-md transition-all duration-200 flex items-center gap-2 text-sm">
                        <span>+</span> Add New Vaccine
                    </a>
                </div>

                <?php if(session('success')): ?>
                    <div class="mb-4 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-lg text-sm">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-300">
                        <thead class="bg-slate-950/50 text-cyan-400 uppercase text-xs tracking-wider border-b border-slate-800">
                            <tr>
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3">Doses Required</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/60">
                            <?php $__empty_1 = true; $__currentLoopData = $vaccines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $vaccine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-slate-800/40 transition">
                                    <td class="px-4 py-3 text-slate-400"><?php echo e($index + 1); ?></td>
                                    <td class="px-4 py-3 font-semibold text-white"><?php echo e($vaccine->name); ?></td>
                                    <td class="px-4 py-3 text-slate-400"><?php echo e($vaccine->dose_details ?? 'N/A'); ?></td>
                                    <td class="px-4 py-3 text-slate-300"><?php echo e($vaccine->type ?? 'Standard'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="px-4 py-8 text-center text-slate-500 italic">
                                        No vaccines recorded yet. Click "+ Add New Vaccine" above.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\vaccination system xzip txt\resources\views/vaccines/index.blade.php ENDPATH**/ ?>