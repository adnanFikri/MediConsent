<link  href="files/bootstrap.min.css" rel="stylesheet" type="text/css">
<link  href="files/mycss.css" rel="stylesheet" type="text/css">










<div class="back_2">
    <div class="container-fluid">
      <form action="/submitans" method="POST">
        @csrf
        <div class="row" style="padding-top: 15vh;color:black">
            <div style="margin-left: 3%"></div>
            <div class="col-md-10">
                <h5>#{{Session::get("nextq")}} {{$questions->question}}</h5> <br>
                @if ($questions->c)
                    <input name="ans" type="radio" answer='a' value="2" checked="true"> : (A) <small>{{$questions->a}}</small> <br>
                    <input name="ans" type="radio" answer='b' value="1"> : (B) <small>{{$questions->b}}</small> <br>
                    <input name="ans" type="radio" answer='c' value="0"  > : (C) <small>{{$questions->c}}</small> <br>
                @else
                    <input name="ans" type="radio" answer='a' checked="true" value="1"> : (A) <small>{{$questions->a}}</small> <br>
                    <input name="ans" type="radio" answer='b'  value="0"> : (B) <small>{{$questions->b}}</small> <br>
                @endif

                <input type="hidden" name="selected_answer" id="selected-answer" value="a">

                {{-- <input value="{{$questions->ans}}" style="visibility:hidden" name="dbans"> --}}
            </div>
            <div class="col-md-5"></div>

        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary" style="margin-left:120%;margin-top:30%">Next</button>
            </div>

        </div>
    </form>
    </div>

</div>


<script>
    var options = document.querySelectorAll('input[name="ans"]');
    var selectedAnswerInput = document.getElementById('selected-answer');

    options.forEach(function(option) {
        option.addEventListener('change', function() {
            selectedAnswerInput.value = this.getAttribute('answer');
            console.log(selectedAnswerInput.value);

        });

    });


</script>


<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>


{{-- <input type="text" name="age" answer='19'> --}}
