<?php

namespace App\Enums;

enum ListingTypesEnum: string
{
    case OPEN = 'Open Listing';
    case SELL = 'Sell Listing';
    case RENT = 'Rent Listing';
    case EXCLUSIVE = 'Exlusive Listing';
    case NET = 'Net Listing';
}
