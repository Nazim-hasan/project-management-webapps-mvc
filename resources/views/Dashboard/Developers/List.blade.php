@extends('Dashboard.Developers.Layouts.DevDashboardLayout')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
<table class="table table-border">
        <tr></tr>
            <th>Project ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Assign Date</th>
            <th>Deadline</th>
            <th>Status</th>

        </tr>
        <tr><td>{{ $projects }}</td></tr>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->commentsId }}</td>

        </tr>
        @endforeach
        
    </table>
</div>

@endsection