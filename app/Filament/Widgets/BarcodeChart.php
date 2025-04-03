<?php

namespace App\Filament\Widgets;

use App\Models\Barcode;
use Filament\Widgets\LineChartWidget;

class BarcodeChart extends LineChartWidget
{
    protected static ?string $heading = 'Grafik Data Barcode';
    protected static ?int $sort = 0;

    protected function getData(): array
    {
        $data = Barcode::latest()->take(20)->get()->reverse();

        return [
            'datasets' => [
                [
                    'label' => 'Nilai Barcode',
                    'data' => $data->pluck('value')->toArray(),
                    'borderColor' => '#4F46E5',
                ],
            ],
            'labels' => $data->pluck('recorded_at')->toArray(),
        ];
    }
}
