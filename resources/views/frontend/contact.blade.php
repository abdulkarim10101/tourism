@extends('frontend.layouts.app')

@section('title', 'Home Page')

@section('content')

<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </div>
</nav>

{{-- <div class="gogle_map section-padding-top">
    <iframe id="googleMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.693667617067!2d144.946279515845!3d-37.82064364221098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4cee0cec83%3A0xd019c5f69915a4a0!2sCollins%20St%2C%20West%20Melbourne%20VIC%203003%2C%20Australia!5e0!3m2!1sen!2sbd!4v1607512676761!5m2!1sen!2sbd">
    </iframe>
</div> --}}

<section class="contact-page-section overflow-hidden">
    <div class="row">
        <div class="col-md-6">
            <div class="ct-single-side">
                <div class="ct-section-title">
                <h2>Get in Touch</h2> </div>
                <form action="{{route('contactpost')}}" method="post" class="site-form " id="contact-form">
                   @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name*">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name*">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email*">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Message*"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="submit-btn">
                                <button type="submit" class="btn btn-black">Send Mail</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 bg-gray">
            <div class="ct-single-side">
                <div class="section-title mb--20">
                    <h2>CONTACT US</h2>
                </div>
                <div class="contact-right-description">
                    <article class="ct-article">
                        <p>We'd love to hear from you! Whether you have a question, feedback, or just want to say hello, feel free to reach out to us using the contact form </p>
                    </article>
                    <ul class="contact-list mb--35">
                        {{-- <li><i class="fas fa-fax"></i>Address : No ABC, Karachi, Pakistan.</li> --}}
                        {{-- <li><i class="fas fa-phone"></i>0(1234) 567 890</li> --}}
                        {{-- <li><i class="far fa-envelope"></i>Info@abc.com</li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
