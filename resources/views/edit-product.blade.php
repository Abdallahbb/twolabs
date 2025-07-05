@extends('layout.uapp')

@section('content')
<main>
    <section>
        <div class="container">
            <button onclick="history.back()" class="btn btn-sm btn-outline-dark mb-3">Back</button>
            
            <div class="row justify-content-center">
                
                {{-- Sidebar --}}
                <div class="col-xl-2 col-lg-12 col-md-12 mt-3">
                    <x-sidebar />
                </div>

                {{-- Edit Product Form --}}
                <div class="col-xl-10 col-lg-12 col-md-12 mt-3">
                    <form method="POST" action="{{ route('update-product') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <div class="tab-pane fade show active bg-white rounded-3 p-4" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">

                            {{-- Success Message --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <p class="text-success mb-0">{{ session('success') }}</p>
                                </div>
                            @endif

                            <div class="row">
                                {{-- Left Column: Image Preview --}}
                                <div class="col-lg-6">
                                    <h4 class="mb-3 fw-bold">Update Product</h4>
                                    <img 
                                        src="{{ asset($product->image ?? 'assets/images/no-image.jpg') }}" 
                                        alt="Product Image" 
                                        id="previewImage" 
                                        class="img-fluid"
                                    >
                                </div>

                                {{-- Right Column: Form Inputs --}}
                                <div class="col-lg-6">
                                    <div class="py-4">

                                        {{-- Image --}}
                                        <div class="mb-3">
                                            <label for="imgInp">Image</label>
                                            <input 
                                                type="file" 
                                                class="form-control shadow-sm" 
                                                name="image" 
                                                id="imgInp" 
                                                accept="image/*"
                                            >
                                            @error('image')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Name --}}
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input 
                                                type="text" 
                                                class="form-control shadow-sm" 
                                                name="name" 
                                                id="name" 
                                                value="{{ $product->name }}"
                                            >
                                            @error('name')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Price --}}
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input 
                                                type="text" 
                                                class="form-control shadow-sm" 
                                                name="price" 
                                                id="price" 
                                                value="{{ $product->price }}"
                                            >
                                            @error('price')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Quantity --}}
                                        <div class="mb-3">
                                            <label for="quantity">Quantity</label>
                                            <input 
                                                type="text" 
                                                class="form-control shadow-sm" 
                                                name="quantity" 
                                                id="quantity" 
                                                value="{{ $product->quantity }}"
                                            >
                                            @error('quantity')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="mb-3">
                                            <label for="description">Description <span class="text-muted">(Optional)</span></label>
                                            <textarea 
                                                name="description" 
                                                id="description" 
                                                class="form-control shadow-sm" 
                                                placeholder="Description"
                                            >{{ trim($product->description) }}</textarea>
                                            @error('description')
                                                <p class="small text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- Submit Button --}}
                                        <button type="submit" class="btn btn-success float-end mt-3">Edit Product</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
</main>

{{-- Image Preview Script --}}
<script>
    document.getElementById('imgInp').addEventListener('change', function () {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('previewImage').setAttribute('src', e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection
