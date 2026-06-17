<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $hariIni = date('Y-m-d');

        $totalTransaksi = DB::table('reservasi')
            ->whereDate('tanggal', $hariIni)
            ->count();

        $totalPemasukan = DB::table('reservasi')
            ->join('detail_reservasi', 'reservasi.id', '=', 'detail_reservasi.reservasi_id')
            ->whereDate('reservasi.tanggal', $hariIni)
            ->sum('detail_reservasi.harga_saat_ini');

        return [
            Stat::make('Transaksi Hari Ini', $totalTransaksi)
                ->description('Jumlah reservasi masuk hari ini')
                ->icon('heroicon-o-shopping-cart'),
            
            Stat::make('Omzet Hari Ini', 'Rp ' . number_format($totalPemasukan, 0, ',', '.'))
                ->description('Total pendapatan kotor hari ini')
                ->icon('heroicon-o-currency-dollar'),
        ];
    }
}