<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Distances: string implements HasLabel
{
    case Mile = '1 Mile';
    case Fivek = '5k';
    case Tenk = '10k';
    case HalfMarathon = 'Half Marathon';
    case Marathon = 'Marathon';
    case Ultra = 'Ultra Marathon';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Mile => '1 Mile',
            self::Fivek => '5 K',
            self::Tenk => '10 K',
            self::HalfMarathon => 'Half Marathon',
            self::Marathon => 'Full Marathon',
            self::Ultra => 'Ultra Marathon'
        };
    }
}
