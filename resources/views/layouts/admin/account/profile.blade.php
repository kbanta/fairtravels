@extends('layouts.admin.dashboard')
@section('profile')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form id="update_profile">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">{{ config('app.name', 'Laravel') }}</label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" class="form-control" name="username" value="{{$user[0]->name}}">
                                        <span class="text-danger">
                                            <strong id="username-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email address</label>
                                        <input type="email" class="form-control" name="email" value="{{$user[0]->email}}">
                                        <span class="text-danger">
                                            <strong id="email-error"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fist Name</label>
                                        @if($pd->isNotEmpty())
                                        <input type="text" class="form-control" name="fname" value="{{$pd[0]->fname}}">
                                        @else
                                        <input type="text" class="form-control" name="fname">
                                        @endif
                                        <span class="text-danger">
                                            <strong id="fname-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Name</label>
                                        @if($pd->isNotEmpty())
                                        <input type="text" class="form-control" name="lname" value="{{$pd[0]->lname}}">
                                        @else
                                        <input type="text" class="form-control" name="lname">
                                        @endif
                                        <span class="text-danger">
                                            <strong id="lname-error"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if($pd->isNotEmpty())
                                        <input type="text" class="form-control" name="address" value="{{$pd[0]->address}}">
                                        @else
                                        <label class="bmd-label-floating">Adress</label>
                                        <input type="text" class="form-control" name="address">
                                        @endif
                                        <span class="text-danger">
                                            <strong id="address-error"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">City</label>
                                        @if($pd->isNotEmpty())
                                        <input type="text" class="form-control" name="city" value="{{$pd[0]->city}}">
                                        @else
                                        <input type="text" class="form-control" name="city">
                                        @endif
                                        <span class="text-danger">
                                            <strong id="city-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Country</label>
                                        @if($pd->isNotEmpty())
                                        <input type="text" class="form-control" name="country" value="{{$pd[0]->country}}">
                                        @else
                                        <input type="text" class="form-control" name="country">
                                        @endif
                                        <span class="text-danger">
                                            <strong id="country-error"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Postal Code</label>
                                        @if($pd->isNotEmpty())
                                        <input type="text" class="form-control" name="postalcode" value="{{$pd[0]->postal_code}}">
                                        @else
                                        <input type="text" class="form-control" name="postalcode">
                                        @endif
                                        <span class="text-danger">
                                            <strong id="postalcode-error"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success pull-right update_btn">Update Profile</button>
                            <!-- <div class="clearfix"></div> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img admin-profile_pic" src="{{ asset('user/' . (Auth::user()->picture == '' ? 'no-pic.png' : Auth::user()->picture)) }}" />
                        </a>
                    </div>
                    <div class="card-body">
                        @if($pd->isNotEmpty())
                        <h6 class="card-category">{{$user[0]->name}}</h6>
                        <h4 class="card-title">{{$pd[0]->fname}} {{$pd[0]->lname}}</h4>
                        @else
                        <h4 class="card-title">{{$user[0]->email}}</h4>
                        @endif
                        <p class="card-description">
                            <input type="file" name="admin-profile_pic" id="admin-profile_pic" style="opacity: 0;height:1px;display:none">
                            <a href="#" class="btn btn-success" id="change_pro_pic">
                                <i class="fa fa-fw fa-camera"></i>
                                <span>Change Photo</span>
                            </a>

                            <script>
                                function previewImage(event) {
                                    const preview = document.getElementById('preview');
                                    preview.src = URL.createObjectURL(event.target.files[0]);
                                }
                            </script>

                            <!-- Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is... -->
                        </p>
                        <!-- <a href="#pablo" class="btn btn-primary btn-round">Follow</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $().ready(function() {
        $('.update_btn').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Update Profile?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, send it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // document.getElementById("update-btn").disabled = true;
                    $.ajax({
                        type: "PUT",
                        url: "update_profile/",
                        data: $('#update_profile').serialize(),
                        success: function(data) {
                            console.log(data);
                            if (data.errors) {
                                if (data.errors.username) {
                                    $('#username-error').html(data.errors.username[0]);
                                }
                                if (data.errors.email) {
                                    $('#email-error').html(data.errors.email[0]);
                                }
                                if (data.errors.fname) {
                                    $('#fname-error').html(data.errors.fname[0]);
                                }
                                if (data.errors.lname) {
                                    $('#lname-error').html(data.errors.lname[0]);
                                }
                                if (data.errors.address) {
                                    $('#address-error').html(data.errors.address[0]);
                                }
                                if (data.errors.city) {
                                    $('#city-error').html(data.errors.city[0]);
                                }
                                if (data.errors.country) {
                                    $('#country-error').html(data.errors.country[0]);
                                }
                                if (data.errors.postalcode) {
                                    $('#postalcode-error').html(data.errors.postalcode[0]);
                                }
                            }
                            if (data.success) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Profile updated Successfully!',
                                    showConfirmButton: false,
                                    timer: 3500
                                });
                                setTimeout(function() {
                                    location.reload();
                                    // location.href =
                                    //     "http://127.0.0.1:8000/processor/pr_to_po";
                                }, 3000);
                            }
                        },
                    });
                }
            });
        });

    });
    $(document).on('click', '#change_pro_pic', function() {
        $('#admin-profile_pic').click();
        var role = $('#role').val();
        console.log(role);
    });
    $('#admin-profile_pic').ijaboCropTool({
        preview: '.admin-profile_pic',
        setRatio: 1,
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        buttonsText: ['CROP', 'QUIT'],
        buttonsColor: ['#30bf7d', '#ee5155', -15],
        processUrl: '{{ route("adminProfilePic") }}',
        withCSRF: ['_token', '{{ csrf_token() }}'],
        onSuccess: function(message, element, status) {
            //  alert(message);
            Swal.fire({
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 3500
            });
        },
        onError: function(message, element, status) {
            alert(message);
        }
    });
</script>
@endsection