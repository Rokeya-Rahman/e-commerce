<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function addCategory() {
        return view('admin.category.add-category');
    }

    public function saveCategory(Request $request) {
        Category::saveCategoryValidation($request);
        Category::saveCategoryInformation($request);
        return redirect('/category/add-category')->with('message', 'Category information save successfully');
    }

    public function manageCategory() {
        return view('admin.category.manage-category');
    }

    public function viewDetails($id) {
        $category = Category::find($id);
        return view('admin.category.view-details', ['category' => $category]);
    }

    public function unpublishedCategory(Request $request) {
        Category::unpublishedCategoryInformation($request);
        return redirect('/category/manage-category')->with('message', 'Category information unpublished successfully');
    }

    public function publishedCategory(Request $request) {
        $category = Category::find($request->id);
            if ($category->level_id == null) {
                $category->publication_status = 1;
                $category->save();
                $levels = Category::where('level_id', $request->id)
                                    ->where('publication_status', 2)
                                    ->get();
                foreach ($levels as $level) {
                $level->publication_status = 1;
                $level->save();
                }
                return redirect('/category/manage-category')->with('message', 'Category information published successfully');
            } else {
                $mainCategory = Category::where('id', $category->level_id)->first();
                if ($mainCategory->publication_status == '1') {
                    $category->publication_status = 1;
                    $category->save();
                    return redirect('/category/manage-category')->with('message', 'Category information published successfully');
                } else {
                    return redirect('/category/manage-category')->with('message1', 'Sorry this category can not being published as the main category of this category level is unpublished');
                }
            }

    }

    public function editCategory($id) {
        $category = Category::find($id);
        $mainCategory = Category::where('id', $category->level_id)->first();
//        return view('admin.category.edit-category', ['category' => $category]);

        if($category->level_id == null) {
            return view('admin.category.edit-category', ['category' => $category, 'mainCategory' => $mainCategory]);
        } else {
            if ($mainCategory->publication_status == '1') {
                return view('admin.category.edit-category', ['category' => $category, 'mainCategory' => $mainCategory]);
            } else {
//                Session::put('message2', 'Sorry publication status can not be selected, as the main category of this category level is unpublished');
                Session::flash('message2', 'Sorry publication status can not be selected, as the main category of this category level is unpublished');
                return view('admin.category.edit-category', ['category' => $category, 'mainCategory' => $mainCategory]);
            }
        }
    }

    public function updateCategory(Request $request) {
//        Category::saveCategoryValidation($request);
        Category::updateCategoryInformation($request);
        return redirect('/category/manage-category')->with('message', 'Category information updated successfully');
    }

    public function deleteCategory(Request $request) {
        $category = Category::where('level_id', $request->id)->first();

        if ($category) {
            return redirect('/category/manage-category')
                    ->with('message1', 'Sorry this category can not delete because there are some sub-category under this category');
        } else {
            $category = Category::find($request->id);
            $category->delete();

            return redirect('/category/manage-category')->with('message', 'Category information delete successfully');
        }
    }
}
