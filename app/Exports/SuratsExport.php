<?php

namespace App\Exports;

use App\Models\Surat;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratsExport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        $surats = Surat::select('no_surat', 'tipe_surat', 'perihal', 'pengirim', 'penerima', 'pengajuan', 'tanggal')->get();
        $i = 0;
        foreach ($surats as $surat) {
            if ($surat->tipe_surat) {
                $surats[$i]['tipe_surat'] = 'Masuk';
            } else {
                $surats[$i]['tipe_surat'] = 'Keluar';
            }

            if ($surat->pengajuan) {
                $surats[$i]['pengajuan'] = 'Iya';
            } else {
                $surats[$i]['pengajuan'] = 'Tidak';
            }
            $i++;
        };
        return $surats;
    }
}
