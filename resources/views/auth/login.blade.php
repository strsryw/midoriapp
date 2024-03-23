<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MIDORI - Login</title>

    <!-- CSS files -->
    <link href="/dist/css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="/dist/css/demo.min.css?1692870487" rel="stylesheet" />

    {{-- Style Font --}}
    <link rel="stylesheet" href="/assets/web/style.css">
</head>

<body class=" d-flex flex-column">
    <script src="/dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login</h2>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" id="password" name="password">
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show password"
                                        data-bs-toggle="tooltip">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-success w-100" id="btnLogin">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->

    <!-- Tabler Core -->
    <script src="/dist/js/tabler.min.js"></script>
    <script src="/dist/js/demo.min.js"></script>
    <script src="/assets/web/jquery-3.7.1.min.js"></script>
    <script src="/assets/web/script.js"></script>
    <script>
        $(document).ready(function() {

            $('#btnLogin').on('click', function(e) {
                e.preventDefault();

                const data = {
                    email: $('#email').val(),
                    password: $('#password').val()
                }

                $.ajax({
                    type: "POST",
                    url: '{{ route('login') }}',
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        if (response.status) {
                            window.location.href = response.data;
                        } else {
                            console.log(response.message)
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
</body>

</html>
