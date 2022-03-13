@extends('Dashboard.Developers.Layouts.DevDashboardLayout')
@section('title', 'Dashboard')
@section('content')
@if($userInfo) 
<div class="content-wrapper" style="min-height: 1604.44px;">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href=".">Home</a></li>
                  <li class="breadcrumb-item active">User Profile</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-3">
               <div class="card card-primary card-outline" style="margin-bottom: 0px;">
                  <div class="card-body box-profile">
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user1-128x128.jpg" alt="User profile picture">
                     </div>
                     <h3 class="profile-username text-center">{{ $userInfo->userName }}</h3>
                     <p class="text-muted text-center">{{ $userInfo->role }}</p>
                     
                  </div>
               </div>
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">About Me</h3>
                  </div>
                  <div class="card-body">
                     <strong><i class="fas fa-book mr-1"></i> Education</strong>
                     <p class="text-muted">
                     {{ $userInfo->education }}
                     </p>
                     <hr>
                     <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                     <p class="text-muted">{{ $userInfo->address }}</p>
                     <hr>
                     <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                     <p class="text-muted">
                        <span class="tag tag-danger">{{ $userInfo->skills }}</span>
                     </p>
                     <hr>
                     <strong><i class="far fa-file-alt mr-1"></i> Contact no.</strong>
                     <p class="text-muted">{{ $userInfo->phone }}</p>
                  </div>
               </div>
            </div>
            <div class="col-md-9">
               <div class="card">
                  <div class="card-header p-2">
                     <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                     </ul>
                  </div>
                  <div class="card-body">
                     <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                           @foreach($comments as $comment)
                           <div class="post">
                              <div class="user-block">
                                 <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                 <span class="username">
                                 <a href="/myProfile">{{ $comment->userName }}</a>
                                 </span>
                                 <span class="description">Commented on a task</span>
                              </div>
                              <p>
                              {{ $comment->comment }}
                              </p>
                              <p>
                                 <!-- <a href="." class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a> -->
                                 <!-- <a href="." class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a> -->
                                 <!-- <span class="float-right">
                                 <a href="." class="link-black text-sm">
                                 <i class="far fa-comments mr-1"></i> Comments (5)
                                 </a>
                                 </span> -->
                              </p>
                              <!-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> -->
                           </div>
                           @endforeach
                           
                        </div>
                        
                        <div class="tab-pane" id="settings">
                           <form class="form-horizontal" action="{{route('myProfile')}}" method="post">
                           {{csrf_field()}}
                              <div class="form-group row">
                                 <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" name="userName" placeholder="Name" value="{{ $userInfo->userName }}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                 <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" name="email"  placeholder="Email" value="{{ $userInfo->email }}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                                 <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputName2" name="password"  placeholder="Password" value="{{ $userInfo->password }}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputAddress" name="address"  placeholder="Address" value="{{ $userInfo->address }}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPhone" name="phone"  placeholder="Phone" value="{{ $userInfo->phone }}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputEducation" class="col-sm-2 col-form-label">Education</label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEducation" name="education"  placeholder="Education" value="{{ $userInfo->education }}"></input>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" name="skills"  placeholder="Skills" value="{{ $userInfo->skills }}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="offset-sm-2 col-sm-10">
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> I agree to the <a href=".">terms and conditions</a>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endif
@endsection