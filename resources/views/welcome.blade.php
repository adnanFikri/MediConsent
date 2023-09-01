<link  href="files/bootstrap.min.css" rel="stylesheet" type="text/css">
<link  href="files/mycss.css" rel="stylesheet" type="text/css">



<body>
    @extends('layouts.a')



<!--<div class="back_1">






<div class="container-fluid">
    <div class="row">
<div class="col-md-2"></div>
<div class="col-md-6">


</div>
<div class="col-md-4 " style="padding-top: 60vh">
<a href="/questions"><button style="width:130px;" class="btn btn-primary">Questions </button></a>
<a href="/start"><button  style="width:130px;" class="btn btn-primary">Start</button></a>

</div>
<div class="col-md-5"></div>

    </div>
</div>


</div>
-->

</body>


<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>

{{-- 
<tr>
    <td> <a href="{{ route("livres.create") }}">Ajouter</a> </td>
    <td> <a href="{{ route("livres.edit" , ["livre" => $livre]) }}">Editer</a> </td>
    <td>
        <form action="{{ route("livres.destroy" , ["livre" => $livre]) }}" methode="POST">
            @csrf
            @method("DELETE")
            <input type="submit" value="Delete">
        </form>
    </td>
</tr> --}}
