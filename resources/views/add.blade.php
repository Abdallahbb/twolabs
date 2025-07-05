@extends('layout.uapp')

@section('content')
<main>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <!-- Sidebar -->
                <div class="col-xl-2 col-lg-12 col-md-12 mt-3">
                    <x-sidebar />
                </div>

                <!-- Main Content -->
                <div class="col-xl-10 col-lg-12 col-md-12 mt-3">
                    <div class="">
                        <div class="tab-pane fade show active bg-white rounded-3" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                            
                            <!-- Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <p class="text-success mb-0">{{ session('success') }}</p>
                                </div>
                            @endif

                            <!-- New Product Form Section -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-4">
                                        <h4 class="mb-3 fw-bold">New Product</h4>

                                        <!-- Product Image Preview -->
                                        <div class="tab-content" id="nav-tabContents">
                                            <div class="tab-pane fade show active w-img" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                                <img src="{{ asset('assets/images/no-image.jpg') }}" alt="" id="previewImage" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Form -->
                                <div class="col-lg-6">
                                    <div class="py-5 px-5">
                                        <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <!-- Product Image -->
                                            <div class="mb-2">
                                                <label for="Name">Image</label>
                                                <input type="file" class="form-control shadow-sm" name="image" value="{{ old('image') }}" id="imgInp" accept="image/*">
                                                @error('image')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Product Name -->
                                            <div class="mb-2">
                                                <label for="Name">Name</label>
                                                <input type="text" class="form-control shadow-sm" name="name" value="{{ old('name') }}">
                                                @error('name')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Product Price -->
                                            <div class="mb-2">
                                                <label for="Price">Price</label>
                                                <input type="text" class="form-control shadow-sm" name="price" value="{{ old('price') }}">
                                                @error('price')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Product Quantity -->
                                            <div class="mb-2">
                                                <label for="Price">Quantity</label>
                                                <input type="text" class="form-control shadow-sm" name="quantity" value="{{ old('quantity') }}">
                                                @error('quantity')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Product Description -->
                                            <div class="mb-2">
                                                <label for="Description">Description <span class="text-muted">(Optional)</span></label>
                                                <textarea name="description" id="" class="form-control shadow-sm" placeholder="Description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-success mt-3 float-end">Add Product</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('imgInp').addEventListener('change', function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('previewImage').setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        });
    </script>
</main>
@endsection
