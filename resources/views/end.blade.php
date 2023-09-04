<link  href="files/bootstrap.min.css" rel="stylesheet" type="text/css">

<style>
    .parr
    {
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
</style>

<div class="container-fluid parr">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-4">

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

            <br>
            <a href="/"><button class="btn btn-primary" style="margin-left: 10%">Finish Questions</button></a>
            <div class="text-center"><a href="/">Home ?</a></div>

        </div>

        <div class="col-md-3"></div>

    </div>
</div>


<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>
