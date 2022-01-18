{{-- 
    
    @Author: MD Shaheduzzaman Shahed
    http://github.com/zamanshahed/
    
--}}




<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">


                {{-- Start Category List --}}


                <div class="col-md-8">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }} </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All Categories</div>

                        @php
                            $i = 1;
                        @endphp
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $item)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                        <td> {{ $item->category_name }} </td>
                                        <td>{{ $item->user_finder->name }}</td>
                                        <td>
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('category/edit/' . $item->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('soft_delete/category/' . $item->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>

                {{-- End Category List --}}





                {{-- Start Add Category  --}}

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Categories</div>
                        <div class="card-body">
                            <form action=" {{ route('store.category') }} " method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Catrgory Name</label>
                                    <input type="text" name="category_name" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name">
                                    @error('category_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- End Add Category --}}



                {{-- Start Trash --}}

                <div class="container">
                    <div class="col-md-8">
                        <div class="card">
                            @if (session('success'))
                                {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{ session('success') }} </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div> --}}
                            @endif
                            <div class="card-header">Trash List</div>

                            @php
                                $i = 1;
                            @endphp
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SL No.</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($trashBin as $item)
                                        <tr>
                                            <th scope="row">{{ $trashBin->firstItem() + $loop->index }}</th>
                                            <td> {{ $item->category_name }} </td>
                                            <td>{{ $item->user_finder->name }}</td>
                                            <td>
                                                @if ($item->created_at)
                                                    {{ $item->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/restore/' . $item->id) }}"
                                                    class="btn btn-info">Restore</a>
                                                <a href="{{ url('category/permanent_delete/' . $item->id) }}"
                                                    class="btn btn-danger">Delete Forever</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $trashBin->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    
                </div>


                {{-- End Trash --}}



            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->




    </div>



</x-app-layout>
