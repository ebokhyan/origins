<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function getTerm($locale) {
        $data = nova_page_manager_get_page_by_path('terms', null, app()->getLocale());
        if($data) {
            $content = [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'template' => $data['template'],
                'seo' => [
                    'title' => $data['seo_title'],
                    'description' => $data['seo_description'],
                    'image' => $data['seo_image'],
                ],
               'title' => $data['data']->title,
               'content' => $data['data']->content
            ];
            return view('policy',['content' => $content]);
        }
        return abort(404);
    }

    public function getPolicy($locale) {
        $data = nova_page_manager_get_page_by_path('policy', null, app()->getLocale());
        if($data) {
            $content = [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'template' => $data['template'],
                'seo' => [
                    'title' => $data['seo_title'],
                    'description' => $data['seo_description'],
                    'image' => $data['seo_image'],
                ],
                'title' => $data['data']->title,
                'content' => $data['data']->content
            ];
            return view('policy',['content' => $content]);
        }
        return abort(404);
    }
}
