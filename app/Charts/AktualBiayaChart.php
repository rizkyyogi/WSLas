<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\proyek;
use App\Models\AktualBiaya;
use Carbon\Carbon;

class AktualBiayaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($proyekId)
    {
        $aktualBiaya = AktualBiaya::where('proyek_id', $proyekId)->get();

        $dataAktual = [];
        $dataBiaya = [];

        foreach ($aktualBiaya as $item) {
            $dataAktual[] = $item->aktual;
            $dataBiaya[] = $item->biaya;
        }
            
        $chart = $this->chart->lineChart()
            ->setTitle('DATA PROGRES PROYEK')
            ->setSubtitle('Grafik Aktual dan Biaya Proyek')
            ->addData('Aktual', $dataAktual)
            ->addData('Biaya', $dataBiaya)
            ->setXAxis($this->getAxisLabels($aktualBiaya))
            ->setGrid()
            ->setColors(['#FFC107', '#303F9F'])
            ->setMarkers(['#FF5722', '#E040FB'], 7, 10);
            
        return $chart;
    }
    private function getAxisLabels($aktualBiaya)
    {
        $labels = [];
        foreach ($aktualBiaya as $index => $item) {
            $labels[] = $index + 1;
        }
        return $labels;
    }


    // private function getAxisLabels($aktualBiaya)
    // {
    //     $labels = [];
    //     foreach ($aktualBiaya as $item) {
    //         $tanggal = Carbon::parse($item->tanggal); 
    //         $labels[] = $tanggal->format('d M'); 
    //     }
    //     return $labels;
    // }
        
}
