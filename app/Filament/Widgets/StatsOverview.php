<?php

namespace App\Filament\Widgets;
use App\Models\User;
use App\Models\Product;
use App\Models\Branch;
use App\Models\City;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('User count', User::count())
            ->description('32k increase')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),

            Stat::make('Product count', Product::count())
            ->description('32k increase')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),

            Stat::make('Branch count', Branch::count())
            ->description('32k increase')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),

            Stat::make('City count', City::count())
            ->description('32k increase')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),

            Stat::make('Category count', Category::count())
            ->description('32k increase')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];
    }

    // protected function getCards(): array
    // {
    //     return [
    //         Card::make('test', 20)
    //     ];
    // }
}
