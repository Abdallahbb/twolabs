@extends('layout.app')

@section('content')

<!-- About Us Section -->
<section class="about" id="about" style="margin-top: 8rem;">
    <h1 class="heading"><span>About</span> Us</h1>
    <h1 class="heading"><span>Who We Are</span></h1>

    <div class="row">
        <div class="images">
            <img src="{{ asset('assets/images/Ophthalmologist-amico.svg') }}" alt="Ophthalmologist illustration">
        </div>
        <div class="content">
            <p>TwoLabs Optics is a medical laboratory established in 2015. It began as one of the few dedicated and comprehensive eye clinics in FCT Abuja, Nigeria. Our mission is to improve vision and enhance quality of life. We value honesty, integrity, and compassion, and our experienced team of opticians is committed to delivering personalized care to each patient.</p>

            <p>We aim to provide affordable, high-quality products and services to our customers. Our team is dedicated to putting patients first and offering exceptional care. Our wide range of services includes comprehensive eye exams, contact lens fittings, and pediatric eye care. We also feature a broad selection of optical and designer frames, plus lenses to match your style and budget.</p>

            <p>At TwoLabs Optics, we strive to offer everything you need under one roof—from routine eye checkups and optical services to advanced eye surgeries. We’re your all-in-one solution for vision care.</p>

            <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
        </div>
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

<!-- Why Choose Us Section -->
<h1 class="heading">Why <span>Choose</span> Us</h1>

<section class="about">
    <div class="row">
        <div class="content">
            <p>TwoLabs Optics is a medical laboratory founded in 2015, recognized as one of the few fully dedicated eye clinics in FCT Abuja. Our goal is to enhance your vision and improve your overall quality of life. We uphold values like honesty, integrity, and compassion, and our highly skilled team delivers personalized care tailored to your needs.</p>

            <p>We are committed to offering affordable, top-tier optical products and services. We prioritize patient satisfaction and offer a wide array of care—from eye exams and contact lens fittings to pediatric services. Our optical section features a stylish and functional variety of lenses and frames to suit every personality and price point.</p>

            <p>Whether it’s a simple eye checkup or advanced optical surgery, TwoLabs Optics provides everything you need under one roof—making us your complete eye care solution.</p>

            <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
        </div>
        <div class="images">
            <img src="{{ asset('assets/images/doc-2.png') }}" alt="Doctor illustration">
        </div>
    </div>
</section>

@endsection
