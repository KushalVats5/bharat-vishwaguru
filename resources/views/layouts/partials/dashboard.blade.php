@role('super-admin')
<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">

            <div class="card card-stats">
                <a href="{{ route('users.index') }}">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Users</p>
                                    <p class="card-title">{{ App\User::userCount() }}
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href="#">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Example</p>
                                    <p class="card-title">123
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i> Last day
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href="{{ route('login-activities') }}">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Login Activity</p>
                                    <p class="card-title">
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> In the last hour
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-favourite-28 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Visitors</p>
                                <p class="card-title">{{ App\Tracker::getCount() }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i> Update now
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Users Behavior</h5>
                    <p class="card-category">24 Hours performance</p>
                </div>
                <div class="card-body ">
                    <canvas id=chartHours width="400" height="100"></canvas>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Email Statistics</h5>
                    <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-body ">
                    <canvas id="chartEmail"></canvas>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-primary"></i> Opened
                        <i class="fa fa-circle text-warning"></i> Read
                        <i class="fa fa-circle text-danger"></i> Deleted
                        <i class="fa fa-circle text-gray"></i>
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar"></i> Number of emails sent
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">NASDAQ: AAPL</h5>
                    <p class="card-category">Line Chart with Points</p>
                </div>
                <div class="card-body">
                    <canvas id="speedChart" width="400" height="100"></canvas>
                </div>
                <div class="card-footer">
                    <div class="chart-legend">
                        <i class="fa fa-circle text-info"></i>
                        <i class="fa fa-circle text-warning"></i>
                    </div>
                    <hr />
                    <div class="card-stats">
                        <i class="fa fa-check"></i> Data information certified
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole

@role('admin')
<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">

            <div class="card card-stats">
                <a href="{{ route('users.index') }}">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Users</p>
                                    <p class="card-title">{{ App\User::userCount() }}
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    @endrole

    @role('user')

    <div class="content">
        <div class="row">
            <div class="">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="numbers">
                                    <p class="card-category">Total Subscriptions</p>
                                    <p class="card-title">{{auth()->user()->subscriptions()->count()}}
                                    <p>
                                        {{--@foreach ($data as $item)
              filled data -> {{$item->requirements}}<br>
                                        status -> {{$item->status}}

                                        @endforeach--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{ route('subscriptions.index') }}">
                                <i class="fa fa-eye"></i>&nbsp;View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @php $UserPaymen = auth()->user()->subscriptions()->get(); @endphp
                @php
                $paydone = App\UserPayment::where('user_id', auth()->id())->where('is_active',
                true)->where('order_status','Success')->first();
                //dd($paydone, auth()->id());
                @endphp
                @if ($paydone)
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dt-mant-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Form Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($paydone->user_plan_id == 1)
                                    <tr>
                                        <td>{{1}}</td>
                                        <td>Gst Registration</td>
                                        <td>
                                            <a href="{{route('gstform')}}" target="_blank">
                                                <button class="btn btn-success btn-sm"><i class="fa fa-eye"></i>
                                                    Show</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @if ($paydone->user_plan_id == 2)
                                    <tr>
                                        <td>{{1}}</td>
                                        <td>Gst Registration</td>
                                        <td>
                                            <a href="{{route('gstform')}}" target="_blank">
                                                <button class="btn btn-success btn-sm"><i class="fa fa-eye"></i>
                                                    Show</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{1}}</td>
                                        <td>MSME Form</td>
                                        <td>
                                            <a href="{{route('memeform')}}" target="_blank">
                                                <button class="btn btn-success btn-sm"><i class="fa fa-eye"></i>
                                                    Show</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                @endif
            </div>
        </div>
    </div>
    @endrole