@extends('admin.layouts.app')

@section('content')
    <div class="paddingprofile">
        <div class="container">
            <div class="row">
                <div class="col-md-4 border-right bck ">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div>


                            <form class="profileform" id="user_save_profile_form" enctype="multipart/form-data">
                                <meta name="csrf-token" content="{{ csrf_token() }}" />


                                @if (Auth::user()->dp == null)
                                    <div class="photo-img center mt-5 rounded-circle parent" id="image_user"
                                        style="background-image:url('{{ asset('images/userdp/default.png') }}'); margin-top:3%">
                                    </div>
                                @else
                                    @php
                                        $userdp = Auth::user()->dp;
                                    @endphp
                                    <div class="photo-img center rounded-circle parent" id="image_user"
                                        style="background-image:url('{{ asset('images/userdp') }}/{{ $userdp }}'); ">
                                        <svg class="checkmark child1" style="display: none" id="tick"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                        </svg>
                                    </div>
                                    <img id="myImg" src="{{ asset('images/userdp') }}/{{ $userdp }}" alt=""
                                        style="display: none">
                                    <h1 class="h1profile">{{ Auth::user()->name }}</h1>
                                    <span class="badge badge-pill"
                                        style="font-size:15px;background-color: #000305a1;color: #3f647a">{{ auth()->user()->role->name }}</span>
                                @endif




                                {{-- <img class="rounded-circle center mt-5 " id="image_user" name='image_user'
                                        src="{{ asset('images/userdp/default.png') }}" > --}}

                                <input onchange="doAfterSelectImage(this)" type="file" style="display: none;"
                                    id="profile_pic" name="dp" />
                                <button type="button" for="imgupload" id="OpenImgUpload" class="dpbtn child"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-camera" viewBox="0 0 16 16">
                                        <path
                                            d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                                        <path
                                            d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                    </svg>
                                </button>
                                {{-- <span class="spanchild"> administator</span> --}}


                                {{-- <button id="submit" type="submit" class="btn btn-primary">Register</button> --}}
                            </form>
                            <script>
                                $('#OpenImgUpload').click(function() {
                                    $('#profile_pic').trigger('click');
                                });

                                $("#email").style({

                                    "position": "relative",
                                    "top": "-75px",
                                    'display': ,
                                    'inline-block',
                                    'color': '#ed0707bd',
                                    'border': '1px solid #fa010140',
                                    'border-bottom': '2px solid #fa010140',
                                    'background-color': 'rgba(255, 255, 255, 0)',


                                });

                            </script>


                        </div>
                    </div>
                </div>
                <div class="col-md-8 logob" style=" ">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-row align-items-center back"><i
                                    class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                <a href="{{ route('home') }}"><i class="fa fa-caret-left"
                                        style="font-size:20px;color:white"></i></a>
                            </div>
                            <h6 class="text-right" style="color: white">Edit Your Profile</h6>
                        </div>
                        <form action="">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="text-field ">
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                            name="name" required>
                                        <label>Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-field">
                                        <input id="email" readonly type="text" class="form-control"
                                            value="{{ Auth::user()->email }}" required>
                                        <label class="labell ">Email</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="text-field">
                                        <input readonly type="text" class="form-control"
                                            value="{{ Auth::user()->phone }}" required>
                                        <label class="labell">Phone</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-field">
                                        <input readonly type="text" class="form-control"
                                            value="{{ Auth::user()->mobile }}" required>
                                        <label class="labell">Mobile</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">

                                <div class="col-md-12">
                                    <div class="text-field">
                                        <textarea type="text" class="form-control" name="address"
                                            placeholder="Enter Address" rows="3"
                                            required>{{ Auth::user()->address }}</textarea>
                                        <label class="labell">Address</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="text-field">
                                        <input readonly type="text" class="form-control"
                                            value="{{ Auth::user()->role->name }}">
                                        <label class="labell">Post</label>
                                        {{-- value="{{ Auth::user()->role->name }}" --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-field">
                                        <input readonly type="text" class="form-control" required>
                                        <label class="labell">Post</label>
                                        {{-- value="{{ Auth::user()->role->name }}" --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="text-field">
                                        <input readonly type="text" class="form-control" required>
                                        <label class="labell">Phone</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-field">
                                        <input readonly type="text" class="form-control" required>
                                        <label class="labell">Phone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save
                                    Profile</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>


    </script>



    {{-- example --}}
    {{-- <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("image_user");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        var wow = document.getElementById("gimper");
        var hiddenimg = document.getElementById("myImg");
        var angle = 40;
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = hiddenimg.src;
            captionText.innerHTML = 'Click to Rotate';
        }




        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
            updateRotatedImage(modalImg.src, wow.value);
        }

        function buttonclick() {

            document.getElementById("gimper").value++;
            var wow = document.getElementById("gimper").value;
            if (wow < 5) {
                hello(wow);
            }

        }

        function hello(eoe) {

            if (eoe == 1) {
                var angle = 90;
                modalImg.className = "modal-content rotateimg" + angle;

            }
            if (eoe == 2) {
                var angle = 180;
                modalImg.className = "modal-content rotateimg" + angle;
            }
            if (eoe == 3) {
                var angle = 270;
                modalImg.className = "modal-content rotateimg" + angle;
            }
            if (eoe == 4) {
                var angle = 360;
                modalImg.className = "modal-content rotateimg" + angle;
                document.getElementById("gimper").value = 0;
            }
        }

        function updateRotatedImage(Img, Wow) {

            var Image = Img;
            var angle = (Wow * 90);
            console.log(Image);
            console.log(angle);


            // let myForm = document.getElementById('user_save_profile_form');
            var form_data = new FormData($('#user_save_profile_form1')[0]);

            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "imagerotate",
                dataType: 'JSON',

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    image: Image,
                    angle: angle,
                },



                success: function(responese) {
                    $('#tick').show();
                    setTimeout(function() {
                        $('#tick').hide();
                    }, 3000);
                    // setTimeout(function(){ $("#tick").css("display", "block"); },2000);
                },
            });
        }

    </script> --}}

    {{-- example --}}

    <script>
        function doAfterSelectImage(input) {
            // console.log(input)
            var image = document.getElementById('profile_pic').files[0];
            var image_name = image.name;
            var image_extention = image_name.split('.').pop().toLowerCase();
            // console.log("metod");

            if (jQuery.inArray(image_extention, ['png', 'jpg', 'jpeg']) == -
                1) {
                alert('Invalid file type');
            } else {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image_user').css('background-image', 'url(' + e.target.result + ')');
                        $('#dpuser').prop('src', e.target.result);

                        // $("#image_user").attr("src", '{{ asset('images/userdp/pic') }}' );
                    };
                    reader.readAsDataURL(input.files[0]);
                    uploadUserProfileImage();
                }
            }
            // readURL(input);
        }

        // function readURL(input) {
        //     var image = document.getElementById('profile_pic').files[0];
        //     var image_name = image.name;
        //     var image_extention = image_name.split('.').pop().toLowerCase();
        //     console.log("metod");

        //     if (jQuery.inArray(image_extention, ['png', 'jpg', 'jpeg']) == -
        //         1) {
        //         alert('Invalid file type');
        //     } else {

        //         if (input.files && input.files[0]) {
        //             var reader = new FileReader();
        //             reader.onload = function(e) {
        //                 $('#image_user').css('background-image', 'url(' + e.target.result + ')');
        //                 $('#dpuser').prop('src', e.target.result);

        //                 // $("#image_user").attr("src", '{{ asset('images/userdp/pic') }}' );
        //             };
        //             reader.readAsDataURL(input.files[0]);
        //             uploadUserProfileImage();
        //         }
        //     }
        // }

        function uploadUserProfileImage() {
            // let myForm = document.getElementById('user_save_profile_form');
            var form_data = new FormData($('#user_save_profile_form')[0]);

            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "saveimage",
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                success: function(responese) {
                    $('#tick').show();
                    setTimeout(function() {
                        $('#tick').hide();
                    }, 3000);
                    // setTimeout(function(){ $("#tick").css("display", "block"); },2000);
                },
            });
        }

    </script>


@endsection
