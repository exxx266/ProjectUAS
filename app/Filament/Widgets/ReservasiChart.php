<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ReservasiChart extends ChartWidget
{
    // PERBAIKAN: Hapus kata 'static' agar tidak bentrok dengan bawaan Filament
    protected ?string $heading = 'Tren Reservasi Bulanan';

    // PERBAIKAN: Hapus kata 'static' juga di sini
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Mengambil data riil jumlah reservasi per bulan dari database
        $dataMasingBulan = DB::table('reservasi')
            ->select(DB::raw('MONTH(tanggal) as bulan'), DB::raw('count(*) as total'))
            ->whereYear('tanggal', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Menyusun data agar pas 12 bulan (jika bulan kosong, otomatis diisi angka 0)
        $datasetData = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $datasetData[] = $dataMasingBulan[$bulan] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Reservasi Masuk',
                    'data' => $datasetData,
                    // Menggunakan aksen warna emas/kuning biar mewah serasi dengan tema web kamu
                    'borderColor' => '#d97706', 
                    'backgroundColor' => 'rgba(217, 119, 6, 0.1)',
                    'fill' => 'start',
                    'tension' => 0.3, // Membuat lengkungan garis grafik jadi smooth
                ],
            ],
            // Label horizontal di bawah grafik
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        ];
    }

    protected function getType(): string
    {
        return 'line'; 
    }
}