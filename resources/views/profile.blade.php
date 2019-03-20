<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    body{
        background: -webkit-linear-gradient(left, #FAB4A6, #F7EDEB);
    }
    .emp-profile{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    .profile-img{
        text-align: center;
    }
    .profile-img img{
        width: 100%;
        height: 30%;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #0062cc;
    }
    .profile-edit-btn{
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
    .proile-rating{
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }
    .proile-rating span{
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }
    .profile-head .nav-tabs{
        margin-bottom:5%;
    }
    .profile-head .nav-tabs .nav-link{
        font-weight:600;
        border: none;
    }
    .profile-head .nav-tabs .nav-link.active{
        border: none;
        border-bottom:2px solid #0062cc;
    }
    .profile-work{
        padding: 14%;
        margin-top: -15%;
    }
    .profile-work p{
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }
    .profile-work a{
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }
    .profile-work ul{
        list-style: none;
    }
    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #0062cc;
    }
</style>


@extends('layouts.app')
@section('content')

    <div class="emp-profile">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://l6c-acdn2.line6.net/data/6/0a020a3d6fbc5b2caa06e5883/image/jpeg/r17673_" alt=""/>
                        <div class="file btn btn-lg btn-primary">
                            {{ Auth::user()->name }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-6">
                        <div class="profile-work">
                            <p>Quote about Music</p>
                            <hr>
                            <h5>“Without music, life would be a mistake”</h5>

                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="" class="profile-edit-btn" name="btnAddMore" value="{{ Auth::user()->name }}' playlist"/>
                </div>
            </div>

        <div class="row" id="npRow">
            <div class="col">
                <p id="nppTag"><b>List of Videos</b></p>
            </div>
        </div>
        <div class="row">
        @foreach($profile as $pro)

            <div class="col-md-3 col-sm-4"><p style="margin-top: 10px;"></p>

                <div class="iiframe">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$pro->url}}?rel=0" allowfullscreen></iframe>
                    </div>
                    <p id="npp2Tag"><b></b></p>
                </div>
                <a href='{{url("/delete/{$pro->id}")}}' type="button" class="btn btn-danger" style="width: 100%;">Delete song</a>
            </div>
        @endforeach
        </div>







            </div>

    </div>


@stop