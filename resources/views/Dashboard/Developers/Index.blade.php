@extends('Dashboard.Developers.Layouts.DevDashboardLayout')
@section('title', 'Dashboard')

@section('content')
    <!-- Custom Content here  -->
    <div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <h5>My Projects</h5>
          <table class="table table-striped projects">
               <thead>
                  <tr>
                     <th style="width: 1%">
                        #
                     </th>
                     <th style="width: 34%">
                        Project Name
                     </th>
                     <th>
                        Project Progress
                     </th>
                     <th style="width: 27%">
                        Project Details
                     </th>
                  </tr>
               </thead>
               <tbody>
               @foreach($projects as $project)
               <tr>
                     <td>{{ $project->ProjectId }}</td>
                     <td>
                        <a>
                        {{$project->projectName}}
                        </a>
                        <br>
                     </td>
                     
                     <td class="project_progress">
                        <div class="progress progress-sm">
                           <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%"></div>
                        </div>
                        <small>   
                        57% Complete
                        </small>
                     </td>
                     <td class="project-actions text-center">
                        <a class="badge-primary btn-sm" href="/projectDetails/{{$project->ProjectId}}">
                        <i class="fas fa-folder">
                        </i>
                        View 
                        </a>
                     </td>
                  </tr>
               @endforeach
               
               </tbody>
            </table>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <h5>My Tasks</h5>
          <table class="table table-striped projects">
               <thead>
                  <tr>
                     <th style="width: 1%">
                        #
                     </th>
                     <th style="width: 34%">
                        Task Title
                     </th>
                     <th>
                        Task duration
                     </th>
                     <th style="width: 30%">
                        Project Details
                     </th>
                  </tr>
               </thead>
               <tbody>
               @foreach($tasks as $task)
               <tr>
                     <td>{{ $task->id  }}</td>
                     <td>
                        <a>
                        {{$task->TaskTitle}}
                        </a>
                        <br>
                     </td>
                     
                     <td align='center'>
                        <a>
                        {{$task->deadline}}
                        </a>
                        <br>
                     </td>
                     <td class="project-actions text-center">
                        <a class="badge-success btn-sm" href="/taskDetails/{{$task->id}}">
                        <i class="fas fa-folder">
                        </i>
                        View 
                        </a>
                     </td>
                  </tr>
               @endforeach
               
               </tbody>
            </table>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

@endsection