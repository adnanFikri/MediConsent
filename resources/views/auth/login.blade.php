@extends('layouts.app')

<style>
    #parent{
        color: red;
        text-shadow: 2px 1px 3px orange;
    }

    :root{
        --clr: #636262;
        --clrB: #089ab7;
    }

    .parentForm{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 104vh;
        background: #1c2630;
        background: #edebeb;
        margin-top: -30px;
        margin-bottom: -150px;

        /* padding: 30px; */
    }


    form{
        background-color: #555759;
        background-color: #212b36;
        padding: 40px 70px 40px;
        text-align: center;
        display: flex;
        flex-direction: column;
        border-radius: 10px;
    }

    @media only screen and (max-width: 768px) {
        form
        {
            background-color: #29313c;
            padding: 40px 19px 40px;
            text-align: center;
            display: flex;
            flex-direction: column;
            border-radius: 10px;
        }
    }

    form h2{
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 1.25em;
        letter-spacing: 0.1em;
        margin-bottom: 30px;
    }

    .inputBox{
        position: relative;
        width: 350px;
        margin-bottom: 40px;
    }

    @media only screen and (max-width: 768px) {
        .inputBox{
            position: relative;
            width: 300px;
            margin-bottom: 40px;
        }
    }

    .inputBox input
    {
        position: relative;
        width: 100%;
        padding: 10px 0;
        background: transparent;
        border: none;
        border-bottom: 2px solid #999;
        outline: none;
        color: #fff;
        font-size: 1em;
        text-transform: uppercase;
        letter-spacing: 0.15em;

    }



    .inputBox label
    {
        position: absolute;
        left: 0;
        padding: 10px 0;
        pointer-events: none;
        color: #999;
        text-transform: uppercase;
    }

    .inputBox label span
    {
        position: relative;
        display: inline-flex;
        letter-spacing: 0.05em;
        transition: 0.2s ease-in-out;
    }

    .inputBox input:focus ~ label span,
    .inputBox input:valid ~ label span
    {
        color: var(--clrB);
        letter-spacing: 0.15em;
        transform: translateY(-25px);
        font-weight: bold;
    }

    .inputBox input:focus ,
    .inputBox input:valid
    {
        border-bottom: 2px solid var(--clrB);
    }

    .inputBox button[type="submit"]
    {
        background-color: var(--clrB);
        border: none;
        padding: 10px;
        border-radius: 50px;
        color: #1c2630;
        font-weight: bold;
        font-size: 1.15em;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        cursor: pointer;
        transition: 0.5s;
        width: 16.3em;
        margin-top: 20px;
        font-family: 'Courier New', Courier, monospace;
    }

    .inputBox button[type="submit"]:hover
    {
        letter-spacing: 0.35em;
        opacity: 0.7;
        text-shadow: 3px 2px 4px white;
    }

    form p
    {
        color: #fff;
        text-transform: uppercase;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        margin-top: -5px;
    }

    form p a
    {
        color: gray;
        color: #999;
        font-weight: 500;
        text-decoration: none;
        transition: 0.3s;
    }
    form p a:hover
    {
        text-decoration: underline;
    }

    .remember-check
    {
        margin-left: -240px;
        margin-bottom: 20px;
        margin-top: -15px;
    }

    @media only screen and (max-width: 768px) {
        .remember-check
        {
            margin-left: -180px;
            margin-bottom: 20px;
            margin-top: -15px;
        }
    }

    .remember-check label
    {
        color: #fff;

    }
    .remember-check input
    {
        margin-right: 5px;
        cursor: pointer;
    }

    .error{
        margin: 4px;
    }


</style>

@section('content')

<div class="parentForm ">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h2>{{ __('Login') }}</h2>

            <div class="inputBox">
                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label for="email" class="">{{ __('Email') }}</label>

                @error('email')
                    <span class="invalid-feedback error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="inputBox">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <label for="password" class="">{{ __('Password') }}</label>

                @error('password')
                    <span class="invalid-feedback error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="remember-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember" class="form-check-label">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="inputBox">
                <button type="submit" >
                    {{ __('Login') }}
                </button>
            </div>


            <p>
                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </p>

            <p>i don't have account! <a href="{{ route('register') }}">{{ __('Register') }}</p>

        </form>
    </div>

</div>

<script>
    let label = document.querySelectorAll("label").forEach(label => {
            label.innerHTML = label.innerText.split('').map((letters, i) => `<span style="transition-delay:${i * 50}ms">${letters}</span>`)
            .join('');
    });
    console.log(label);
</script>
@endsection
