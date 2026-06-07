<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Mengambil data dari view v_pendapatan_harian untuk hari ini
        $dataHariIni = DB::table('v_pendapatan_harian')
            ->where('tanggal', date('Y-m-d'))
            ->first();

        $totalTransaksi = $dataHariIni ? $dataHariIni->total_transaksi : 0;
        $totalPemasukan = $dataHariIni ? $dataHariIni->total_pemasukan : 0;

        return [
            Stat::make('Transaksi Hari Ini', $totalTransaksi)
                ->description('Jumlah reservasi lunas')
                ->icon('heroicon-o-shopping-cart'),
            
            Stat::make('Omzet Hari Ini', 'Rp ' . number_format($totalPemasukan, 0, ',', '.'))
                ->description('Total pendapatan kotor')
                ->icon('heroicon-o-currency-dollar'),
        ];
    }
}