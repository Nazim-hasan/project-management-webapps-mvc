@extends('Dashboard.Developers.Layouts.DevDashboardLayout')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper" style="min-height: 460.688px;">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Project Detail</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Project Detail</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Projects Detail</h3>
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
               <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
               <i class="fas fa-times"></i>
               </button>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    
                  <div class="row">
                     <div class="col-12">
                        <h4>Task Instructions</h4>
                        <p>{{ $task->taskDetails }}</p>
                        
                        
                        <p>{{ $task->solution }}</p>

                                                
                        
                        
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
               <div class="text-left mt-5 mb-3">
                     <a href="/addContribution/{{$task->id}}" class="btn btn-sm btn-success">Add files / Contribute</a>
                     <a href="#" class="btn btn-sm btn-primary">Report contact</a>
                  </div>
                  <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $task->TaskTitle }} </h3>
                  <br>
                  <div class="text-muted">
                     <p class="text-sm">Client Company
                        <b class="d-block">Deveint Inc</b>
                     </p>
                     <p class="text-sm">Project Leader
                        <b class="d-block">Tony Chicken</b>
                     </p>
                     <p class="text-sm">Assigned Date: 
                        <b class=""> {{ $task->assignDate }} </b>
                     </p>
                  </div>
                  <h5 class="mt-5 text-muted">Project files</h5>
                  <ul class="list-unstyled">
                     <li>
                        <a href="/downloadContent/{{ $task->solution }}" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{ $task->solution }}</a>
                     </li>
                  </ul>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection