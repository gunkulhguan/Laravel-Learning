@extends('layouts.frontend')

@section('content')
<div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">ติดต่อเรา</h1>
      <div class="list-group">
        <a href="{{ route('product',['id' => 2]) }}" class="list-group-item">Category 1</a>
        <a href="#" class="list-group-item">Category 2</a>
        <a href="#" class="list-group-item">Category 3</a>
      </div>

    </div>
    <!-- /.col-lg-3 -->


  </div>
  <!-- /.row -->

@endsection

@section('content2')
    test about page2
@endsection
