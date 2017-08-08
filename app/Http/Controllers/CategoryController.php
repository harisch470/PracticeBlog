<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    /**
     * CategoryController constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $categories=Category::all();
        return View('category.create', compact('categories'));
    }
    public function createCategory(CategoryRequest $request)
    {
        $data = $request->all();
        if($data){
        Category::saveCategory($data);
        }
        return redirect()->route('category.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show()
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $category=Category::find($id);
        return view('category.edit',compact('category','categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_cat(Request $request, $id)
    {
        $data = $request->all();
        $data['id']=$id;
        $this->category->saveCategory($data);
        return redirect()->route('categories.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_cat($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->route('category.create');
    }
}
