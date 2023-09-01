<link  href="files/bootstrap.min.css" rel="stylesheet" type="text/css">


<style>
    body{
        background: #edebeb;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "Arial", sans-serif;
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    .parent{
        display: flex;
        justify-content: center;
        align-content: center;
        width: 100%;
    }

    .centerss{
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: column;
        width: 50%;
        height: 100%;
        margin-left: 170px;
    }

    #start{
        visibility: hidden;
    }
    h3{
        width: 100%;
        transition: 1s;
    }

    .first-p{
        opacity: 0.1;
        transition: 0.5s;
        position: relative;
        left: -500px;
        animation: slideIn 1.2s forwards;

    }
    .second-p{
        opacity: 0.1;
        transition: 0.5s;
        position: relative;
        left: 500px;
        animation: slideOut 2s forwards;
    }

    @keyframes slideIn {
        to {
            left:0px;
            opacity: 1;
        }
    }
    @keyframes slideOut {
        to {
            left:0px;
            opacity: 1;
        }
    }


    .par-btns a{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-weight: bold;
        opacity: 0;
        animation: slideOut 3s forwards;
    }

    @keyframes opacityOn {
        to {
            opacity: 1;
            box-shadow: 1px 3px 5px black;
        }
    }

    /* button home for start answer questions */
    .btn-hm{
        opacity: 0.1;
        transition: 0.5s;
        position: relative;
        bottom: -500px;
        animation: slideUp 1.2s forwards;
    }
    @keyframes slideUp {
        to {
            bottom:0px;
            opacity: 1;
        }
    }

    .btn-start{
        background-color:#edebeb ;
        /* background-color: yellow; */
        box-shadow: 1px 2px 5px gray;
        width: 135px;
        animation: moveWith 2s infinite ease-out ;
        margin-bottom: 10px;
    }
    @keyframes moveWith {
        0%,100% {
            transform: scale(100%)
        }
        50%{
            transform: scale(105%)
        }
    }
</style>


    <div class=" parent ">

        @if ($checkTest)
            <div id="check " class="centerss text-center">
                    <h3 class="first-p">You Already Do The Test.</h3> <h3 class="second-p">Do you want to do another one! </h3>
                    <div class="par-btns">
                        <a class="btn btn-primary m-2 w-25 shadow" href="/">Back</a>
                        <a class="btn btn-danger m-2 w-25 shadow" href="/dashboard/deleteAnswers/{{ Auth::user()->id }}" onclick="show(event)">Yes</a>
                    </div>
                </div>
        @endif

        <div id="start">
            <h3>Are you Ready ? </h3><br>
            <a href="startquiz"><button class="btn btn-outline-primary mx-3 btn-start" style="margin-left: 10%">Start Questions</button></a>
            <br>
            <a class="btn btn-outline-dark m-2 mx-5 btn-hm" href="/">Home</a>
        </div>

    </div>


<script>
    const start = document.getElementById('start');
    const check = document.getElementById('check');

    var $checkTest = {!! json_encode($checkTest) !!};

    if (!$checkTest) {
        start.style.visibility = 'visible';
    }

    const show = (event) => {
        event.preventDefault(); // Prevents the default link behavior

        if (confirm('Are you sure you want to delete this user?')) {
            // start.style.visibility = 'visible';
            check.style.visibility = 'hidden';
            // If the user confirms, continue with the link navigation
            window.location.href = event.target.href;
        }

    }
</script>

<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>
