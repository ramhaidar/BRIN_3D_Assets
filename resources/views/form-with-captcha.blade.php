<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Form Captcha Validation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-4">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h2>Laravel 10 Add Captcha in Form For Validation</h2>
            </div>
            <div class="card-body">

                <form id="captcha-contact-us" name="captcha-contact-us" method="post"
                    action="{{ url('captcha-validation') }}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input class="@error('name') is-invalid @enderror form-control" id="name" name="name"
                            type="text">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input class="@error('email') is-invalid @enderror form-control" id="email" name="email"
                            type="email">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea class="@error('message') is-invalid @enderror form-control" name="message"></textarea>
                        @error('message')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-4 mb-4">
                        <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button class="btn btn-danger reload" id="reload" type="button">
                                ↻
                            </button>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <input class="form-control" id="captcha" name="captcha" type="text"
                            placeholder="Enter Captcha">
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                    console.log(data.captcha);
                }
            });
        });

        // $(document).ready(function() {
        //     $('#reload').click(function() {
        //         $.ajax({
        //             url: '/your/url/here',
        //             type: 'GET',
        //             success: function(data) {
        //                 console.log("TEST");
        //             }
        //         });
        //     });
        // });
    </script>
</body>

</html>
