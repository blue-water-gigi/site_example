<!-- HEADER: стеклянная навигация с логотипом, меню и кнопкой -->
<header class="sticky top-0 z-50 backdrop-blur-xl bg-black/30 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- логотип с градиентом -->
        <a href="/"
            class="text-2xl font-bold bg-gradient-to-r from-indigo-300 via-purple-300 to-pink-300 text-transparent bg-clip-text hover:scale-105 transition">
            ✦ nebula
        </a>

        <nav class="hidden md:flex space-x-8 text-sm font-medium">
            <a href="/"
                class="<?= urlIs('/') ? 'text-gray-100' : 'text-gray-700' ?> hover:text-white hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.7)] transition">Main</a>
            <a href="/about"
                class="<?= urlIs('/about') ? 'text-gray-100' : 'text-gray-700' ?> hover:text-white hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.7)] transition">About</a>
            <a href="/testing"
                class="<?= urlIs('/testing') ? 'text-gray-100' : 'text-gray-700' ?> hover:text-white hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.7)] transition">Testing</a>

            <?php if ($_SESSION['user'] ?? false) { ?>
                <a href="/notes"
                    class="<?= urlIs('/notes') ? 'text-gray-100' : 'text-gray-700' ?> hover:text-white hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.7)] transition">Notes</a>
            <?php } ?>
        </nav>

        <?php if ($_SESSION['user'] ?? false) { ?>
            <!-- Если пользователь зарегистрирован - показываем аватар -->
            <div class="hidden md:block relative group">
                <!-- Кнопка-аватар -->
                <button
                    class="flex items-center space-x-2 px-2 py-1 rounded-full border border-purple-500/30 bg-purple-500/5 hover:bg-purple-500/10 hover:border-purple-400/50 transition-all duration-300 group">
                    <!-- Аватар с иконкой пользователя -->
                    <div
                        class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center text-white text-sm font-medium shadow-lg shadow-purple-900/30">
                        <?= strtoupper($_SESSION['user']['email'][0]) ?>
                    </div>
                    <!-- Имя пользователя (опционально) -->
                    <span
                        class="text-sm text-gray-300 pr-2 group-hover:text-white transition"><?= $_SESSION['user']['email'] ?></span>
                    <!-- Маленькая стрелочка для индикации меню -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 text-gray-400 group-hover:text-purple-300 transition" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Выпадающее меню при наведении/клике (появляется сверху) -->
                <div
                    class="absolute right-0 mt-2 w-48 py-2 bg-black/90 backdrop-blur-xl border border-white/10 rounded-xl shadow-2xl shadow-purple-900/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-500/10 hover:text-white hover:pl-6 transition-all">Profile</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-purple-500/10 hover:text-white hover:pl-6 transition-all">Settings</a>
                    <div class="border-t border-white/10 my-1"></div>
                    <form action="/sessions" method="POST" class="w-full">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit"
                            class="block w-full px-4 py-2 text-sm text-left text-red-400 hover:bg-red-500/10 hover:text-red-300 hover:pl-6 transition-all">
                            Log out
                        </button>
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <div
                class="hidden md:flex items-center gap-3 px-4 py-2 rounded-2xl backdrop-blur-sm transition-all duration-300">
                <a href="/register">
                    <button
                        class="hidden md:block px-5 py-2 text-sm font-medium rounded-full border border-purple-500/50 text-purple-200 bg-purple-500/10 hover:bg-purple-500/20 hover:border-purple-400 hover:shadow-[0_0_15px_rgba(168,85,247,0.4)] transition duration-300">
                        Register
                    </button>
                </a>
                <a href="/login">
                    <button
                        class="hidden md:block px-5 py-2 text-sm font-medium rounded-full border border-purple-500/50 text-purple-200 bg-purple-500/10 hover:bg-purple-500/20 hover:border-purple-400 hover:shadow-[0_0_15px_rgba(168,85,247,0.4)] transition duration-300">
                        Log in
                    </button>
                </a>
            </div>
        <?php } ?>

    </div>
</header>