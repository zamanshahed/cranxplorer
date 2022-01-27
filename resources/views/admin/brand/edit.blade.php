<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brand
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
                            <form action=" {{ url('brand/update/' . $brands->id) }} " method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- get the old_image url in an input to take action --}}

                                <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                                <input type="hidden" name="old_name" value="{{ $brands->brand_name }}">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Brand Name"
                                        value="{{ $brands->brand_name }}">
                                    @error('brand_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Brand Name"
                                        value="{{ $brands->brand_image }}">
                                    @error('brand_image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <img src=" {{ asset($brands->brand_image) }} " alt=""
                                        style="height: 200px; width:auto">
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary">Update Brand</button>
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
