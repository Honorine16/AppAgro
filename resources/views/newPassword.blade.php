<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Authentification</title>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body class="bg-light">
        <section class=" p-3 p-md-4 p-xl-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <div class="card border border-light-subtle rounded-4">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <h4 class="text-center">Nouveau mot de passe</h4>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('newPassword.process') }}" method="post">
                                    @csrf

                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            {!! implode('', $errors->all('<p>:message</p>')) !!}
                                        </ul>
                                    @endif
                                    @if ($message = Session::get('error'))
                                        <div>{{ $message }}</div><br />
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div>{{ $message }}</div><br />
                                    @endif
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Saisir le nouveau mot de passe ici ..." >
                                                <label for="password" class="form-label">Nouveau mot de passe</label>
                                            </div>
                                        </div><br /><br />

                                        <input type="hidden" name="email" id="email" value="{{ session()->get('email') }}">
                                        <input type="hidden" name="code" id="code" value="{{ session()->get('code') }}">

                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" value="" placeholder="Confirmer le nouveau mot de passe ici ..." >
                                                <label for="passwordConfirm" class="form-label">confirmer nouveau mot de passe</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn bsb-btn-xl btn-success py-3" type="submit">Soumettre</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
