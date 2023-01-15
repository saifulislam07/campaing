@extends('admin.masterTemplate')

@section('menu-name')
    ALL MESSAGES
@endsection
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">ALL MESSAGES</h5>
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
                                <h3 class="card-title"> <i class="fa fa-users"></i> All Messages</h3>
                                <a href="{{ route('cmessage') }}" class="float-right btn btn-sm btn-primary"> <i
                                        class="fa fa-plus"></i> Create</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Campaign Name</th>
                                            <th>Message</th>
                                            <th>Delay Time</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($message as $key => $value)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $value->camp->campaign_name }}</td>
                                                <td>{{ $value->message }}</td>
                                                <td>{{ $value->delay }}</td>
                                                <td>
                                                    <a href="" class="btn btn-xs btn-info"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="" class="btn btn-xs btn-danger"><i
                                                            class="fas fa-trash-alt"></i></a>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
