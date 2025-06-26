@extends('includes.layout')

@section('content')
<!-- Hero Section -->
<header class="bg-info text-white text-center py-5">
    <div class="container">
        <h1 class="display-3 fw-bold">Code Grader</h1>
        <p class="lead fs-4">Submit your code, get smart corrections, and improve instantly.</p>
        <a href="/submit-code" class="btn btn-light btn-lg shadow rounded-pill px-4 mt-4">Try It Now</a>
    </div>
</header>

<!-- Full Page Content Section -->
<section class="bg-white py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <img src="{{ asset("assets/img/code.png") }}" alt="Code illustration" class="img-fluid rounded-4 shadow">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold text-dark mb-3">Why Choose Code Grader?</h2>
                <p class="fs-5">Code Grader provides a seamless experience for developers to analyze, correct, and enhance their code efficiently. With a user-friendly interface and powerful AI assistance, you can focus on improving your logic and structure while we handle the rest. Whether you're learning or refining your skills, our tool is built to support your growth journey.</p>
                <a href="/submit-code" class="btn btn-info btn-lg mt-3 rounded-pill px-4">Submit Your Code</a>
            </div>
        </div>
    </div>
</section>

<!-- Final Call to Action -->
<section class="bg-info text-white text-center py-5">
    <div class="container">
        <h2 class="fw-bold display-5">Ready to Elevate Your Coding Skills?</h2>
        <p class="fs-5">Let our AI help you become a better, faster, and more confident developer.</p>
        <a href="/submit-code" class="btn btn-light btn-lg mt-3 rounded-pill px-5"> Get Started Now</a>
    </div>
</section>
@endsection
