@extends('layouts.app')
@section('content')

    <!-- Body Content Of Page -->

        <div class="row">
            <!-- Youtube Iframe -->

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-8">
                        <p id="songName">{{$title}}</p>
                    </div>
                    <div class="col-lg-4">
                        <a type="button" href="{{url('/addlist')}}" class="btn btn-primary" style="float: right; margin-top: 10px;">Add to Playlist</a>
                    </div>
                </div>

                <div class="iiframe">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$link}}?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <!-- Finished iframe here -->
            <!-- Search Music Start -->
            <div class="col-lg-6">
                <div class="modifyCard">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="form-row">
                                    <div class="col-4">
                                    </div>
                                    <div class="col-5">
                                        <div class="filterMusic">Filter Your Music</div>
                                    </div>
                                </div>
                            </h5>
                            <div style="margin-top: 15px;">
                                <!-- Musuic suggestion form start here -->
                                <form method="get" action="/filter">
                                    <!-- row-1 for year -->
                                    <div class="form-row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-2">
                                            <label  class="cardLabel" for="year">Year:</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="text" class="form-control" name="pyear" placeholder="From">
                                        </div>
                                        <div class="col-1">
                                            <p class="cardArrow">_</p>
                                        </div>
                                        <div class="col-2">
                                            <input type="text" class="form-control" name="tyear" placeholder="To">
                                        </div>
                                        <div class="col-3">
                                        </div>
                                    </div>
                                    <!-- row-2 for Artist  -->
                                    <div class="form-row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-2">
                                            <label class="cardLabel">Artist:</label>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" class="form-control" name="aname" placeholder="Artist Name">
                                        </div>
                                    </div>
                                    <!-- row-3 for genre -->
                                    <div class="form-row">
                                        <div class="col-2">

                                        </div>
                                        <div class="col-2">
                                            <label class="cardLabel">Genre:</label>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <select class="form-control" name="genre" id="exampleFormControlSelect1">
                                                    <option>Soft</option>
                                                    <option>Classic</option>
                                                    <option>Rock</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Row-5 for submit -->
                                    <div class="form-row">
                                        <div class="col-4">
                                        </div>
                                        <div class="col-5">
                                            <button type="submit" class="btn btn-primary btn-sm btn-block" id="cardSubmitButton">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row-2 new and notable -->
        <div class="row" id="npRow">
            <div class="col">
                <p id="nppTag"><b>New & Notable</b></p>
            </div>
        </div>
        <div class="row" id="npIframe">


            @foreach($songlist as $song)


            <div class="col-lg-2 col-sm-4"><p style="margin-top: 10px;"></p>
                <div class="iiframe">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$song['url']}}?rel=0" allowfullscreen></iframe>
                    </div>
                    <p id="npp2Tag"><b>{{$song['title']}}</b></p>
                </div>
            </div>
                @endforeach



        </div>
        <!-- row-3 popular song -->
        <div class="row" id="npRow">
            <div class="col">
                <p id="nppTag"><b>Popular Songs</b></p>
            </div>
        </div>
        <div class="row" id="npIframe">

            @foreach($lsonglist as $lsong)
            <div class="col-lg-2 col-sm-4"><p style="margin-top: 10px;"></p>
                <div class="iiframe">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$lsong['li']}}?rel=0" allowfullscreen></iframe>
                    </div>
                    <p id="npp2Tag"><b>{{$lsong['tit']}}</b></p>
                </div>
            </div>
           @endforeach



        </div>
        <div class="row">
            <div class="col-4" id="footerRow">
                <div id="footerRow1">
                    <p style="color: white;"><b>Like Us</b></p>
                    <img src="img/fa.png" alt="" height="30px" width="30px">
                    <img src="img/in.png" alt="" height="30px" width="30px" style="margin-left: 10px;">
                </div>
            </div>
            <div class="col-4" id="footerRow">
                <p id="footerRow2"style><b>Copyright&copy2018</b></p>
            </div>
            <div class="col-4" id="gpt">
                <div class="" style="padding: 5px;">
                    <p id="pfooter"><b>Give Us Feedback</b></p>
                    <p id="pfooter"><b>Privacy Policy</b></p>
                    <p id="pfooter"><b>Terms</b></p>
                </div>

            </div>
        </div>
    <!-- javascript for autoload modal -->
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#exampleModalCenter').modal('show');
        });
    </script>
@stop