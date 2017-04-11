@extends('layouts.main')

@section('title', 'All News')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="row" style="display: flex; align-items: center;">
    		<div class="col-md-10">
    			<h1>All News</h1>
    		</div>
    
    		<div class="col-md-2">
    			<a href="{{ route('news.create') }}" class="btn btn-success btn-lg">Create News</a>
    		</div>
    	</div>
    	
    	<hr>
    	
      <div class="class="table-responsive"">
        <table class="table table-striped table-hover" style="width:100%">
          <colgroup>
            <col class="col-md-1">
            <col class="col-md-1">
            <col class="col-md-4">
            <col class="col-md-2">
            <col class="col-md-2">
            <col class="col-md-2">
          </colgroup>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>Title</th> 
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
          </tr>
          @php ($id = 1)
          @foreach ($news as $n)
            <tr>
              <td>{{$id}}</td>
              <td>{{$n->id}}</td>
              <td><a href="/news/{{$n->id}}">{{$n->title}}</a></td>
              <td>{{$n->created_at}}</td> 
              <td>{{$n->updated_at}}</td>
              <td>
                <a class="btn btn-primary" href="/news/{{$n->id}}/edit" role="button">Edit</a>
                <form style="display:inline" method="POST" action="{{ route('news.destroy', $n->id) }}">
                  <input type="submit" value="Delete" class="btn btn-danger">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                   {{ method_field('DELETE') }}
                </form>
              </td>
            </tr>
            @php ($id += 1)
          @endforeach
        </table>
        <div class="text-center">
          {!! $news->links(); !!}
        </div>
        
      </div>
      
    </div>
  </div>
@endsection