<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\User;
use App\Http\Requests\SupplierRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(config('constants.paginate_10'));

        return view('admin.supplier.list', compact('suppliers'));
    }

    public function create()
    {
        $users = User::where('role', config('constants.role_supplier'))->get();

        return view('admin.supplier.create', compact('users'));
    }

    public function store(SupplierRequest $request)
    {
        $data = $request->all();
        Supplier::create($data);

        return redirect(route('admin.supplier.list'))->with('status', 'Insert supplier successfully');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $users = User::all();

        return view('admin.supplier.update', compact('supplier', 'users'));
    }

    public function update(SupplierRequest $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->update($request->all());

        return redirect(route('admin.supplier.list'))->with('status', 'Update supplier successfully');
    }

    public function delete($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect(route('admin.supplier.list'))->with('status', 'Delete supplier successfully');
    }

    public function view($id)
    {
        $supplier = Supplier::find($id);

        return view('admin.supplier.view', compact('supplier'));
    }
}