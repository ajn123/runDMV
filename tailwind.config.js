/** @type {import('tailwindcss').Config} */
import preset from './vendor/filament/support/tailwind.config.preset'
export default {
    presets: [preset],
  content: [
      './app/Filament/**/*.php',
      './resources/views/filament/**/*.blade.php',
      './vendor/filament/**/*.blade.php',
    './pages/**/*.{html,js}',
    './components/**/*.{html,js}',
      './Livewire/**/*.{php,js}',
      './app/Livewire/**/*.{php,js}',
      './Resources/**/*.{php,js,html}',
      "./node_modules/flowbite/**/*.js",
      './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('flowbite/plugin')
  ]
}

