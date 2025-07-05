@extends('layout.uapp')

@section('content')
    <section class="container">



        <div class="row justify-content-center">

            <div class="col-md-5 p-5 bg-white">
                {{-- <div class="images">
                    <img src="{{ asset('assets/images/Face to face-rafiki.svg') }}" height="240" width="240" alt="">
                </div> --}}
                <h5 class="text-center mb-3"> <span>Book an appintment</span> now</h5>
                <form action="{{ route('bookAppointment') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="description" class="form-control" id="description" cols="30" rows="4" placeholder="Description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="date" min="{{ now()->format('Y-m-d') }}" class="form-control" name="app_date" value="{{ old('app_date') }}">
                        @error('app_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="time" value="{{ old('time') }}" class="form-control" name="app_time">
                        @error('app_time')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark" class="btn">Book now</button>
                </form>
            </div>

        </div>

    </section>
@endsection
