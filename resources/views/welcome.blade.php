@extends('layout.app')

@section('content')

<!-- Home Section -->
<section class="home" id="home">
    <div class="images">
        <img src="{{ asset('assets/images/Ophthalmologist-bro.svg') }}" alt="Illustration of an ophthalmologist">
    </div>
    <div class="content">
        <h3>TwoLabs Optics</h3>
        <p><strong>High Innovation Professional Eye Care</strong><br>A comprehensive eye clinic</p>
        <a href="{{ route('register') }}" class="btn">Explore More <span class="fas fa-chevron-right"></span></a>
    </div>
</section>

<!-- Icons Section -->
<section class="icons-container">
    <div class="icons">
        <i class="fas fa-user-md"></i>
        <h3>140+</h3>
        <p>Doctors at work</p>
    </div>
    <div class="icons">
        <i class="fas fa-user"></i>
        <h3>1040+</h3>
        <p>Satisfied patients</p>
    </div>
</section>

<!-- Services Section -->
<section class="services" id="services">
    <h1 class="heading">Our <span>Services</span></h1>
    <div class="box-container">
        <div class="box">
            <i class="bi bi-eyeglasses"></i>
            <h3>Optical Frames</h3>
            <p>We offer a variety of prescription frames in different styles, colors, and materials. Options include white, tinted, photochromic, and blue-cut lenses to match your needs and fashion sense.</p>
            <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
        </div>
        <div class="box">
            <i class="bi bi-eye-fill"></i>
            <h3>Comprehensive Eye Exams</h3>
            <p>Essential for maintaining good vision, our eye exams detect issues early and assess your overall eye health. Recommended every 1–2 years, especially for those with glasses or a family history of eye problems.</p>
            <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
        </div>
        <div class="box">
            <i class="bi bi-droplet-half"></i>
            <h3>Contact Lenses</h3>
            <p>We provide professional fittings for comfortable and effective contact lens use, customized to your eye shape, prescription, and lifestyle.</p>
            <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
        </div>
        <div class="box">
            <i class="bi bi-sunglasses"></i>
            <h3>Designer Frames</h3>
            <p>Stylish frames from brands like Ray-Ban, Lacoste, Dior, and Gucci. Elevate your look with luxury eyewear designed for fashion and comfort.</p>
            <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
        </div>
        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>Treatment for Eye Diseases</h3>
            <p>From diagnosis to personalized treatment plans—including medication, surgery, or lifestyle changes—we ensure your eye health is in expert hands.</p>
            <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="about" id="about">
    <h1 class="heading"><span>About</span> Us</h1>
    <div class="row">
        <div class="images">
            <img src="{{ asset('assets/images/Ophthalmologist-amico.svg') }}" alt="About TwoLabs illustration">
        </div>
        <div class="content">
            <h3>The Best Eye Clinic Services for Your Eyes</h3>
            <p>At TwoLabs Optics, our mission is to deliver world-class eye care. Recognized as a leading eye clinic in Abuja, we offer expert consultations and advanced treatments using modern technology—all within a patient-centered environment.</p>
            <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
        </div>
    </div>
</section>

<!-- Doctors Section -->
<section class="doctors" id="doctors">
    <h1 class="heading">Our <span>Doctors</span></h1>
    <div class="box-container">
        <div class="box">
            <img src="{{ asset('assets/images/doc_female2.png') }}" alt="Dr. Aisha Usman">
            <h3>Aisha Usman</h3>
            <span>Ophthalmologist</span>
            <div class="share">
                <a href="#" class="fab fa-facebook"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>
        <div class="box">
            <img src="{{ asset('assets/images/doc_male.png') }}" alt="Dr. Muhammad Hadi">
            <h3>Muhammad Hadi</h3>
            <span>Ophthalmologist</span>
            <div class="share">
                <a href="#" class="fab fa-facebook"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>
        <div class="box">
            <img src="{{ asset('assets/images/doc_female.png') }}" alt="Dr. Jennifer Adams">
            <h3>Jennifer Adams</h3>
            <span>Optometrist</span>
            <div class="share">
                <a href="#" class="fab fa-facebook"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="review" id="review">
    <h1 class="heading">Client's <span>Review</span></h1>
    <div class="box-container">
        <div class="box">
            <img src="{{ asset('assets/images/review.png') }}" alt="Review from John Edwards">
            <h3>John Edwards</h3>
            <div class="stars">
                @for ($i = 0; $i < 4; $i++) <i class="fas fa-star"></i> @endfor
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">
                “I’ve been with TwoLabs Optics since 2014. Their growth and commitment to high-quality service, stylish eyewear, and warm customer care are unmatched.”
            </p>
        </div>
        <div class="box">
            <img src="{{ asset('assets/images/review.png') }}" alt="Review from Adam Sani">
            <h3>Adam Sani</h3>
            <div class="stars">
                @for ($i = 0; $i < 4; $i++) <i class="fas fa-star"></i> @endfor
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">
                “TwoLabs Optics stands out in Abuja for its professionalism and attentive after-care. Highly recommended!”
            </p>
        </div>
        <div class="box">
            <img src="{{ asset('assets/images/review.png') }}" alt="Review from Hafsat Umar">
            <h3>Hafsat Umar</h3>
            <div class="stars">
                @for ($i = 0; $i < 4; $i++) <i class="fas fa-star"></i> @endfor
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">
                “The process was quick, efficient, and friendly—from consultation to receiving my glasses. The clinic is welcoming and well-equipped.”
            </p>
        </div>
    </div>
</section>

@endsection
