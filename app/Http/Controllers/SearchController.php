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
            ->select('id','slug','title','short_description', 'image','author','created_at','resource_type')
            ->whereRaw('LOWER(JSON_EXTRACT(title, "$.en")) like ?', ['"%' . strtolower($request->search) . '%"'])
            ->orWhereRaw('LOWER(JSON_EXTRACT(title, "$.hy")) like ?', ['"%' . strtolower($request->search) . '%"'])
            ->orWhereRaw('LOWER(JSON_EXTRACT(short_description, "$.en")) like ?', ['"%' . strtolower($request->search) . '%"'])
            ->orWhereRaw('LOWER(JSON_EXTRACT(short_description, "$.hy")) like ?', ['"%' . strtolower($request->search) . '%"']);
        $recipes = Recipe::published()
            ->select('id','slug','title','short_description', 'image','author','created_at','resource_type')
            ->whereRaw('LOWER(JSON_EXTRACT(title, "$.en")) like ?', ['"%' . strtolower($request->search) . '%"'])
            ->orWhereRaw('LOWER(JSON_EXTRACT(title, "$.hy")) like ?', ['"%' . strtolower($request->search) . '%"'])
            ->orWhereRaw('LOWER(JSON_EXTRACT(short_description, "$.en")) like ?', ['"%' . strtolower($request->search) . '%"'])
            ->orWhereRaw('LOWER(JSON_EXTRACT(short_description, "$.hy")) like ?', ['"%' . strtolower($request->search) . '%"']);

        $results = Article::published()
            ->select('id','slug','title','short_description', 'image','author','created_at','resource_type')
            ->whereRaw('LOWER(JSON_EXTRACT(title, "$.en")) like ?', ['"%' . strtolower($request->search) . '%"'])
            ->orWhereRaw('LOWER(JSON_EXTRACT(title, "$.hy")) like ?', ['"%' . strtolower($request->search) . '%"'])
            ->orWhereRaw('LOWER(JSON_EXTRACT(short_description, "$.en")) like ?', ['"%' . strtolower($request->search) . '%"'])
            ->orWhereRaw('LOWER(JSON_EXTRACT(short_description, "$.hy")) like ?', ['"%' . strtolower($request->search) . '%"'])
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
