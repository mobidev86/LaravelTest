<h1 class="text-center text-4xl">Add Items</h1>
<form class=" my-4">

    <div class="form-group  mb-2">

        <label for="exampleFormControlInput1" class="mb-2">Name:</label>

        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">

        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

    </div>

    <div class="form-group  mb-2">

        <label for="exampleFormControlInput2 " class="mb-2">Description:</label>

        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="description" placeholder="Enter Description"></textarea>

        @error('description') <span class="text-danger">{{ $message }}</span>@enderror

    </div>

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>

</form>