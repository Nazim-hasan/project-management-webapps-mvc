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
      <form action="{{ route('addContribution') }}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}   
      <div class="card-body">
            <div class="form-group">
               <input class="form-control" id="exampleInputPassword1" placeholder="ID" value="{{$taskId}}" name="id">
            </div>
            <div class="form-group">
               <label for="exampleInputFile">File input</label>
               <div class="input-group">
                  <div class="custom-file">
                  <input class="custom-file-input" id="exampleInputFile" type="file" name="file">
                     <!-- <input type="file" class="custom-file-input" id="exampleInputFile" name="solution"> -->
                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                     <span class="input-group-text">Upload</span>
                  </div>
               </div>
            </div>
            <div class="form-check">
               <input type="checkbox" class="form-check-input" id="exampleCheck1">
               <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
         </div>
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
      </form>
   </section>
</div>
@endsection