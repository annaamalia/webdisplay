<nav class="navbar fixed-top navbar-expand-md navbar-dark mb-2 border-bottom shadow-sm">
    <div class="col">
        <a class="navbar-brand border-right h-100" href="/">
            <div class="navbar-left-header">
                <div class="main-header header-logo-left">
                    <img class="right-header" src="{{ asset('images/LOGO TACI.png') }}">
                </div>
            </div>
        </a>

        <div class="navbar-right-header h-100">
            <div class="d-flex h-100">
                <div class="col-4 my-auto">
                    <div class="float-right mr-3 mt-2">
                        <ul class="navbar-nav me-auto mx-3 my-2">
                            <a class="nav-link active" aria-current="page" href="{{ route('form.store') }}">Add Data</a>
                        </ul>
                    </div>
                </div>           
            </div>
        </div>

    </div>
</nav>