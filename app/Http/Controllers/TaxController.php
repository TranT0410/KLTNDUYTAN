<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $taxation = Tax::paginate(config('constants.paginate_10'));

        return view('admin.tax.list', compact('taxation'));
    }
}