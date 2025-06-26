   @extends('includes.layout')
   @section('content')
       <!-- Features Section -->
       <!-- Hero Section -->
       <header class=" text-white text-center py-5">
           <div class="container">
               <h1 class="text-secondary">Automated Code Assessment & Quality Analysis</h1>
               <p class="lead text-primary">Submit your code, get graded, and receive AI-powered corrections instantly.</p>
               <a href="/submit-code" class="btn btn-light btn-lg">Try It Now</a>
           </div>
       </header>
       <section class="container py-5">
           <h2 class="text-center">Key Features</h2>
           <div class="row text-center text-primary">
               <div class="col-md-6">
                   <h4>✅ Instant Code Grading</h4>
                   <p>Get real-time feedback on your code submissions.</p>
               </div>
               <div class="col-md-6">
                   <h4>🤖 AI-Powered Corrections</h4>
                   <p>Automatically fix errors and optimize your code.</p>
               </div>
               {{-- <div class="col-md-4">
                   <h4>📊 Performance Tracking</h4>
                   <p>View your past submissions and progress history.</p>
               </div> --}}
           </div>
       </section>

       <!-- How It Works Section -->
       <section class="bg-light py-5">
           <div class="container text-center">
               <h2>How It Works</h2>
               <div class="row mt-4">
                   <div class="col-md-4">
                       <h4>📝 Submit Your Code</h4>
                       <p>Write or paste your code in our editor.</p>
                   </div>
                   <div class="col-md-4">
                       <h4>📤 Get Instant Feedback</h4>
                       <p>Receive grading, corrections, and explanations.</p>
                   </div>
                   <div class="col-md-4">
                       <h4>📈 Improve & Learn</h4>
                       <p>Track your progress and enhance your coding skills.</p>
                   </div>
               </div>
           </div>
       </section>

       <!-- Call to Action -->
       <section class="text-center py-5">
           <h2>Start Improving Your Code Today!</h2>
           <a href="submission.html" class="btn btn-primary btn-lg mt-3">Submit Your Code</a>
       </section>
   @endsection
