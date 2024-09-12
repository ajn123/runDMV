/** @type {import('tailwindcss').Config} */
import preset from './vendor/filament/support/tailwind.config.preset'
export default {
    presets: [preset],
    mode: 'jit',
  content: [
    './pages/**/*.{html,js}',
    './components/**/*.{html,js}',
      './Livewire/**/*.{php,js}',
      './Resources/**/*.{php,js,html}',
      "./node_modules/flowbite/**/*.js",
      './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/forms'),
      require('flowbite/plugin')
  ]
}

