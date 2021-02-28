@extends('admin.layout.base')

@section('title', 'User Review')

@section('content')

        <div class="container-fluid">
            
            <div class="card">
                <div class="card-header card-header-primary">
                  <h5 class="card-title ">@lang('admin.review.User_Reviews')</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.review.transaction_id')</th>
                            <th>@lang('admin.request.User_Name')</th>
                            <th>@lang('admin.request.Provider_Name')</th>
                            <th>@lang('admin.review.Rating')</th>
                            <th>@lang('admin.request.Date_Time')</th>
                            <th>@lang('admin.review.Comments')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($page = ($pagination->currentPage-1)*$pagination->perPage)
                    @foreach($Reviews as $index => $review)
                    @php($page++)
                        <tr>
                            <td>{{$page}}</td>
                            <td>{{$review->request_id}}</td>
                            <td>{{$review->user?$review->user->first_name:''}} {{$review->user?$review->user->last_name:''}}</td>
                            <td>{{$review->provider?$review->provider->first_name:''}} {{$review->provider?$review->provider->last_name:''}}</td>
                            <td>
                                <div className="rating-outer">
                                    <input type="hidden" value="{{$review->user_rating}}" name="rating" class="rating" disabled="disabled"/>
                                </div>
                            </td>
                            <td>{{$review->created_at}}</td>
                            <td>{{$review->user_comment}}</td>
                            <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('admin.requests.show', $review->request_id) }}" class="dropdown-item">
                                        <i class="fa fa-search"></i> More details
                                    </a>
                                </div>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.review.transaction_id')</th>
                            <th>@lang('admin.request.User_Name')</th>
                            <th>@lang('admin.request.Provider_Name')</th>
                            <th>@lang('admin.review.Rating')</th>
                            <th>@lang('admin.request.Date_Time')</th>
                            <th>@lang('admin.review.Comments')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
                 @include('common.pagination')
            </div>
                </div>
        </div>
    </div>
@endsection