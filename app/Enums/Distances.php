<?php


namespace App\Enums;


enum Distances: string {
    case Mile = '1 Mile';
    case Fivek = '5k';
    case Tenk = '10k';
    case HalfMarathon = 'Half Marathon';
    case Marathon = 'Marathon';
    case Ultra = 'Ultra Marathon';
}
