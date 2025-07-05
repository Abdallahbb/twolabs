
@extends('layout.app')
<!-- home section -->
@section('content')


    <!-- booking section -->
    <section class="location">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.202390029146!2d55.41664277472487!3d25.12884753446701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f639308ba95af%3A0xedae5ad63d1eb2eb!2sThe%20Myriad%20Dubai!5e0!3m2!1sen!2sae!4v1710055341017!5m2!1sen!2sae"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>




    <!-- doctors section -->
    <section class="doctors" id="doctors">

        <h1 class="heading"> our <span>doctors</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/doc-1.png" alt="">
                <h3>James Anderson</h3>
                <span>ophthalmologist</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="images/doc-2.jpg" alt="">
                <h3>Jennifer Adams</h3>
                <span>expect doctor</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="images/doc-3.png" alt="">
                <h3>William Carter</h3>
                <span>ophthalmologist</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="images/doc-4.png" alt="">
                <h3>Jessica Davis</h3>
                <span>optometrist</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="images/doc-5.png" alt="">
                <h3>Daniel King</h3>
                <span>optician</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <img src="images/premium_photo-1677333502598-c7023d305395.avif" alt="">
                <h3>Thomas Graham</h3>
                <span>optometrist</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>


        </div>

    </section>
    <!-- end of doctors section -->

    <!-- footer section -->


@endsection