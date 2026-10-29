<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-slate-100 leading-tight flex items-center gap-2">
                <span>📋</span> <?php echo e(__('Vaccination Records')); ?>

            </h2>
            <a href="<?php echo e(route('records.create')); ?>" class="px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-cyan-500/20 transition text-sm">
                + Add New Record
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-slate-950 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Flash Success Message -->
            <?php if(session('success')): ?>
                <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-lg">
                    <span>✓ <?php echo e(session('success')); ?></span>
                    <button onclick="this.parentElement.remove()" class="text-emerald-400 font-bold hover:text-emerald-200">&times;</button>
                </div>
            <?php endif; ?>

            <div class="bg-slate-900 border border-slate-800 shadow-2xl rounded-3xl overflow-hidden">
                <div class="p-6 border-b border-slate-800/80 flex justify-between items-center">
                    <h3 class="font-extrabold text-lg text-white">All Vaccination Logs</h3>
                    <span class="text-xs text-slate-400 bg-slate-800 px-3 py-1 rounded-full border border-slate-700 font-medium">
                        Total Records: <?php echo e($records->count()); ?>

                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-300">
                        <thead class="bg-slate-950 text-slate-400 text-xs uppercase font-extrabold border-b border-slate-800">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Child / Patient</th>
                                <th class="px-6 py-4">Vaccine Name</th>
                                <th class="px-6 py-4">Vaccination Date</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/60">
                            <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-slate-800/40 transition">
                                    <td class="px-6 py-4 font-mono text-xs text-slate-500">#<?php echo e($record->id); ?></td>
                                    
                                    <!-- Child Info -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 flex items-center justify-center font-bold text-xs">
                                                <?php echo e(strtoupper(substr($record->patient->name ?? 'P', 0, 1))); ?>

                                            </div>
                                            <div>
                                                <p class="font-bold text-white"><?php echo e($record->patient->name ?? 'N/A'); ?></p>
                                                <p class="text-[11px] text-slate-400">Guardian: <?php echo e($record->patient->guardian_name ?? 'N/A'); ?></p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Vaccine Info -->
                                    <td class="px-6 py-4">
                                        <span class="font-semibold text-slate-200">🧪 <?php echo e($record->vaccine->name ?? 'N/A'); ?></span>
                                    </td>

                                    <!-- Date -->
                                    <td class="px-6 py-4 text-slate-300 font-medium">
                                        📅 <?php echo e(\Carbon\Carbon::parse($record->vaccination_date)->format('M d, Y')); ?>

                                    </td>

                                    <!-- Status Badge -->
                                    <td class="px-6 py-4">
                                        <?php if(strtolower($record->status) === 'completed'): ?>
                                            <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 rounded-full text-xs font-bold">
                                                ✓ Completed
                                            </span>
                                        <?php elseif(strtolower($record->status) === 'pending'): ?>
                                            <span class="px-3 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/30 rounded-full text-xs font-bold">
                                                ⏳ Pending
                                            </span>
                                        <?php else: ?>
                                            <span class="px-3 py-1 bg-blue-500/10 text-blue-400 border border-blue-500/30 rounded-full text-xs font-bold">
                                                📌 <?php echo e(ucfirst($record->status)); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- Edit and Delete Actions -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- Edit Button -->
                                            <a href="<?php echo e(route('records.edit', $record->id)); ?>" class="px-3 py-1.5 bg-blue-500/10 hover:bg-blue-500/20 text-blue-400 border border-blue-500/30 rounded-xl text-xs font-bold transition flex items-center gap-1">
                                                ✏️ Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="<?php echo e(route('records.destroy', $record->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this vaccination record?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="px-3 py-1.5 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/30 rounded-xl text-xs font-bold transition flex items-center gap-1">
                                                    🗑️ Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-slate-500 text-sm">
                                        No vaccination records found. Click <a href="<?php echo e(route('records.create')); ?>" class="text-cyan-400 underline font-bold">Add New Record</a> to create one.
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
<?php endif; ?><?php /**PATH D:\vaccination system xzip txt\resources\views/records/index.blade.php ENDPATH**/ ?>