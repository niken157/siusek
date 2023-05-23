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
        return ["No","NIS","Nama Peserta","Kelas","Jenis Kelamin","Agama","created_at","updated_at"];
    }
}
