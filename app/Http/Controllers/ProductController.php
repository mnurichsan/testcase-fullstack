<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {      
            $data = Product::with('category')->get();
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
                ->editColumn('image', function ($data) {
                    return '<img src="'.asset($data->image).'" class="img-fluid" width="100px">';
                })
                ->editColumn('category', function ($data) {
                    return $data->category ? '<span class="badge bg-success">'.$data->category->name.'</span>' : '<span class="badge bg-danger">Category telah dihapus</span>';
                })
                ->editColumn('price', function ($data) {
                   return rupiahFormat($data->price);
                })
                ->editColumn('description', function ($data) {
                    return Str::limit($data->description, 50);
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('product.index');
    }

    public function create()
    {
        $category = Category::all();
        return view('product.create',compact('category'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required|unique:products',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image'  => 'required|max:2046'
        ]);


        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'description' => $request->description
        ];
      

        if($request->has('image')){
            $upload = uploads($request->image,'product');
            $data['image'] = $upload['image'];
        }

        Product::create($data);
        Alert::success('success','Insert Data Product Successfully');
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();

        return view('product.edit',compact('product','category'));
    }


    public function update(Request $request,$id)
    {
        
        $this->validate($request,[
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);


        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'description' => $request->description
        ];
      

        if($request->has('image')){
            $upload = uploads($request->image,'product');
            $data['image'] = $upload['image'];
        }

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
