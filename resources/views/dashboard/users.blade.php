<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
            background: #edebeb;
        }
        h1  .arrow-l{
            color: rgb(133, 125, 125);
            cursor: pointer;
            transition: .2s;
            filter: drop-shadow(1px 0px 1px gray);
        }
        h1  .arrow-l:hover{
            color: black;
            filter: drop-shadow(2px 0px 2px rgb(195, 193, 193));
            transform: scale(110%);
        }
    </style>
</head>
<body>

    <h1 class="mx-4 my-2"><a href="{{ route('home') }}"><i class="fas fa-arrow-left arrow-l"></i></a></h1>

    <h1 class="m-auto my-5 w-fill text-center">Users</h1>
    <span class=""><a href="#" class="mx-5  btn btn-outline-secondary" onclick="usersTest()" title="users do test">User Test</a>
    </span><a href="#" class="btn btn-outline-secondary" onclick="usersAll()">All users</a></span>

    <table class="table table-bordered table-striped table-hover w-75 m-auto my-5 text-center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Test</th>
            </tr>
        </thead>
        <tbody id="tbody">

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->type)
                            {{ $user->type }}
                        @else
                            No test
                        @endif
                    </td>
                    <td class="text-center"><a href="/dashboard/userAnswers/{{ $user->id }}" class="btn btn-sm btn-dark mx-1 "><i class="fas fa-eye" ></i> </a></td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script>
        const tbody = document.getElementById('tbody');

        const usersTest = () => {
            tbody.innerHTML = `
            @foreach ($users as $user)
                @if ($user->type)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->type)
                                {{ $user->type }}
                            @else
                                No test
                            @endif
                        </td>
                        <td class="text-center"><a href="/dashboard/userAnswers/{{ $user->id }}" class="btn btn-sm btn-dark mx-1 "><i class="fas fa-eye" ></i> </a></td>
                        {{-- <td><a href="{{ route('userAnswers', ['userId' => $user->id]) }}">Show</a></td> --}}
                    </tr>
                @endif
            @endforeach
            `
        }
        const usersAll = () => {
            tbody.innerHTML = `
            @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->type)
                                {{ $user->type }}
                            @else
                                No test
                            @endif
                        </td>
                        <td class="text-center"><a href="/dashboard/userAnswers/{{ $user->id }}" class="btn btn-sm btn-dark mx-1 "><i class="fas fa-eye" ></i> </a></td>
                        {{-- <td><a href="{{ route('userAnswers', ['userId' => $user->id]) }}">Show</a></td> --}}
                    </tr>
            @endforeach
            `
        }



    </script>

</body>
</html>
