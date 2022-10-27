<div class="container-fluid dashboard-container">
    <div class="row text-center mx-0 dashboard-menu-container">
        <div class="col p-0">
            <a class="custom-rounded-border mt-2 mx-2 card text-center border-0 shadow h-100" id="factory-view"
                href="{{ route('menu.part') }}">
                <div class="card-header custom-rounded-border shadow pt-3">
                    <div class="col p-0">
                        <div class="row row-title">
                            <div class="col my-auto p-0">
                                <h6 class="card-title text-uppercase">
                                    Monitoring
                                </h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <i class="fa fa-industry" aria-hidden="true" class="card-title-icon"
                                    style="font-size:6rem"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body h-100 featured-content-wrapper">
                    <p class="card-text font-weight-light px-1">
                        Monitoring OEE and Parameter Machine
                    </p>
                </div>

                <div class="card-footer custom-rounded-border small">
                    <small class="font-weight-light">
                        Tap / click to access this feature
                    </small>
                </div>
            </a>
        </div>

        {{-- @can('admin') --}}
            {{-- <div class="col p-0">
                <a class="custom-rounded-border mt-2 mx-2 card text-center border-0 shadow h-100" id="settings"
                    href="{{ route('menu.setting') }}">
                    <div class="card-header custom-rounded-border shadow">
                        <div class="col p-0">
                            <div class="row row-title">
                                <div class="col my-auto p-0">
                                    <h6 class="card-title text-uppercase">
                                        Setting
                                    </h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <i class="fa fa-cogs" aria-hidden="true" class="card-title-icon"
                                        style="font-size:6rem"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body h-100 featured-content-wrapper">
                        <p class="card-text font-weight-light px-1">
                            Adjust Setting
                        </p>
                    </div>

                    <div class="card-footer custom-rounded-border small">
                        <small class="font-weight-light">
                            Tap / click to access this feature
                        </small>
                    </div>
                </a>
            </div> --}}
        {{-- @endcan --}}

    </div>
</div>
