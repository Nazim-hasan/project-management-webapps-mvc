@extends('Dashboard.Developers.Layouts.DevDashboardLayout')
@section('title', 'Dashboard')
@section('content')

<div class="content-wrapper" style="min-height: 1604.44px;">
    <!-- Content wrapper start -->
    <div class="content">

        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">

                    <!-- Row start -->
                    <div class="row no-gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-9 col-9">
                            <div class="chat-container">
                                <h6>Joined in Chat as <span id="username-name">{{ Session::get('user') }}</span></h4>
                                <ul class="chat-box chatContainerScroll" id="persons">
                                    
                                    <div class="" id="message-show"></div>
                                    </li>
                                    
                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <form id="message_form">
                                    <textarea class="form-control" rows="3" placeholder="Type your message here..."  name="message" id="massage_input" ></textarea>
                                    <button class="btn btn-primary" type="submit" id="message_send">Send Message</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->

</div>

</div>
<script src="./js/app.js"></script>

@endsection