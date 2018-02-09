@extends('layouts.app')

@section('content')

    <div class="sidebar" data-color="red" data-image="../assets/img/sidebar-1.jpg">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="logo">
            <a href="#" class="simple-text">
               Control Panel
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active">
                    <a href="/home">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="/your_data">
                        <i class="material-icons">person</i>
                        <p>Your Data</p>
                    </a>
                </li>
                <li>
                    <a href="/invoices">
                        <i class="material-icons">account_balance_wallet</i>
                        <p>Invoicing</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Your User ID: {{ Auth::user()->id }}</a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">1</span>
                                <p class="hidden-lg hidden-md">Notifications</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Downtime notifications</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group  is-empty">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="material-input"></span>
                        </div>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" data-background-color="red">
                                <h4 class="title">Dashboard</h4>
                            </div>
                            <div class="card-content">
                               Welcome to your Dashboard.
                            </div>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="content">
                                <h4 class="card-title">Support</h4>
                                <p>Load knowledge base?</p>
                                <p>Utilise the search field to load knowledge base</p>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#supportModal">
                                    Request Support
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Your Apps</h4>
                                <p class="category">Your APP Subscriptions</p>
                            </div>
                            <div class="card-content table-responsive">
                                <form action="/subscribe_process_app" method="post">
                                    {{ csrf_field() }}
                                    <input type="text" name="domain" placeholder="Domain name">
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ env('STRIPE_PUB_KEY') }}"
                                            data-email="{{ Auth::user()->email }}"
                                            data-amount="500"
                                            data-name="TriangleHost"
                                            data-description="Monthly Website Hosting"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            label="Subscribe &pound"
                                            data-currency="gbp">
                                    </script>
                                </form>
                                <table class="table">
                                    <thead class="text-primary">
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="">trianglehost.co.uk</a></td>
                                        <td>Active</td>
                                        <td><a href="/cancel_app">Cancel</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="">yourwebsite.net</a></td>
                                        <td>Active</td>
                                        <td><a href="/cancel_app">Cancel</a></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title">Email</h4>
                                    <p class="category">Your email subscriptions</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <form action="/subscribe_email" method="post">
                                        {{ csrf_field() }}
                                        <input type="text" name="domain" placeholder="Domain name">
                                        <script
                                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="{{ env('STRIPE_PUB_KEY') }}"
                                                data-email="{{ Auth::user()->email }}"
                                                data-amount="300"
                                                data-name="TriangleHost"
                                                data-description="Monthly Email Hosting"
                                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                data-locale="auto"
                                                label="Subscribe &pound"
                                                data-currency="gbp">
                                        </script>
                                    </form>
                                    <table class="table">
                                        <thead class="text-primary">
                                        <th>Domain</th>
                                        <th>Status</th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="">trianglehost.co.uk</a></td>
                                            <td>Active</td>
                                            <td><a href="/cancel_email">Cancel</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">yourwebsite.net</a></td>
                                            <td>Active</td>
                                            <td><a href="/cancel_email">Cancel</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header" data-background-color="green">
                                        <h4 class="title">DNS</h4>
                                        <p class="category">Your DNS subscriptions</p>
                                    </div>
                                    <div class="card-content table-responsive">
                                        <form action="/subscribe_dns" method="post">
                                            {{ csrf_field() }}
                                            <input type="text" name="domain" placeholder="Domain name">
                                            <script
                                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                    data-key="{{ env('STRIPE_PUB_KEY') }}"
                                                    data-email="{{ Auth::user()->email }}"
                                                    data-amount="500"
                                                    data-name="TriangleHost"
                                                    data-description="Monthly Website Hosting"
                                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                    data-locale="auto"
                                                    label="Subscribe &pound"
                                                    data-currency="gbp">
                                            </script>
                                        </form>
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th>Domain</th>
                                            <th>Status</th>
                                            <th></th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>trianglehost.co.uk</td>
                                                <td>Active</td>
                                                <td><a href="/cancel_dns">Cancel</a></td>
                                            </tr>
                                            <tr>
                                                <td>yourwebsite.net</td>
                                                <td>Active</td>
                                                <td><a href="/cancel_dns">Cancel</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="supportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Request for Support</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" id="message-text" placeholder="What do you need help with?" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>

@endsection
