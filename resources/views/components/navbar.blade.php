<div class="w-full bg-gray-100 p-3 pb-2 text-balance top-0 flex flex-col sm:flex-row">
    <a class="nav-links" href="/">runDMV</a>
    <a class="{{ Route::is('clubs') ? 'bg-green-400': ''}} nav-links" href="/">
        Clubs
    </a>
    <a class="{{ Route::is('races') ? 'bg-green-400': ''}} nav-links" href="/races">
        Races
    </a>
    <a class="{{ Route::is('about') ? 'bg-green-400': ''}} nav-links" href="/about">
        About
    </a>
</div>
