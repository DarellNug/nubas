<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class OperationsOverview extends Widget
{
    protected string $view = 'filament.widgets.operations-overview';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';
}
