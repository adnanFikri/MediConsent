<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <h1 class="title text-center m-5">User Details</h1>

    <h3 class="m-2">Name : {{ $user->name }}</h3>
    <h3 class="m-2">Type : {{ $user->type }}</h3>
    <h3 class="m-2">Points : {{ $user->points }}</h3>
    <h3 class="m-2">Status Test :
        @if ($userAnswers->count() >= 10)
            <span class="text-success">Completed.</span>
        @else
            <span class="text-danger">Pas Complete!</span>
        @endif
    </h3>

    <table class="table table-striped table-bordered table-hover w-75 m-auto">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userAnswers as $answer)
                <tr>
                    <td><strong>#{{ $answer->question->id }}</strong> {{ $answer->question->question }}</td>
                    <td>{{ $answer->answer }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
