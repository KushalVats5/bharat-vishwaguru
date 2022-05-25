<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function manageCategory(){
        $categories = Category::where(['parent_id'=>0])->get();
        $allcategories = Category::all();
        return view('admin.category.categoryTreeview', ['categories'=>$categories, 'allCategories'=>$allcategories]);
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Category::create($input);
        return back()->with('success', 'New Category added successfully.');

    }
}
