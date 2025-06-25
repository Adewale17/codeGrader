@extends('includes.layout')

@section('content')
    <section class="container py-5">
        <h2 class="text-center">Submit Your Code for AI Assessment</h2>
        <p class="text-center">Paste your code below and get AI-powered evaluation & corrections.</p>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="codeForm">
                    @csrf
                    <div class="mb-3">
                        <label for="languageSelect" class="form-label">Select Language:</label>
                        <select class="form-control" id="languageSelect" name="language">
                            <option value="python">Python</option>
                            <option value="javascript">JavaScript</option>
                            <option value="java">Java</option>
                            <option value="c++">C++</option>
                            <option value="csharp">C#</option>
                            <option value="php">PHP</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="codeInput" class="form-label">Enter Your Code:</label>
                        <textarea class="form-control" id="codeInput" name="code" rows="8" placeholder="Write your code here..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit Code</button>
                </form>
            </div>
        </div>

        <!-- Results Section -->
        <div class="mt-5" id="results" style="display: none;">
            <h3 class="text-center">Assessment Results</h3>
            <div class="card p-3">
                <h5 class="fw-bold">AI Feedback:</h5>
                <pre id="aiResult" class="bg-light p-3 rounded"></pre>
            </div>
        </div>
    </section>

    <!-- AJAX Script -->
    <script>
        document.getElementById('codeForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = {
                language: document.getElementById('languageSelect').value,
                code: document.getElementById('codeInput').value,
                _token: '{{ csrf_token() }}'
            };

            fetch("{{ route('submit.code') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": formData._token
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('results').style.display = "block";
                    document.getElementById('aiResult').textContent = JSON.stringify(data, null, 2);
                })
                .catch(error => {
                    alert("An error occurred. Please try again.");
                    console.error("Error:", error);
                });
        });
    </script>
@endsection
