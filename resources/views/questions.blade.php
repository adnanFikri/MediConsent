<link  href="files/bootstrap.min.css" rel="stylesheet" type="text/css">
<link  href="files/mycss.css" rel="stylesheet" type="text/css">


<br>

<h3 style="text-align: center;">ADMIN ACCESS</h3>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error !</strong> {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endforeach

                @if (Session::get('successMessage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success !</strong> {{Session::get('successMessage')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <?php Session::forget('successMessage'); ?>
                @endif
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

<div class="container-xl  ">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-7"><Button data-toggle="modal" data-target="#Modal_add" class="btn btn-primary">Add</Button> </div>
                    <a href="/" style="margin-left: 35%">Home?</a>
                </div>
            </div>

            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question <i class="fa fa-sort"></i></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $q)
                    <tr>
                        <td>{{$q->id}}</td>
                        <td> {{$q->question}}?</td>

                        <td class="">
                            <a href="#" class="btn-actio" onclick="edit({{$q->id}})"  data-toggle="modal" data-target="#Modal_update">Update</a>
                            {{-- <a href="" class="text-danger"   data-toggle="modal" data-target="#Modal_delete" >Delete</a> --}}
                            <form action="{{ route('questions.delete', ['id' => $q->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn-action">
                            </form>

                        </td>
                    </tr>
                    @endforeach
            </table>


{{-- ------------------------------------------------------------------------------------------------------ --}}
<!-- Modal-Update -->
<div class="modal fade" id="Modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/update" id="formEdit" method="post">
                @method('PUT')
                @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="row" style="padding: 10px">
                <h5>Questions :</h5>
            </div>
            <input name="idQ" id="idQ" style="visibility: hidden" value="{{$q->id}}">
            <div class="row">
                <input name="question" id="qEdit" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-6"><label>A:</label></div>
                <div class="col-md-6"><label>B:</label></div>

            </div>
            <div class="row">
                <div class="col-md-6"><input name="opa" value="{{$q->a}}" id="aEdit"></div>
                <div class="col-md-6"><input name="opb" value="{{$q->b}}" id="bEdit"></div>

            </div>
            <div class="row">
                <div class="col-md-6"><label>C:</label></div>

            </div>
            <div class="row">
                <div class="col-md-6"><input name="opc" id="cEdit" value="{{$q->c}}"></div>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" >Update Question</button>
            </div>
            </div>
        </form>
        </div>
        </div>
    </div>



{{-- ======================================================================================================== --}}
 <!-- Modal-Add -->
<div class="modal fade" id="Modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="/add" method="post">
              @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row" style="padding: 10px">
              <h5>Questions :</h5>
          </div>
          <div class="row">
              <input name="questions" class="form-control m-2" placeholder="Question">
          </div>
          <div class="row">
              <div class="col-md-6"><label>A :</label></div>
              <div class="col-md-6"><label>B :</label></div>

          </div>
          <div class="row">
              <div class="col-md-6 "><input name="opa" placeholder="answer a" class="form-control mb-5"></div>
              <div class="col-md-6 "><input name="opb" placeholder="answer b" class="form-control mb-5"></div>

          </div>
          {{-- <div class="row">
              <div class="col-md-6"><label>C:</label></div>

          </div>
          <div class="row">
              <div class="col-md-6"><input name="opc" placeholder="answer c"></div>

          </div> --}}
        {{-- <div class="row">
          <div class="col-md-3"> <label>Answer :</label>
              <select name="ans" class="form-control" >
                  <option value="a">A</option>
                  <option value="b">B</option>
                  <option value="c">C</option>
              </select>
          </div>
          <div class="col-md-9"></div>

        </div> --}}
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Add Questions</button>
        </div>
        </div>
      </form>
      </div>
    </div>
  </div>


<!-- Modal Delete
-->

<div class="modal fade" id="Modal_delete{{$q->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="/delete" method="post">
              @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input name="id" style="visibility: hidden" value="{{$q->id}}">
                <h5>Are you want to Delete this Question ?</h5>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" >Delete Question</button>
        </div>
        </div>
      </form>
      </div>
    </div>
  </div>



<script>
    var questions = {!! json_encode($questions) !!};
    var idQ = document.getElementById('idQ');
    var qEdit = document.getElementById('qEdit');
    var aEdit = document.getElementById('aEdit');
    var bEdit = document.getElementById('bEdit');
    var cEdit = document.getElementById('cEdit');

    var formEdit = document.getElementById('formEdit');

    const edit = (el) => {
        const question = questions.filter(q => q.id == el);

        idQ.value = question[0].id
        qEdit.value = question[0].question
        aEdit.value = question[0].a
        bEdit.value = question[0].b
        cEdit.value = question[0].c

        formEdit.action = 'update/'+question[0].id ;

        console.log( question );

    }

</script>

<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>
