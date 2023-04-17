<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $usa = Country::where('country_code', 'USA')->withCount('employees')->first();
        $jor = Country::where('country_code', 'JOR')->withCount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($usa->name.' Employees',$usa->employees->count()),
            Card::make($jor->name.' Employees',$jor->employees->count()),

        ];
    }
}
