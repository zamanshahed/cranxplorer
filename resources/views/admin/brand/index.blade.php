{{-- @Author: MD Shaheduzzaman Shahed
    http://github.com/zamanshahed/ --}}




<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">


                {{-- Start Brand List --}}


                <div class="col-md-8">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }} </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All Brands</div>

                        @php
                            $i = 1;
                        @endphp
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($brands as $item)
                                    <tr>
                                        <th scope="row">{{ $brands->firstItem() + $loop->index }}</th>
                                        <td> {{ $item->brand_name }} </td>
                                        <td> <img src=" {{asset($item->brand_image)}} " alt="brand-image-logo" style="height: 60px; width:auto" > </td>
                                        <td>
                                            @if ($item->created_at)
                                                {{ $item->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('brand/edit/' . $item->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('soft_delete/brand/' . $item->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $brands->links() }}
                    </div>
                </div>

                {{-- End Brand List --}}





                {{-- Start Add Brand --}}

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brands</div>
                        <div class="card-body">
                            <form action=" {{ route('store.brand') }} " method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Brand Name">
                                    @error('brand_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    @error('brand_image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- End Add Brand --}}



                {{-- Start Trash --}}



                {{-- End Trash --}}



            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->




    </div>



</x-app-layout>
