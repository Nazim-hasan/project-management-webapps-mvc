@extends('Dashboard.Developers.Layouts.DevDashboardLayout')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
<table class="table table-border">
        <tr>
            <th>Project ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Assign Date</th>
            <th>Deadline</th>
            <th>Status</th>

        </tr>
        @foreach($projects as $project)
        <tr>
            <td>{{$project->ProjectId}}</td>
            <td>{{$project->projectName}}</td>
            <td>{{$project->projectDetails}}</td>
            <td>{{$project->assignDate}}</td>
            <td>{{$project->deadline}}</td>
            <td>{{$project->status}}</td>
            

        </tr>
        @endforeach
        
    </table>
</div>

@endsection