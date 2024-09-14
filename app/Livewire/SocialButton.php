<?php

namespace App\Livewire;

use Livewire\Component;

class SocialButton extends Component
{
    public $url;

    public $website;

    public $color;

    public function render()
    {
        return view('livewire.social-button');
    }
}
