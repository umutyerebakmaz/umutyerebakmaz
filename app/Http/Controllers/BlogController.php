<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Support\Meta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\BlogQueryService;

class BlogController extends Controller
{

    public function __construct(protected BlogQueryService $blogQueryService)
    {
        //
    }

    public function index(Request $request): View
    {
        $page = new Meta();
        $page->metaTitle  = 'Admin | Yazılar';
        $blogs = $this->blogQueryService->query($request);
        return view('pages.blog.blogs', compact('page', 'blogs'));
    }


    public function create(): View
    {
        $page = new Meta();
        $page->metaTitle  = 'Admin | Yazı Ekle';
        return view('pages.blog.create-blog', compact('page'));
    }

    public function store(StoreBlogRequest $request): RedirectResponse
    {
        $blog = new Blog;
        $blog->title = trim($request->input('title'));
        $blog->slug = trim($request->input('slug'));
        $blog->content = trim($request->input('content'));
        // file tasks
        if ($request->hasfile('files')) {
            $file = $request->file('files')[0];
            $name = Str::uuid() . '.' . $file->extension();
            $file->move(public_path() . '/uploads/blogs/', $name);
            $blog->image = $name;
        }
        $blog->save();
        return redirect()
            ->to(url()->previous())
            ->with('success', 'Blog Yazısı başarıyka kaydedildi.');
    }

    public function show(Blog $blog): View
    {
        Str::macro('readDuration', function (...$text) {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords / 200);
            return (int)max(1, $minutesToRead);
        });

        $blog = Blog::where('slug', $blog->slug)->firstOrFail();

        $page = new Page;
        $page->title = $blog->title;
        $page->metaTitle = $blog->title;
        $page->metaDesc = $blog->title . ' başlıklı bir yazı.';
        $blog->read_duration = Str::readDuration($blog->content) . ' dakika okuma';
        return view('pages.blog.blog-public', compact('page', 'blog'));
    }

    public function edit(Blog $blog): View
    {
        $page = new Page();
        $page->metaTitle  = 'Admin | Yazı Düzenle';
        $blog = Blog::find($blog->id);
        return view('pages.blog.edit-blog', compact('page', 'blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog): RedirectResponse
    {
        $blog->title = trim($request->input('title'));
        $blog->slug = trim($request->input('slug'));
        $blog->content = trim($request->input('content'));
        // onChange files
        if ($request->hasfile('files')) {
            // delete old previoues files
            $path = public_path('/uploads/blogs/'.$blog->image);
            File::delete($path);
            // add new files
            $file = $request->file('files')[0];
            $name = Str::uuid() . '.' . $file->extension();
            $file->move(public_path() . '/uploads/blogs/', $name);
            $blog->image = $name;
        }
        $blog->save();
        return redirect()
            ->to(url()->previous())
            ->with('success', 'Blog yazısı başarıyla güncellendi!');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        $blog = Blog::findOrFail($blog->id);
        if ($blog->image) {
            $path = public_path('/uploads/blogs/' . $blog->image);
            File::delete($path);
        }
        $blog->delete();
        return redirect()
            ->to(url()->previous())
            ->with('success', 'Blog başarıyla silindi!');
    }


    public function blogs(): View
    {
        $page = new Page;
        $page->metaTitle = 'Çevre Sağlığı, Böcek İlaçlama ve Biyosidal Ürünler Hakkında Bilgiler | Etkili Çözümler ve İpuçları';
        $page->metaDesc = 'Çevre sağlığı, böcek ilaçlama ve biyosidal ürünlerin güvenli kullanımı hakkında uzman bilgileri. Zararlılardan korunma, etkili ilaçlama yöntemleri ve biyosidal ürünlerin doğru kullanımı için ipuçları.';

        $blogs = Blog::latest()->paginate(12);

        Str::macro('readDuration', function (...$text) {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords / 200);
            return (int)max(1, $minutesToRead);
        });

        $blogs->map(function ($blog) {
            $blog->read_duration = Str::readDuration($blog->content) . ' dakika okuma';
            $blog->content = Str::limit($blog->content, 150, $end = '...');
        });

        return view('pages.blog.blogs-public', compact('page', 'blogs'));
    }

}
