<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\News;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function getRecipes($locale){
        $content = nova_page_manager_get_page_by_path('recipes', null, $locale);
        if($content){
            $recipes = Recipe::published()->paginate(6);
            $content = [
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'recipes' => $recipes
            ];
            return view('recipes', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }

    public function getRecipeBySlug($locale,$slug){
        $recipe = Recipe::published()->where('slug',$slug)->first();
        if($recipe){
            $otherRecipes = Recipe::published()->where('id','<>',$recipe->id)->orderBy('id','DESC')->take(20)->get()->random(3);
            return view('recipe_inner', [
                'otherRecipes' => !empty($otherRecipes) ? $otherRecipes : [],
                'recipe' => $recipe
            ]);
        }
        return abort(404);
    }
}
