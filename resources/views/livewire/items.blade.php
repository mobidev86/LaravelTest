<div>

  

    @if (session()->has('message'))

        <div class="alert alert-success">

            {{ session('message') }}

        </div>

    @endif

  

    @if($updateMode)

        @include('livewire.update')

    @else

        @include('livewire.create')

    @endif
    
    <div class="flex gap-2.5  justify-end">
    <!-- Search Input Field -->
    <input type="text" class="form-control max-w-sm" wire:model="searchTerm" placeholder="Search Tasks...">
    
    <button wire:click="search" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md  ">Search</button>
</div>
    <table class="table table-bordered mt-4 ">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Description</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp
            @foreach($data as $Item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $Item->name }}</td>
                <td>{{ $Item->description }}</td>
                <td>
                <button wire:click="edit({{ $Item->id }})" class="bg-blue-500  btn-sm">Edit</button>

                <button wire:click="delete({{ $Item->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @php $i++; @endphp
            @endforeach
        </tbody>
    </table>   
        {{ $data->links() }}
</div>