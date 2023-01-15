@extends('admin.masterTemplate')

@section('menu-name')
    My Subscription
@endsection
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark"> My Subscription</h5>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <hr class="style18">

        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-12">
                        <div class="card">
                            <div class="card-header bg-cyan">
                                <h3 class="card-title"> <i class="fa fa-users"></i> My Subscription</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">

                                    @foreach ($campaignForUser as $each)
                                        <div class="col-md-4 col-sm-6 col-12">
                                            <div class="info-box bg-info">
                                                <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">{{ $each->campaign_name }}</span>
                                                    <span class="info-box-number" style="color : orange">From :
                                                        {{ $each->from_date }} - To : {{ $each->to_date }} </span>
                                                    <div class="progress">
                                                        <div class="progress-bar" style="width: 70%"></div>
                                                    </div>
                                                    <span class="progress-description">
                                                        {{ $each->campaign_description }}
                                                    </span>


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
<!-- Content Wrapper. Contains page content -->
