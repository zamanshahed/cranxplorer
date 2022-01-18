<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> -->
        <!-- <x-jet-welcome /> -->
        <div class="container">
            <div class="row">
               
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit informations</div>
                        <div class="card-body">
                            <form action=" {{url('category/update/'.$categories->id)}} " method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Catrgory Name</label>
                                    <input type="text" name="category_name" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" value="{{$categories->category_name}}">
                                    @error('category_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
    </div>
</x-app-layout>
