@extends('admin.base')

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All galleries</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Add gallery</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div>
                        <div>
                            @include('admin.layouts.notification')
                        </div>
                        <div>
                            <a href="{{ route('gallery.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Gallery</a>
                        </div>
                      </div>
                      <div>
                         <table class="table table-jambo">
                             <thead>
                                 <th>Sno</th>
                                 <th>Title</th>
                                 <th>Status</th>
                                 <th>Image</th>
                                 <th>Action</th>
                             </thead>
                             <tbody>
                               @if($galleries)
                                @foreach($galleries as $key=>$gallery )
                                  <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$gallery->title}}</td>
                                    <td>{{$gallery->status}}</td>
                                    <td>
                                      @if($gallery->image)
                                      <img style="max-width:150px;" src="{{ asset('uploads/gallery/'.$gallery->image) }}" alt="" class="img img-responsive img-thumbnail">
                                      @else
                                        No Image Found
                                       @endif
                                    </td>
                                    <td>
                                      <a href="{{ route('gallery.edit',$gallery->id) }}" class="btn btn-success sm" style="border-radius:50%;"><i class="fa fa-pencil" aria-hidden="true"></i></a>


                                      <form onclick="return confirm('Are You sure to delete this gallery?');" action="{{ route('gallery.destroy',$gallery->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger sm"  style="border-radius:50%;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                      </form>
                                      
                                  </tr>
                                @endforeach
                               @endif
                             </tbody>
                         </table>
                      </div>
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection