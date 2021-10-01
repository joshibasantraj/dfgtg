<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Video;



class FrontendController extends Controller
{
    protected $category=null;
    protected $news=null;
    protected $gallery=null;
    protected $video=null;

    public function __construct(Category $category,News $news,Gallery $gallery,Video $video)
    {
        $this->category=$category;
        $this->news=$news;
        $this->gallery=$gallery;
        $this->video=$video;
    }
    public function index(){
        $category=$this->category->orderBy('id','DESC')->get();
        $videos=$this->video->orderBy('id','DESC')->get();
        $gallery=$this->gallery->all();
        $sticky_news=$this->news->where('is_sticky',1)->orderBy('id','DESC')->first();
        // dd($category->news_info);
        // dd($sticky_news);
        return view('frontend.index')->with('category',$category)->with('videos',$videos)->with('galleries',$gallery)->with('sticky_news',$sticky_news);
    }

}
