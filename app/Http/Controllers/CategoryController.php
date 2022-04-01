<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Alert;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {      
            $data = Category::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($data) {
                    $actionButton = '
                   <a href="'.route('category.edit',$data->id).'" class="btn waves-effect waves-light btn-warning btn-sm">
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

        return view('category.index');
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name
        ];

        Category::create($data);
        Alert::success('success','Insert Data Category Successfully');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit',compact('category'));
    }


    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name
        ];

        Category::findOrFail($id)->update($data);
        Alert::success('success','Update Data Category Successfully');
        return redirect()->route('category.index');
    }

  
    public function destroy(Request $request)
    {
        $id = $request->id;

        $data = Category::findOrFail($id)->delete();
        
        if ($data) {
            return response()->json(['message' => 'Delete Category Successfully'], 200);
        } else {
            return response()->json(['message' => 'Error'], 200);
        }
    }
}
