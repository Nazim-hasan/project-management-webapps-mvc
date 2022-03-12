@extends('Dashboard.Developers.Layouts.DevDashboardLayout')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper" style="min-height: 1604.44px;">
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
                     <div class="col-12 col-sm-4">
                        <div class="info-box bg-success">
                           <div class="info-box-content">
                              <span class="info-box-text text-center text-white">Estimated budget</span>
                              <span class="info-box-number text-center text-white mb-0">{{$project->budget}}</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="info-box bg-danger">
                           <div class="info-box-content">
                              <span class="info-box-text text-center text-white">Total amount spent</span>
                              <span class="info-box-number text-center text-white mb-0">{{$project->amountSpent}}</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-sm-4">
                        <div class="info-box bg-warning">
                           <div class="info-box-content">
                              <span class="info-box-text text-center text-white">Estimated project duration</span>
                              <span class="info-box-number text-center text-white mb-0">{{$project->deadline}}</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <h4>Recent Activity</h4>
                        @foreach($comments as $comment)
                        <div class="post clearfix">
                           <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                              <span class="username">
                              <a href="#">{{ $comment->userName }}</a>
                              </span>
                              <span class="description">Commented on this project</span>
                           </div>
                           <p>
                           {{ $comment->comment }}
                           </p>
                           <p>
                              <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                           </p>
                        </div>

                        @endforeach
                        <form class="form-horizontal"  action="{{route('commentSubmit')}}" method="post">
                        {{csrf_field()}}
                        <input class="form-control form-control-sm" type="text" name="projectId" value="{{$project->ProjectId }}" placeholder="Type a Project ID" style="width: 0%">
                        <input class="form-control form-control-sm" type="text" name="comment" placeholder="Type a comment">
                        <input type="submit" value="submit" class="btn-sm btn-success mt-2">
                        </form>
                        
                        
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
               <div class="text-left mt-5 mb-3">
                     <!-- <a href=" {{ route('addContribution') }}" class="btn btn-sm btn-primary">Add files / Contribute</a> -->
                     <a href="#" class="btn btn-sm btn-primary">Report contact</a>
                  </div>
                  <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$project->projectName}}</h3>
                  <p class="text-muted"> {{$project->projectName}} </p>
                  <br>
                  <div class="text-muted">
                     <p class="text-sm">Client Company
                        <b class="d-block">Deveint Inc</b>
                     </p>
                     <p class="text-sm">Project Leader
                        <b class="d-block">Tony Chicken</b>
                     </p>
                     <p class="text-sm">Assigned Date: 
                        <b class="">{{$project->assignDate}}</b>
                     </p>
                  </div>
                  <h5 class="mt-5 text-muted">Project files</h5>
                  <ul class="list-unstyled">
                     <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                     </li>
                     <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                     </li>
                     <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                     </li>
                     <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                     </li>
                     <li>
                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                     </li>
                  </ul>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection