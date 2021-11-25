<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller 
{
    public function excel()
    {
        return Excel::download(new ProductsExport, 'product-list.xlsx');
    }
}
