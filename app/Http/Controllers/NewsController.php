<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('admin.news.list', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $file = $request->file('image');
            $data['image'] = $file->store('images/news', 'images');
        }
        $data['user_id'] = auth()->user()->id;
        News::create($data);

        return redirect(route('admin.news.list'))->with('status', 'Inserts news successfully!');
    }

    public function update($id)
    {
        $news = News::find($id);
        return view('admin.news.update', compact('news'));
    }
    public function edit($id, Request $request)
    {
        $data = $request->all();
        $news = News::find($id);
        if ($request->has('image')) {
            $file = $request->file('image');
            $data['image'] = $file->store('images/news', 'images');
        }
        $news->update($data);

        return redirect(route('admin.news.list'))->with('status', 'Update news successfully!');
    }

    public function delete($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect(route('admin.news.list'))->with('status', 'Delete news successfully!');
    }
}