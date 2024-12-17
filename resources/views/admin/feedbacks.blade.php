@extends('admin.layout')

@section('title', 'Manage Customer Feedback')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Pending Feedbacks -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Pending Feedbacks</h4>
                </div>
                <div class="card-body">
                    @if($pendingFeedbacks->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Rating</th>
                                        <th>Feedback</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendingFeedbacks as $feedback)
                                        <tr>
                                            <td>{{ $feedback->user->name }}</td>
                                            <td>
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $feedback->rating)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </td>
                                            <td>{{ $feedback->feedback }}</td>
                                            <td>{{ $feedback->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('admin.feedback.approve', $feedback->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                    </form>
                                                    <form action="{{ route('admin.feedback.decline', $feedback->id) }}" method="POST" class="d-inline ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No pending feedbacks</p>
                    @endif
                </div>
            </div>

            <!-- Approved Feedbacks -->
            <div class="card">
                <div class="card-header">
                    <h4>Approved Feedbacks</h4>
                </div>
                <div class="card-body">
                    @if($approvedFeedbacks->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Rating</th>
                                        <th>Feedback</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($approvedFeedbacks as $feedback)
                                        <tr>
                                            <td>{{ $feedback->user->name }}</td>
                                            <td>
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $feedback->rating)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </td>
                                            <td>{{ $feedback->feedback }}</td>
                                            <td>{{ $feedback->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <form action="{{ route('admin.feedback.decline', $feedback->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center">No approved feedbacks</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection