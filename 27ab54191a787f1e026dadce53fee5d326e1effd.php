<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, []); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="min-h-screen bg-slate-950 flex flex-col justify-center items-center py-6 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8 bg-slate-900 border border-slate-800 p-8 rounded-2xl shadow-2xl">
            
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-cyan-400 flex justify-center items-center gap-2">
                    💉 VaccineCare
                </h1>
                <h2 class="mt-2 text-xl font-bold text-white">Welcome Back</h2>
                <p class="text-xs text-slate-400 mt-1">Sign in to manage vaccines and patient records</p>
            </div>

            <!-- Session Status Message -->
            <?php if(session('status')): ?>
                <div class="mb-4 text-sm font-medium text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 p-3 rounded-xl">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-6">
                <?php echo csrf_field(); ?>

                <!-- Email Address -->
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-1">Email Address</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus 
                           class="w-full px-4 py-2.5 bg-slate-800 border border-slate-700 rounded-xl text-white focus:outline-none focus:border-cyan-500">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-xs text-red-400 mt-1 block"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-slate-300 mb-1">Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-2.5 bg-slate-800 border border-slate-700 rounded-xl text-white focus:outline-none focus:border-cyan-500">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-xs text-red-400 mt-1 block"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between text-sm">
                    <label class="inline-flex items-center text-slate-400">
                        <input type="checkbox" name="remember" class="rounded bg-slate-800 border-slate-700 text-cyan-500 focus:ring-cyan-500">
                        <span class="ms-2">Remember me</span>
                    </label>

                    <?php if(Route::has('password.request')): ?>
                        <a class="text-cyan-400 hover:underline" href="<?php echo e(route('password.request')); ?>">
                            Forgot password?
                        </a>
                    <?php endif; ?>
                </div>

                <div>
                    <button type="submit" class="w-full py-3 bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold rounded-xl shadow-lg shadow-cyan-500/20 transition">
                        Log In
                    </button>
                </div>
            </form>

            <p class="text-center text-xs text-slate-400">
                Don't have an account? 
                <a href="<?php echo e(route('register')); ?>" class="text-cyan-400 font-semibold hover:underline">Register here</a>
            </p>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?><?php /**PATH D:\vaccination system xzip txt\resources\views/auth/login.blade.php ENDPATH**/ ?>