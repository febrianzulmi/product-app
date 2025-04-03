<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\BarChartWidget;

class ProductStats extends BarChartWidget
{
    protected static ?string $heading = 'Statistik Produk';
    protected static ?int $sort = 1;
    protected function getData(): array
    {
        $products = Product::selectRaw('COUNT(*) as count, DATE(created_at) as date')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produk',
                    'data' => $products->pluck('count'),
                ],
            ],
            'labels' => $products->pluck('date')->toArray(),
        ];
    }
}
