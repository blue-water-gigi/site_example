<!-- HEADER: стеклянная навигация с логотипом, меню и кнопкой -->
<header class="sticky top-0 z-50 backdrop-blur-xl bg-black/30 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- логотип с градиентом -->
        <a href="/"
           class="text-2xl font-bold bg-gradient-to-r from-indigo-300 via-purple-300 to-pink-300 text-transparent bg-clip-text hover:scale-105 transition">
            ✦ nebula
        </a>

        <!-- десктопное меню -->
        <nav class="hidden md:flex space-x-8 text-sm font-medium">
            <a href="/"
               class="<?= urlIs('/') ? 'text-gray-100' : 'text-gray-700' ?> hover:text-white hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.7)] transition">Main</a>
            <a href="/about"
               class="<?= urlIs('/about') ? 'text-gray-100' : 'text-gray-700' ?> hover:text-white hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.7)] transition">About</a>
            <a href="/testing"
               class="<?= urlIs('/testing') ? 'text-gray-100' : 'text-gray-700' ?> hover:text-white hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.7)] transition">Testing</a>
            <a href="/notes"
               class="<?= urlIs('/notes') ? 'text-gray-100' : 'text-gray-700' ?> hover:text-white hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.7)] transition">Notes</a>
        </nav>

        <!-- кнопка входа с неон-эффектом -->
        <button class="hidden md:block px-5 py-2 text-sm font-medium rounded-full border border-purple-500/50 text-purple-200 bg-purple-500/10 hover:bg-purple-500/20 hover:border-purple-400 hover:shadow-[0_0_15px_rgba(168,85,247,0.4)] transition duration-300">
            Войти
        </button>

    </div>
</header>