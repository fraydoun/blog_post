<?php

namespace Fraidoon\Blog\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Fraidoon\Blog\Models\BlogPost;
use Fraidoon\Blog\Models\BlogCategory;

class PostCreate extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    public $title;
    public $short_content;  
    public $content;
    public $oldPhoto;
    public $photo;
    public $view_counter;
    public $tags;
    public $blog_category_id;
    public $admin_id;
    public $blog_categories= [];
    public $admins =[];
    
    
    protected $rules = [
        'title' => 'required|max:200',
        'short_content' => 'required|max:500',
        // 'content' => 'required|max:2000',
        'tags' => 'required',
        'blog_category_id' => 'required',
        'photo' => 'image|max:1024',
        'admin_id' => 'required'
    ];
    
    protected $messages = [
        'title.required' => 'عنوان پست  حتما باید وارد شود',
        'title.regex' => 'عنوان بیشتر از 200 حرف نباشد',
        'short_content.required' => 'متن کوتاه پست باید وارد شود',
        'short_content.regex' => 'متن کوتاه بیشتر از 500 حرف نباشد',
        // 'content.required' => 'متن پست باید وارد شود',
        // 'content.regex' => 'متن بیشتر از 2000 حرف نباشد',
        'tags.required' => 'برچسپ وارد شود',
        'blog_category_id.required' => 'ایدی دسته بندی را انتخاب کنید',
        'admin_id.required' => 'ایدی نویسنده را انتخاب کنید'
    ];
    
    public function ResetVars(){
        
        
        $this->title = null;        
        $this->short_content = null;  
        $this->content = null;
        $this->oldPhoto =null;
        $this->photo = null;
        $this->view_counter = null;
        $this->tags = null;
        $this->blog_category_id = null;
        $this->admin_id = null;
        $this->blog_categorie = null;
        $this->admins = null;
    }
    
    public function render()
    {
        $this->blog_categories = BlogCategory::get(['id','title']);
        $this->admins = \App\Models\Admin::get(['id','name']);
        return view('blog::livewire.postCreate');
    }
    
    public function create()
    {
        // dd($this->content);
        $this->validate();
        $path = $this->photo->store('upload/posts');
        BlogPost::create([
            'title' => $this->title,
            'short_content' => $this->short_content,
            'content' => $this->content,
            'photo' => $path,
            'tags' => $this->tags,
            'blog_category_id' => $this->blog_category_id,
            'admin_id' => $this->admin_id,
        ]);
        $this->ResetVars();
        session()->flash('success', 'پست با موفقیت ثبت شد');
        // return redirect()->to('/form');
    }
    
   
    
}
