@extends('includes.layout')

@section('content')
<section class="container py-2">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissions as $submission)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucfirst($submission->language) }}</td>
                    <td>
                        <pre class="small text-dark">{{ $submission->code }}</pre>
                    </td>
                    <td>
                        <pre class="small text-dark">{{ $submission->ai_feedback }}</pre>
                    </td>
                    <td>{{ $submission->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <a href="{{ route('history.destroy', $submission->id) }}"
   onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this history?')) document.getElementById('delete-form-{{ $submission->id }}').submit();"
   class="btn btn-danger btn-sm">Delete</a>

<form id="delete-form-{{ $submission->id }}" action="{{ route('history.destroy', $submission->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
                    </td>
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
