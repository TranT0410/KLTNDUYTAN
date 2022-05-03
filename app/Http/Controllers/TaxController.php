<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Requests\TaxRequest;

class TaxController extends Controller
{
    public function index()
    {
        $taxation = Tax::paginate(config('constants.paginate_10'));

        return view('admin.tax.list', compact('taxation'));
    }

    public function create()
    {
        return view('admin.tax.create');
    }

    public function store(TaxRequest $request)
    {
        $data = $request->all();
        Tax::create($data);
        return redirect(route('admin.tax.list'))->with('status', 'Thêm mới thuế thành công');
    }

    public function update($id)
    {
        $tax = Tax::find($id);
        return view('admin.tax.update', compact('tax'));
    }

    public function edit(TaxRequest $request, $id)
    {
        $tax = Tax::find($id);
        $data = $request->all();
        $tax->update($data);

        return redirect(route('admin.tax.list'))->with('status', 'Cập nhật thuế thành công');
    }
    public function delete($id)
    {
        $tax = Tax::find($id);
        $tax->delete($id);

        return redirect(route('admin.tax.list'))->with('status', 'Xóa thuế thành công');
    }
}