@extends('includes.layout')

@section('content')
<section class="container py-2">
    <h2 class="text-center mb-4">📜 Code Submission History</h2>

    @if($submissions->count())
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-info">
                    <tr>
                        <th>S/N</th>
                        <th>Language</th>
                        <th>Code</th>
                        <th>AI Feedback</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($submissions as $submission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($submission->language) }}</td>
                            <td><pre class="small text-dark">{{ $submission->code }}</pre></td>
                            <td><pre class="small text-dark">{{ $submission->ai_feedback }}</pre></td>
                            <td>{{ $submission->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
    {{ $submissions->links('pagination::bootstrap-5') }}
</div>
    @else
        <div class="alert alert-warning text-center">No code submissions found.</div>
    @endif
</section>
@endsection
