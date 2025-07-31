    <!-- Header avec navigation -->
    <div class="bg-light border-bottom mb-4">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-md-6">
                    <h2 class="mb-0">
                        <a href="{{ url('/') }}" class="text-decoration-none text-dark">
                            <i class="fas fa-tshirt me-2"></i>T-Shirt Store
                        </a>
                    </h2>
                </div>
                <div class="col-md-6 text-end">
                    <div class="btn-group" role="group">
                        <a href="{{ url('/') }}" class="btn btn-outline-primary">
                            <i class="fas fa-home"></i> Accueil
                        </a>
                        <a href="{{ url('/cart') }}" class="btn btn-outline-primary">
                            <i class="fas fa-shopping-cart me-1"></i> Panier
                        </a>

                        @guest
                            <a href="{{ route('register') }}" class="btn btn-outline-info">
                                <i class="fas fa-user-plus"></i> S'inscrire
                            </a>
                        @else
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu">
                                    @if(Auth::user()->isAdmin())
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                <i class="fas fa-cog"></i> Administration
                                            </a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="fas fa-tachometer-alt"></i> Tableau de bord
                                        </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            <i class="fas fa-sign-in-alt me-2"></i>Connexion
                        </h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1"></i>Adresse email
                                </label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required autocomplete="email" autofocus
                                       placeholder="votre@email.com">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>Mot de passe
                                </label>
                                <div class="input-group">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           required autocomplete="current-password"
                                           placeholder="Votre mot de passe">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Se souvenir de moi
                                </label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                        <i class="fas fa-key me-1"></i>Mot de passe oublié ?
                                    </a>
                                @endif
                            </div>

                            <hr>

                            <div class="text-center">
                                <p class="mb-0">Pas encore de compte ?</p>
                                <a href="{{ route('register') }}" class="btn btn-outline-success">
                                    <i class="fas fa-user-plus me-2"></i>Créer un compte
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header bg-info text-white">
                        <h6 class="mb-0">
                            <i class="fas fa-info-circle me-2"></i>Comptes de test
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Administrateur :</strong><br>
                                <small class="text-muted">
                                    Email: admin@tshirt.com<br>
                                    Mot de passe: admin123
                                </small>
                            </div>
                            <div class="col-md-6">
                                <strong>Utilisateur :</strong><br>
                                <small class="text-muted">
                                    Créez votre compte ou<br>
                                    utilisez le formulaire d'inscription
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');

            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>

