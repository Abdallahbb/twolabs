  <!-- footer section -->
  <section class="footer">
    <div class="line"></div>
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="{{ route('index') }}"><i class="fas fa-chevron-right"></i>home</a>
            <a href="{{ route('services') }}"><i class="fas fa-chevron-right"></i>services</a>
            <a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i>about</a>
            <a href="/#doctors"><i class="fas fa-chevron-right"></i>doctors</a>
            <a href="{{ route('book') }}"><i class="fas fa-chevron-right"></i>book</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"><i class="fas fa-phone"></i> +123-456-789-000</a>
            <a href="#"><i class="fas fa-globe"></i> info@twolabs.com</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i> Abuja, Nigeria</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#" class="fab fa-facebook"> facebook</a>
            <a href="#" class="fab fa-twitter"> twitter</a>
            <a href="#" class="fab fa-instagram"> instagram</a>
            <a href="#" class="fab fa-linkedin"> linkedin</a>
        </div>
    </div>
</section>
<!-- end of footer section -->
<script src="{{ asset('assets/js/script.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>

</html>
