<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>👨🏻‍💻Grader</title>
        {{-- @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href ="{{ asset('assets/css/styles.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation Bar -->
   <nav class="nav-header navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
    <a class="navbar-brand d-flex align-items-center fw-bold fs-4 text-dark" href="#">
  <span class="d-inline-flex justify-content-center align-items-center me-2"
        style="width: 40px; height: 40px; font-size: 1.2rem; border: 2px solid #0d6efd; border-radius: 50%; background-color: #e7f1ff;">
    👨🏻‍💻
  </span>
  <span style="color: white;">CodeGrader</span>
</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav ">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/submit-code">Submit Code</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('code.history') }}">History</a></li>
                <li class="nav-item"><a class="nav-link" href="/howitworks">How It Works</a></li>

                @guest
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


    @yield('content')

    <!-- Footer -->
    <footer class="bg-info text-white text-center py-3 mt-auto">
        <p>&copy; 2025 CodeEvaluator AI. All Rights Reserved.</p>
    </footer>
<!-- CodeMirror Core -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>

<!-- CodeMirror JavaScript Mode -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>

<!-- Initialize CodeMirror -->
<script>
  const editor = CodeMirror.fromTextArea(document.getElementById("codeInput"), {
    lineNumbers: true,
    mode: "javascript",
    theme: "monokai", // Or change to 'monokai', 'dracula', etc. (you’ll need to add theme CSS for those)
    indentUnit: 4,
    tabSize: 4
  });
</script>

</body>

</html>

