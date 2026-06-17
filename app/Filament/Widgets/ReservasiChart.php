<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ReservasiChart extends ChartWidget
{
    protected ?string $heading = 'Tren Reservasi Bulanan';

    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $dataMasingBulan = DB::table('reservasi')
            ->select(DB::raw('MONTH(tanggal) as bulan'), DB::raw('count(*) as total'))
            ->whereYear('tanggal', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        $datasetData = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $datasetData[] = $dataMasingBulan[$bulan] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Reservasi Masuk',
                    'data' => $datasetData,
                    'borderColor' => '#d97706', 
                    'backgroundColor' => 'rgba(217, 119, 6, 0.1)',
                    'fill' => 'start',
                    'tension' => 0.3, 
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        ];
    }

    protected function getType(): string
    {
        return 'line'; 
    }
}