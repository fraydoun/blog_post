<?php

namespace Fraidoon\Blog\Http\Livewire;

use Livewire\Component;
use Fraidoon\Blog\Models\BlogCategory;

use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    public $updateMode = false;
    public $createModal = false;
    public $deleteModal = false;
    public $modelId;
    public $title;    
    
    
    
    protected $rules = [
        'title' => 'required|max:200'
    ];
    
    protected $messages = [
        'title.required' => 'عنوان دسته بندی  حتما باید وارد شود',
        'title.max' => 'عنوان بیشتر از 200 حرف نباشد',
    ];
    
    public function ResetVars(){
        $this->search = null;
        $this->modelId = null;
        $this->title = null;        
        
        
    }
    
    public function read()
    {
        
        $datas = BlogCategory::latest()->paginate(5);
        return $datas;
    }
    
    public function render()
    {
        return view('blog::livewire.Category',[
            'datas' => $this->read()
        ]);
    }
    
    public function create()
    {
        $this->validate();
        BlogCategory::create(['title' => $this->title]);
        $this->ResetVars();
        $this->createModal = true;
        session()->flash('success', 'دسته بندی با موفقیت ثبت شد');
    }
    
    
    public function show($id){
        $this->ResetVars();
        $this->modelId = $id;
        $this->getModalData();
    }
    public function getModalData(){
        $data = BlogCategory::where('id','=',$this->modelId )->get();
        
        $this->modelId = $data[0]->id;
        $this->title = $data[0]->title;
        
    }
    public function cancel(){
        $this->ResetVars();
    }
    
    public function update()
    {
        $this->validate();
        if ($this->modelId) {
            $data = BlogCategory::find($this->modelId);
            $data->update([
                'title' => $this->title
            ]);
            $this->ResetVars();

            session()->flash('success', 'دسته بندی با موفقیت ویرایش شد');
        }
    }

    public function showDelete($id){
        $this->ResetVars();
        $this->modelId = $id;
        
    }

    public function deleteMessageData(){
        $data = BlogCategory::where('id' , $this->modelId)->delete();
        if($data){
            session()->flash('success', 'دسته بندی با موفقیت حذف شد');
        }
    }
    
}
