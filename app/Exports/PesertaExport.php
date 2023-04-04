<?php

namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Peserta::all();
    }
    public function headings(): array
    {
        return ["id_peserta","nis","nama_peserta","kelas","jenis_kelamin","agama","created_at","updated_at"];
    }
}
