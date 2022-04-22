<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function getResults(Request $request, $locale) {
//        dd($request->search);
        $news = News::published()
                ->select('id','slug','title','short_description', 'image','author','created_at')
                ->where('title->en', 'LIKE', "%$request->search%")
                ->orWhere('title->hy', 'LIKE', "%$request->search%")
                ->orWhere('short_description->en', 'LIKE', "%$request->search%")
                ->orWhere('short_description->hy', 'LIKE', "%$request->search%");
        $recipes = Recipe::published()
            ->select('id','slug','title','short_description', 'image','author','created_at')
            ->where('title->en', 'LIKE', "%$request->search%")
            ->orWhere('title->hy', 'LIKE', "%$request->search%")
            ->orWhere('short_description->en', 'LIKE', "%$request->search%")
            ->orWhere('short_description->hy', 'LIKE', "%$request->search%");

        $results = Article::published()
            ->select('id','slug','title','short_description', 'image','author','created_at')
            ->where('title->en', 'LIKE', "%$request->search%")
            ->orWhere('title->hy', 'LIKE', "%$request->search%")
            ->orWhere('short_description->en', 'LIKE', "%$request->search%")
            ->orWhere('short_description->hy', 'LIKE', "%$request->search%")
            ->union($news)
            ->union($recipes)
            ->orderBy('created_at')
            ->paginate(4);

        $html = view('pagination_partials.search',['items' => $results])->render();

        if ($request->ajax()) {
            return $html;
        }
        return view('search_results',['results' => $results,'results_html' => $html,'search' => $request->search]);
    }
}
