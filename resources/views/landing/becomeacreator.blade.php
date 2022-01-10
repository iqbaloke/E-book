@extends('layouts.landing.back')
@section('content')
<style>
    .slick-prev:before {
        color: black;
    }

    .slick-next:before {
        color: black;
    }
</style>
<div style="padding-top: 100px" class="container">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 d-flex align-items-center">
                <div class="px-3 py-3">
                    <p style="font-size: 30px;  font-weight: 700;
                        color: #000000;
                        margin: 0 0 ">Become A Creators,</p>
                    <p style="font-size: 30px;  font-weight: 700;
                        color: #000000;
                        margin: 0 0 ">increase your income, by becoming a creator !!!</p>
                    <p style="font-size: 16px;  font-weight: 500;
                        color: #000000;
                        margin: 0 0;
                        padding-top:10px;
                        ">show your work to others, that your work is really quality and useful for others</p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <img style=" border: 2px solid rgba(128, 128, 128, 0); border-radius: 20px;"
                    src="{{ asset('images/person.jpg') }}" alt="">
            </div>
        </div>
    </div>
</div>
<div style="padding-top: 50px;" class="container">
    <h5><strong>become a creator now</strong></h5>
    <h6>before you become a creator, please complete the following data</h6>
    <hr>
    <div class="mt-4">
        <form action="{{ route('addbecomeacreator') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between">
                <div class="col-md-6">
                    <div class="form-group">
                        <h6><strong>thumbnail</strong></h6>
                        <h6>insert a png or jpg format image</h6>
                        <div class="d-flex justify-content-between">
                            <div class="col-md-4">
                                <img style=" border: 2px solid rgb(89, 0, 255); border-radius: 10px; margin-left:-15px;"
                                    src="{{ asset('images/no-image.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <h6><strong>Phone</strong></h6>
                        </label>
                        <input type="text" name="phone" id="phone" class="form-control" required
                            placeholder="insert your phone number">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <h6><strong>country</strong></h6>
                        </label>
                        <input type="text" name="country" id="country" class="form-control" required
                            placeholder="insert your country number">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <h6><strong>city</strong></h6>
                        </label>
                        <input type="text" name="city" id="city" class="form-control" required
                            placeholder="insert your city number">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <h6><strong>address</strong></h6>
                        </label>
                        <input type="text" name="address" id="address" class="form-control" required
                            placeholder="insert your address number">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <h6><strong>description</strong></h6>
                            <h6>Description of at least 150 letters</h6>
                        </label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">
                            <h6><strong>status</strong></h6>
                        </label>
                        <input type="text" name="status" id="status" class="form-control" required
                            placeholder="insert your status number">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <h6><strong>lats education</strong></h6>
                        </label>
                        <input type="text" name="last_education" id="last_education" class="form-control" required
                            placeholder="insert your last_education number">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <h6><strong>major</strong></h6>
                        </label>
                        <input type="text" name="major" id="major" class="form-control" required
                            placeholder="insert your major number">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">
                            <h6><strong>location of education</strong></h6>
                        </label>
                        <input type="text" name="location_of_education" id="location_of_education" class="form-control"
                            required placeholder="insert your location_of_education number">
                    </div>
                    <h5 class="py-3"><strong>Sosmed</strong></h5>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-facebook-f"></i>
                            <input type="text" name="facebook" id="facebook" class="form-control ml-3"
                                placeholder="link your facebook">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-github"></i>
                            <input type="text" name="github" id="github" class="form-control ml-3"
                                placeholder="link your github">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-instagram"></i>
                            <input type="text" name="instagram" id="instagram" class="form-control ml-3"
                                placeholder="link your instagram">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-linkedin"></i>
                            <input type="text" name="linkdin" id="linkdin" class="form-control ml-3"
                                placeholder="link your linkdin">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <i class="fab fa-twitter"></i>
                            <input type="text" name="twitter" id="twitter" class="form-control ml-3"
                                placeholder="link your twitter">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-sm" type="submit">Become A Creator</button>
        </form>
    </div>
</div>
<div style="height: 100px">

</div>
@endsection
