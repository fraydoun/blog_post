

@extends('blog::layouts.app')
@section('css')
<link href="{{asset('/vendor/blog/plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{-- @livewire('PostUpdate') --}}

<div class="col-12">
  <div id="basic" class="col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
      <div class="widget-header">
        <div class="row">
          <div class=" col-12">
            <h4>ویرایش  پست</h4>
          </div>                 
        </div>
      </div>
      <div class="widget-content widget-content-area">
        
        <form action="{{ route('postsupdate',$post->id) }}" method="POST"  enctype="multipart/form-data">
          @csrf
          @method('PUT')
          
          <div class="row">
            <div class=" col-12 mx-auto">
              <div class="form-group">                
                <label for="blog_categoryInput">دسته بندی</label>
                <select id="blog_categoryInput"  class="form-control" name="blog_category_id">
                  <option value="" data-hidden="true">دسته بندی انتخاب کنید</option>
                  @foreach ($blog_categories as $category)
                  <option value="{{$category->id}}" {{ $category->id === $post->blog_category_id ? ' selected' : '' }}>{{ $category->title }}</option>
                  @endforeach
                </select>
                
                @error('blog_category_id') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              
              <div class="form-group">
                
                <label>نویسنده </label>
                <select id="blog_categoryInput"  class="form-control" name="admin_id">
                  <option value="" data-hidden="true">نویسنده انتخاب کنید</option>
                  @foreach ($admins as $admin)
                  <option value="{{ $admin->id }}" {{ $admin->id === $post->admin_id ? ' selected' : '' }}>{{ $admin->name }}</option>
                  @endforeach
                </select>
                
                @error('admin_id') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              
              <div class="form-group">
                <label for="photo">عکس برای پست </label>
                @if($post->photo != "")
                <img src="{{asset($post->photo)}}" style="width: 20%;"class="card-img-top" alt="widget-card-2">
                @endif

                <input type="file" class="form-control" name="newPhoto" id="newPhoto">
                @error('newPhoto') <span class="text-danger">{{ $message }}</span>@enderror

              </div>
              
              <div class="form-group">
                <label for="titleInput">عنوان </label>
                <input type="text" class="form-control" name="title" id="titleInput" placeholder="عنوان پست را وارد کنید!" value="{{old('title', $post->title)}}">
                @error('title') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              
              <div class="form-group">
                <label for="tags">برچسب ها  </label>
                <input type="text" class="form-control" name="tags" id="tags" placeholder="برچسب ها را وارد کنید!" value="{{old('tags', $post->tags)}}">
                @error('tags') <span class="text-danger">{{ $message }}</span>@enderror
              </div>

              <div class="form-group">
                <label for="view_counter"> تعداد بازدید کننده  </label>
                <input type="text" class="form-control" name="view_counter" id="view_counter" placeholder=" تعداد بازدید کننده را وارد کنید!" value="{{old('view_counter', $post->view_counter)}}">
                @error('view_counter') <span class="text-danger">{{ $message }}</span>@enderror
              </div>

              <div class="form-group">
                <label for="tg">متن  کوتاه  </label>
                <textarea class="form-control" id="tg"  name="short_content" rows="3" placeholder="توضیحات   متن کوتاه را وارد نمایید...">{{old('short_content', $post->short_content)}}</textarea>
                @error('short_content') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              
              <div class="form-group">
                <label for="titleInput">متن مقاله</label>
                <div  id="editor-container">  
                  {!!old('content', $post->content)!!} 
                </div>
                <textarea id="detail" style="display:none" name="content">{{old('content', $post->content)}}</textarea>
                @error('content') <span class="text-danger">{{ $message }}</span>@enderror 
                
              </div>
              
            </div>                                        
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"  class="btn btn-success">
              ذخیره 
            </button>
            
            
          </div>
        </form>
        
      </div>
    </div>
    
  </div>  
  
</div> 

@endsection


@section('script')
<script src="{{asset('/vendor/blog/plugins/editors/quill/quill.js')}}"></script>
<script>
  var quill = new Quill('#editor-container', {
    modules: {
      toolbar: [
      [{ header: [1, 2, 3, 4, 5, 6,  false] }],
      ['bold', 'italic', 'underline','strike'],
      ['link'],
      [{ 'script': 'sub'}, { 'script': 'super' }],
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      ['clean']
      ]
    },
    placeholder: 'توضیحات  مقاله را وارد نمایید...',
    theme: 'snow'  // or 'bubble'
    
  });
  quill.on('text-change', function(delta, oldDelta, source) {
    $('#detail').val(quill.container.firstChild.innerHTML);
  });
  
  
  
</script>
@endsection
