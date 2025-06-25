@extends('includes.layout')
@section('content')
    <!-- History Section -->
    <section class="container py-5">
        <h2 class="text-center mb-4">Your Code Submission History</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Submission Date</th>
                        <th>Original Code</th>
                        <th>Grade</th>
                        <th>Corrected Code</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2025-02-28</td>
                        <td>
                            <pre>print("Helo World")</pre>
                        </td>
                        <td>B</td>
                        <td>
                            <pre>print("Hello World")</pre>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2025-02-27</td>
                        <td>
                            <pre>def add(a, b) return a + b</pre>
                        </td>
                        <td>C</td>
                        <td>
                            <pre>def add(a, b): return a + b</pre>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
