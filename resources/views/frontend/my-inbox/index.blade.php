@extends('frontend.my-inbox.layouts.inbox')

@section('css-top-mail')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">Mailbox</li>
    </ol>
@endsection

@section('sidebar-mail')
@endsection

@section('content-mail')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Inbox</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tr>
                            <td></td>
                            <td class="mailbox-name">Composer</td>
                            <td class="mailbox-subject">Subject</td>
                            <td class="mailbox-date">Last Response</td>
                        </tr>
                        <tbody>
                        @if($threads->count() > 0)
                        @foreach($threads as $thread)
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td class="mailbox-name"><img class="img-circle" style="max-height: 30px; max-width: 30px;" src="/avatar/{{$thread->creator()->steam_id}}">  <a href="{{route('inbox.show',$thread->id)}}">{{$thread->creator()->vpf}}</a></td>
                                <td class="mailbox-subject">{{$thread->subject}}</td>
                                <td class="mailbox-date">{{$thread->latestMessage->user->vpf}}<br> {{$thread->latestMessage->updated_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                            @else
                            <tr>
                                <td class="mailbox-name">No Messages Found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table><!-- /.table -->
                </div><!-- /.mail-box-messages -->
            </div><!-- /.box-body -->
            <div class="box-footer no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                </div>
            </div>
        </div><!-- /. box -->
    </div>

@endsection

@section('js-bottom-mail')
@endsection
