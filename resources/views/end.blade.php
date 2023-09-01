<link  href="files/bootstrap.min.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-5">

        </div>
        <div class="col-md-4">
    {{-- <label for="">Yes: <small> {{Session::get('correctans')}}</small></label>
    <label for="">No: <small> {{Session::get('wrongans')}}</small></label>
    <label for="">Result: <small> {{Session::get('correctans')}}/{{Session::get('correctans')+Session::get('wrongans')}}</small></label> --}}

    {{-- @if (Session::get('points') <= 3 )
        <label for=""> - type : <b>1</b> <br> - points : <b> {{Session::get('points')}}</b></label><br>
    @endif

    @if ( Session::get('points') >= 4 && Session::get('points') <= 7 )
        <label for="">type : <b>2</b> and points : <b> {{Session::get('points')}}</b></label><br>
    @endif

    @if ( Session::get('points') >= 8 )
        <label for="">type : <b>3</b> and points : <b> {{Session::get('points')}}</b></label><br>
    @endif --}}


    @if (Session::get('points') <= 7)

    @if (Session::get('points') <= 3 )
        <label for=""> <h4> - Pragmatique </h4>  - Points : <b> {{Session::get('points')}}</b></label><br>
    @endif
    @if ( Session::get('points') >= 4 && Session::get('points') <= 7 )
        <label for=""> <h4> - Fondamentale </h4> - Points : <b>{{Session::get('points')}}</b></label><br>
    @endif
    @else
        @if (Session::get('points') > 10)
        <label for=""> <h4> - Concernente  </h4> - Points : <b> 10 </b></label><br>
        @else
        <label for=""> <h4> - Concernente  </h4> - Points : <b> {{Session::get('points')}}</b></label><br>
        @endif
    @endif


    {{-- <label for="">Answer value is  : <b> {{Session::get('points')}}</b></label><br> --}}
    {{-- <label for="">Answer B : <b> {{Session::get('ansB')}}</b></label><br>
    <label for="">Answer C : <b> {{Session::get('ansC')}}</b></label><br> --}}
    {{-- <label for="">Result : <small> {{Session::get('ansA')}}/{{Session::get('ansA')+Session::get('ansB')}}</small></label> --}}

    <br>
    <a href="/"><button class="btn btn-primary" style="margin-left: 10%">Finish Questions</button></a>
    <div class="text-center"><a href="/">Home ?</a></div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>


<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>
