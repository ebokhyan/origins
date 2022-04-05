<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function getTerm() {
        $data = nova_page_manager_get_page_by_path('terms', null, 'en');
        if($data) {
            $content = [
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

    public function getPolicy() {
        $data = nova_page_manager_get_page_by_path('policy', null, 'en');
        if($data) {
            $content = [
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
