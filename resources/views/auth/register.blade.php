@extends('frontEnd.layouts.app')

@section('content')
<!-- bratcam area  start-->
<section class="bradcam">
<div class="container">
<h3 class="text-white pt-5 pb-3">সাইন-আপ </h3>
    <p class="pb-5 text-white">
        <a href="{{route('home_page')}}" class="text-decoration-none bradcam-active-btn pe-2">হোম</a>
         / 
         <a href="" class="text-decoration-none text-white ps-2">সাইন-আপ </a>
    </p>
</div>

</section>
<!-- bratcam area  end-->
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header py-3 bg-success text-white fs-5">{{ __('রেজিস্ট্রেশন ফরম') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-4 px-4 pt-4">

                            <div class="col-md-12">
                                <input id="name" placeholder="আপনার নাম" type="text" class="border border-success form-control py-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 px-4">

                            <div class="col-md-12">
                                <input id="phone" type="phone" placeholder="মোবাইল নম্বর" class=" border border-success form-control py-2 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <div class="col-md-3 mt-2">
                                <a href="#" class="btn-danger" id="otp-btn" style="cursor:pointer">OTP send</a>
                            </div>  -->
                        </div>

                      
 
                        <div class="row mb-4 px-4">

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="পাসওয়ার্ড" class=" border border-success form-control py-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
<<<<<<< HEAD
                                <button type="button" id="hidePassword" style="" onclick="myFunction()" class="field-icon"><i class=" text-secondary fas fa-eye"></i></button>
                                <div id="emailHelp" class="form-text">আপনার পছন্দমত পাসওয়ার্ড সেট করুন ।</div>

=======
                                <small class="text-secondary" style="font-size: 12px;">আপনার পছন্দমত পাসওয়ার্ড সেট করুণ ।</small>
>>>>>>> 9173fbdc2c0205a4e00551a18859dcfdaa830b76
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 px-4">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="কনফার্ম পাসওয়ার্ড" class=" border border-success form-control py-2" name="password_confirmation" required autocomplete="new-password">
<<<<<<< HEAD
                                <button type="button" id="hideConfirmPassword" style="" onclick="myFunction2()" class="field-icon"><i class=" text-secondary fas fa-eye"></i></button>
                                <div id="emailHelp" class="form-text">উপরের পাসওয়ার্ডটি পুনরায় দিন ।</div>
=======
                                <small class="text-secondary" style="font-size: 12px;">উপরের পাসওয়ার্ড টি এখানে দিন ।</small>
>>>>>>> 9173fbdc2c0205a4e00551a18859dcfdaa830b76
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="ms-4">
                                <button type="submit" class="btn btn-danger">
                                ফ্রি রেজিস্ট্রেশন করুন 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<script>
    function myFunction() {
  var x = document.getElementById("password");
  
  if (x.type === "password") {
    x.type = "text";
    document.getElementById('hidePassword').innerHTML = '<i class=" text-secondary fas fa-eye-slash"></i>'
  } else {
    x.type = "password";
    document.getElementById('hidePassword').innerHTML = '<i class=" text-secondary fas fa-eye"></i>'
  }
} 
    function myFunction2() {
  var x = document.getElementById("password-confirm");
  
  if (x.type === "password") {
    x.type = "text";
    document.getElementById('hideConfirmPassword').innerHTML = '<i class=" text-secondary fas fa-eye-slash"></i>'
  } else {
    x.type = "password";
    document.getElementById('hideConfirmPassword').innerHTML = '<i class=" text-secondary fas fa-eye"></i>'
  }
} 
</script>
@endsection
