<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - THE POKEDEX</title>
    <meta name="description" content="This is a usefull website. Used to track things that two dumb peoples are wanting to track.
Here there is some userfull features to use.

You can for exemple add some letters in your pokedex

This is a Bingo-like website !

Some things to know before starting :
- THE POKEDEX stores a log file to track all activities
- You can add some POKEMON to the site
- If a POKEMON is added twice, it return to the &quot;unvalidate&quot; state
- It's dangerous to go alone
- DO NOT TALK OF THE POKEDEX
- THE POKDEX DOES NOT EXIST
- OR IT WILL FIND YOU !">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">THE POKEDEX</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index">A[Q]UEIL</a></li>
                    <li class="nav-item"><a class="nav-link" href="../about-us">A Propos</a></li>
                </ul><a class="btn btn-primary account" role="button" style="margin-right: 1vw;" href="loginto">con nexion</a><a class="btn btn-primary account" role="button" href="registration">inscription</a>
            </div>
        </div>
    </nav>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Se con necter</h2>
                    <p>La con nexion entre deux pairs peut parfois être particulière ou inclusive. Mais l'abhération créé souvent disgrâce et panique dans le pacifique. Les crêpes en sont alors d'autant plus chaudes. Parfois même des brûlures se font ressentir.</p>
                </div><x-auth-session-status class="mb-4" :status="session('status')" />
<x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('loginto') }}">@csrf
                    <div class="mb-3"><x-label class="form-label" for="email" :value="__('Euh-Mail')" />
<x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus /></div>
                    <div class="mb-3"><x-label class="form-label" for="password" :value="__('Mot de passe par trous')" />
<x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" /></div>
                    <div class="mb-3">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox" name="remember"><label class="form-check-label" for="checkbox">Se sous venir sur moi</label></div>
                    </div>@if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('T\'as mépo ton passdé mon reuf ?') }}
                    </a>
                @endif
<x-button class="btn btn-primary">{{ __('Con nectar') }}</x-button>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="footer-copyright">
            <p style="color: #403740;">© 2022 Copyright POKESEX</p>
        </div>
    </footer>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="../assets/js/script.min.js"></script>
</body>

</html>