<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductsExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select("id", "department", "public_price", "dealers", "description", "existence_matriz", "existence_virrey", "existence_general", "pyscom_price", "model", "sat_key", "sat_description", "price_2x1", "gain_2x1", "normal_gain")->get();
    }

    public function headings(): array
    {
        return ["Sku", "Departamento", "Precio público", 'Precio distribuidor', 'Descripción', 'Existencias en Matríz', 'Existencias en Virrey', 'Existencias generales', 'Precio pyscom', 'Modelo', 'Clave SAT', 'Descripción SAT', 'Precios 2x1', 'Ganancia 2x1', 'Ganancia normal'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

}
