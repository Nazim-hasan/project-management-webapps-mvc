@extends('Dashboard.Developers.Layouts.DevDashboardLayout')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper" style="min-height: 1604.44px;">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Tasks</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Tasks</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Tasks</h3>
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
                     <th>
                        #
                     </th>
                     <th>
                        Task Title
                     </th>
                     <th>
                        Solution File
                     </th>
                     <th>
                        View More
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
                     
                     <td align=''>
                        <a href="/downloadContent/{{$task->solution}}">
                        {{$task->solution}}
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
   </section>
</div>
@endsection