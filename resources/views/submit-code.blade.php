@extends('includes.layout')

@section('content')
<section class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">💻 Submit Your Code for AI Assessment</h2>
        <p class="text-muted">Paste your code and receive instant feedback & suggestions.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <form id="codeForm">
                        @csrf
                        <div class="mb-3">
                            <label for="languageSelect" class="form-label fw-semibold">Select Programming
                                Language:</label>
                            <select class="form-select" id="languageSelect" name="language" required>
                                <option selected disabled>-- Choose a Language --</option>
                                <option value="python">🐍 Python</option>
                                <option value="javascript">🟨 JavaScript</option>
                                <option value="java">☕ Java</option>
                                <option value="c++">🔷 C++</option>
                                <option value="csharp">#️⃣ C#</option>
                                <option value="php">🐘 PHP</option>
                            </select>
                        </div>

                        <div class="mb-3">
      <label for="codeInput" class="form-label fw-semibold">Enter Your Code:</label>
      <textarea id="codeInput" name="code" placeholder="..................."></textarea>
    </div>

                        <button type="submit" class="btn btn-info w-25 mx-auto d-block">
                            Submit for Evaluation
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- spinner --}}
<div id="loadingSpinner" class="text-center my-4" style="display: none;">
    <div class="spinner-border text-info" role="status" style="width: 3rem; height: 3rem;">
        <span class="visually-hidden">Loading...</span>
    </div>
    <p class="mt-2 text-info">Analyzing your code...</p>
</div>
    <!-- Results Section -->
  <div class="row justify-content-center mt-5" id="results" style="display: none;">
    <div class="col-lg-12">
        <div class="card border-info shadow-sm position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Close"
                onclick="document.getElementById('results').style.display='none'"></button>

            <div class="card-header bg-info text-white text-center">
                <h5 class="mb-0"> Corrections Version</h5>
            </div>

            <div class="card-body">
                <div class="bg-dark text-light rounded p-3 shadow-sm" style="
                    font-family: 'Fira Code', 'Courier New', monospace;
                    white-space: pre-wrap;
                    overflow-x: auto;
                    border-left: 5px solid #0dcaf0;
                    max-height: 500px;
                ">
                    <pre id="aiResult" class="m-0" style="background: transparent; border: none;"></pre>
                </div>
            </div>
        </div>
    </div>
</div>

</section>



<!-- AJAX Script -->
<script>
    document.getElementById('codeForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Show spinner
        document.getElementById('loadingSpinner').style.display = 'block';
        document.getElementById('results').style.display = 'none';

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
            // Hide spinner
            document.getElementById('loadingSpinner').style.display = 'none';

            // Show results
            document.getElementById('results').style.display = 'block';

            let output = '';
            if (typeof data.corrected_code === 'string') {
                output = data.corrected_code.replace(/```[\s\S]*?\n?/, '').replace(/```$/, '');
            } else {
                output = JSON.stringify(data, null, 2);
            }

            document.getElementById('aiResult').innerText = output;
        })
        .catch(error => {
            // Hide spinner
            document.getElementById('loadingSpinner').style.display = 'none';
            alert("An error occurred while submitting your code. Please try again.");
            console.error("Error:", error);
        });
    });
</script>


@endsection


