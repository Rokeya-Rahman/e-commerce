<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['level_id', 'category_name', 'category_description', 'publication_status'];

    public static function saveCategoryValidation($request) {
        $request ->validate([
            'category_name'         =>  'required|regex:/(^([a-zA-Z _]+)(\d+)?$)/u|max:30|min:3',
            'category_description'  =>  'required|max:120',
            'publication_status'    =>  'required'
        ]);
    }

    public static function saveCategoryInformation($request) {
        $category   =   new category();
        $category->category_name        =   $request->category_name;
        $category->level_id             =   $request->level_id;
        $category->category_description =   $request->category_description;
        $category->publication_status   =   $request->publication_status;
        $category->save();
    }

    public function level() {
        return $this->belongsTo(Category::class, 'level_id');
    }

    public static function updateCategoryInformation($request) {
        $category = Category::find($request->id);
        $category->category_name        =   $request->category_name;
        $category->level_id             =   $request->level_id;
        $category->category_description =   $request->category_description;
        $category->publication_status   =   $request->publication_status;
        if ($category->publication_status == '0' && $category->level_id == null) {
            $levels = Category::where('level_id', $request->id)
                                ->where('publication_status', 1)
                                ->get();
            foreach ($levels as $level) {
                $level->publication_status = 2;
                $level->save();
            }
        } else if ($category->publication_status == '1' && $category->level_id == null) {
            $levels = Category::where('level_id', $request->id)
                                ->where('publication_status', 2)
                                ->get();

            foreach ($levels as $level) {
                $level->publication_status = 1;
                $level->save();
            }
        }
        $category->save();
    }

    public static function unpublishedCategoryInformation($request) {
        $category = Category::find($request->id);
        if ($category->level_id !== null) {
            $category->publication_status = 0;
        } else {
            $category->publication_status = 0;
            $levels = Category::where('level_id', $request->id)
                                ->where('publication_status', 1)
                                ->get();
            foreach ($levels as $level) {
                $level->publication_status = 2;
                $level->save();
            }
        }
        $category->save();
    }
}
