@extends('layouts.frontend')

@section('content')
<div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">สินค้า</h1>
      <div class="list-group">

        @foreach ($category_all as $data)
            <a href="{{ route('welcome.show',['id'=>$data->id]) }}" class="list-group-item">{{ $data->name }}</a>
        @endforeach

      </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="https://picsum.photos/900/350" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/900/351" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://picsum.photos/900/352" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <h1>หมวดหมู่ : {{ $category->name }}</h1>
      <div class="row">

        @foreach ($category->products as $data)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{ asset('storage/images/'.$data->picture) }}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a href="#">{{ $data->name }} </a>
                    </h4>

                    <h5>{{ $data->price }} Bath</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('cart.store',['product_id'=>$data->id]) }}" class="btn btn-info">หยิบใส่ตะกร้า</a>

                </div>
                </div>
            </div>
        @endforeach



      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

@endsection

@section('content2')
    test about page2
@endsection
