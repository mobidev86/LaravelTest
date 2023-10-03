<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;

class Items extends Component
{
    use WithPagination;

    public $Items, $name, $description, $Item_id,$searchTerm;

   
    public $updateMode = false;

    public function render()

    {
        return view('livewire.items', [
            'data'		=>	Item::where(function($sub_query){
                                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
                                          ->orWhere('description', 'like', '%'.$this->searchTerm.'%');
                            })->orderBy('created_at', 'desc')->paginate(10)
        ]);

    }

    private function resetInputFields(){

        $this->name = '';

        $this->description = '';

    }

    public function store()

    {

        $validatedDate = $this->validate([

            'name' => 'required|unique:items|max:255',
            'description' => 'required',

        ]);

        Item::create($validatedDate);

  

        session()->flash('message', 'Item Created Successfully.');

        $this->resetInputFields();

    }

    public function edit($id)

    {

        $Item = Item::findOrFail($id);

        $this->Item_id = $id;

        $this->name = $Item->name;

        $this->description = $Item->description;

        $this->updateMode = true;

    }

    public function cancel()

    {

        $this->updateMode = false;

        $this->resetInputFields();

    }


    public function update()

    {

        $validatedDate = $this->validate([

            'name' => 'required|max:255',
            'description' => 'required',

        ]);

  

        $Item = Item::find($this->Item_id);

        $Item->update([

            'name' => $this->name,

            'description' => $this->description,

        ]);

  

        $this->updateMode = false;

  

        session()->flash('message', 'Item Updated Successfully.');

        $this->resetInputFields();

    }

    public function delete($id)

    {

        Item::find($id)->delete();

        session()->flash('message', 'Item Deleted Successfully.');

    }

    public function search()
    {
       $query = '%'.$this->searchTerm.'%';
       
        return view('livewire.items', [
            'data'		=>	Item::where(function($sub_query){
                                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
                                          ->orWhere('description', 'like', '%'.$this->searchTerm.'%');
                            })->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
