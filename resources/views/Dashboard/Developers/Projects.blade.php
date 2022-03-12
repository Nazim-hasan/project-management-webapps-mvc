@extends('Dashboard.Developers.Layouts.DevDashboardLayout')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper" style="min-height: 1604.44px;">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Projects</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Projects</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Projects</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
               <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
               <i class="fas fa-times"></i>
               </button>
            </div>
         </div>
         <div class="card-body p-0">
            <table class="table table-striped projects">
               <thead>
                  <tr>
                     <th style="width: 1%">
                        #
                     </th>
                     <th style="width: 20%">
                        Project Name
                     </th>
                     <th style="width: 30%">
                        Team Members
                     </th>
                     <th>
                        Project Progress
                     </th>
                     <th style="width: 20%">
                        Project Details
                     </th>
                  </tr>
               </thead>
               <tbody>
               @foreach($projects as $project)
               <tr>
                     <td>
                     {{$project->ProjectId}}
                     </td>
                     <td>
                        <a>
                        {{$project->projectName}}
                        </a>
                        <br>
                        <small>
                        {{$project->assignDate}}
                        </small>
                     </td>
                     <td>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                           </li>
                           <li class="list-inline-item">
                              <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                           </li>
                           <li class="list-inline-item">
                              <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                           </li>
                           <li class="list-inline-item">
                              <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                           </li>
                        </ul>
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
                        <a class="btn btn-primary btn-sm" href="/projectDetails/{{$project->ProjectId}}">
                        <i class="fas fa-folder">
                        </i>
                        View Details
                        </a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>
@endsection