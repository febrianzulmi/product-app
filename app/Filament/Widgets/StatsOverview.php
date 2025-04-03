<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2 ;
    protected function getWidgets(): array
    {
        return [
            StatsOverview::class, // Menampilkan widget statistik
        ];
    }
    protected function getCards(): array
    {
        return [
            Card::make('Total Produk', Product::count())
                ->icon('heroicon-o-shopping-cart')
                ->description('Jumlah seluruh produk')
                ->color('success'),
   

            Card::make('Produk Aktif', Product::where('status', 'aktif')->count())
                ->description('Produk yang saat ini aktif')
                ->color('primary'),

            Card::make('Produk Nonaktif', Product::where('status', 'nonaktif')->count())
                ->description('Produk yang dinonaktifkan')
                ->color('danger'),

            Card::make('Produk Baru', Product::whereMonth('created_at', now()->month)->count())
                ->description('Bulan ini')
                ->chart([10, 20, 30, 25, 40]) // Grafik mini
                ->color('info') 
        ];

    }

}
