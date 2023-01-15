@extends('admin.masterTemplate')

@section('menu-name')
Add Campaign
@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Add Campaigns</h5>
                </div><!-- /.col -->
                <div class="col-sm-6 ">
                    <a href="{{ route('campaigns') }}" class="btn btn-sm btn-info float-right"><i
                            class="fa fa-plus-square"></i> ALL Campaigns</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr class="style18">
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-blue text-center"> ADD NEW Campaigns </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="POST" action="{{ route('storecampaigns') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" id=""
                                                    placeholder="Campaign Name" name="campaign_name">
                                            </div>
                                            <div class="col">
                                                <label for="">From Date - To Date</label>
                                                <div class="input-group date" id="reservationdatetime"
                                                    data-target-input="nearest">
                                                    <input name="from_date" type="text" class="form-control datetimepicker-input"
                                                        data-target="#reservationdatetime" />
                                                    <div class="input-group-append" data-target="#reservationdatetime"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col">
                                                <label for="">From Date - To Date</label>
                                                <div class="input-group date" id="reservationdatetime2"
                                                    data-target-input="nearest">
                                                    <input name="to_date" type="text" class="form-control datetimepicker-input"
                                                        data-target="#reservationdatetime2" />
                                                    <div class="input-group-append" data-target="#reservationdatetime2"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">Description</label>
                                                <textarea type="text" class="form-control" id=""
                                                    placeholder="Campaign description"
                                                    name="campaign_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="submit" class="btn btn-info btn-block">SAVE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- /.tab-pane -->


                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div><!-- /.container-fluid -->
<!-- /.content -->

@endsection
<!-- Content Wrapper. Contains page content -->