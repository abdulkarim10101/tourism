<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-footer contact-block">
                    <h3 class="footer-title">Contact</h3>
                    <div class="single-footer-content">
                        <p class="text-italic">dubaicitytour@gmail.com</p>

                        <p class="social-icons">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fas fa-rss"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-footer contact-block">
                    <h3 class="footer-title">Information</h3>
                    <div class="single-footer-content">
                    <ul class="footer-list">
                        <li><a href="/aboutus">About Us</a></li>
                        <li><a href="{{route('customer.myorders')}}">My orders</a></li>
                        {{-- <li><a href="#">Returns & Exchanges</a></li> --}}
                        <li><a href="{{route('customer.myorders')}}">My Account</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-2 col-sm-6">
                <div class="single-footer contact-block">
                    <h3 class="footer-title">CUSTOMER CARE</h3>
                    <div class="single-footer-content">
                    <ul class="footer-list">
                        <li><a href="contact.php">Contact us</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">My Account</a></li>
                    </ul>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-4 col-md-6">
                <div class="single-footer contact-block">
                    <h3 class="footer-title">SUBSCRIBE TO OUR NEWSLETTER</h3>
                    <div class="single-footer-content">
                    <p>
                        Subscribe to the mailing list to receive updates on new arrivals, special offers and other discount information.
                    </p>
                    <div class="pt-2">
                        <div class="input-box-with-icon">
                            <input type="text" placeholder="Enter Your email">
                            <button><i class="fas fa-envelope"></i></button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© dubaicitytour.com</p>
    </div>
</footer>
