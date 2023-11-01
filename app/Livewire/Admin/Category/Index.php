<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;
    public function deleteCategory($category_id){
        $this->category_id = $category_id;
    }
    // public function destroyCategory() {
    //     $category = Category::find($this->category_id);
    //     $path = 'uploads/category/'.$category->image;
    //     if(File::exists($path)){
    //         File::delete($path);
    //     }
    //     $category->delete();
    //     session()->flash('message','Delete success!');
    // }

    public function destroyCategory() {
        $category = Category::find($this->category_id);
    
        if (!$category) {
            // Kiểm tra xem $category có được tìm thấy hay không
            // Nếu không, có thể in thông báo lỗi hoặc thực hiện hành động phù hợp
            session()->flash('message', 'Category not found');
            return;
        }
    
        // In thông tin kiểm tra
        $path = 'uploads/category/'.$category->image;
    
        if (File::exists($path)) {
            File::delete($path);
        }
    
        $category->delete();
        session()->flash('message', 'Delete success!');
    }
    
    public function render()
    {
        $categories = Category::orderBy("id","DESC")->paginate(10);
        return view('livewire.admin.category.index',['categories'=> $categories]);
    }
}
