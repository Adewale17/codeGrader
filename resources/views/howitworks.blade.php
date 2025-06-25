@extends('includes.layout')
@section('content')
    <!-- How It Works Section -->
    <section class="container py-5">
        <h2 class="text-center mb-4">How It Works</h2>
        <p class="text-center">Follow these simple steps to use the CodeEvaluator AI system.</p>

        <div class="row text-center">
            <div class="col-md-4">
                <div class="card p-4">
                    <h4>Step 1</h4>
                    <p>Write or paste your code in the <b>Code Submission Page</b>.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4">
                    <h4>Step 2</h4>
                    <p>Click on the <b>Submit Code</b> button to analyze your code instantly.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4">
                    <h4>Step 3</h4>
                    <p>Receive your <b>Grade, Corrected Code </b>, and suggestions automatically.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="code-submission.html" class="btn btn-primary btn-lg">Submit Your Code</a>
        </div>
    </section>
@endsection
