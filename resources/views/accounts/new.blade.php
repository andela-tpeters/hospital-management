@extends('layouts.app')

@section('content')


  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Account for {{$patient->name}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('account.save') }}">
                        {!! csrf_field() !!}

                        

                        <div class="form-group">
                            <label class="col-md-4 control-label">Purpose</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="purpose" >

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="amount" >

                              
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Add Account
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection