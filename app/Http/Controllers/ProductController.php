<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {      
            $data = Product::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($data) {
                    $actionButton = '
                   <a href="'.route('product.edit',$data->id).'" class="btn waves-effect waves-light btn-warning btn-sm">
                         Edit
                    </a>
                     <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="alertDelete(&quot;' . $data->id . '&quot;)">
                         Delete
                    </button>';
                    return $actionButton;
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('product.index');
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name
        ];

        Product::create($data);
        Alert::success('success','Insert Data Product Successfully');
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit',compact('product'));
    }


    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name
        ];

        Product::findOrFail($id)->update($data);
        Alert::success('success','Update Data Product Successfully');
        return redirect()->route('product.index');
    }

  
    public function destroy(Request $request)
    {
        $id = $request->id;

        $data = Product::findOrFail($id)->delete();
        
        if ($data) {
            return response()->json(['message' => 'Delete Product Successfully'], 200);
        } else {
            return response()->json(['message' => 'Error'], 200);
        }
    }
}
