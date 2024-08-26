<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jonathan Teixeira">
    <link rel="icon" href="{{ URL::to('img/logo.ico') }}">
    <title>Área de Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrapcore.min.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/signin.css') }}">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>

    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/jquery.form.min.js') }}"></script>

</head>

<body class="text-center">

    <main class="form-signin">
        @if ($errors->any())
            @foreach ($errors->all() as $error)

            @endforeach
        @endif
        
        <form name="formLogin">
            @csrf
            <img class="mb-4" src="img/logo3.png" alt="logo" width="282" height="77">

            <div class="alert alert-danger d-none messageBox" role="alert">

            </div>
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="Digitar o Email" value="{{ old('email') }}">
                <label for="floatingInput">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    placeholder="Senha">
                <label for="floatingPassword">Senha</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!--<div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Lembrar dados
                </label>
            </div>-->
            
            <button class="w-100 btn btn-lg btn-primary mb-1" type="submit">Acessar</button><br>



            <p class="mt-5 mb-3 text-muted">&copy; 2022 - Sistema de Controle de Abrigado</p>
        </form>
    </main>

<script>
    $(function(){
        $('form[name="formLogin"]').submit(function(event){
            event.preventDefault();

            $.ajax({
                url: "{{ route('login.post') }}",
                type: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response){

                    if(response.success === true) {
                        window.location.href="{{ route('/')}}";
                    } else {
                        $('.messageBox').removeClass('d-none').html(response.message);
                    }
                    console.log(response);
                }
            });
        });
    });

</script>

</body>

</html>
