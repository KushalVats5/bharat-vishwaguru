@extends('site-layout')
@section('banner')
    <div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="cr-breadcrumb">
                        <ul class="cr-breadcrumb__pagination">
                            <li>
                                <a href="{{route('root')}}">Home</a>
                            </li>
                            <li>{{'$content->title'}}</li>
                        </ul>
                        <h1>{{$content->title}}</h1>
                        <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .comparison {
  max-width:940px;
  margin:0 auto;
  font:13px/1.4 "Helvetica Neue",Helvetica,Arial,sans-serif;
  text-align:center;
  padding:10px;
}

.comparison table {
  width:100%;
  border-collapse: collapse;
  border-spacing: 0;
  table-layout: fixed;
  border-bottom:1px solid #CCC;
}

.comparison td, .comparison th {
  border-right:1px solid #CCC;
  empty-cells: show;
  padding:10px;
}

.compare-heading {
  font-size:18px;
  font-weight:bold !important;
  border-bottom:0 !important;
  padding-top:10px !important;
}

.comparison tbody tr:nth-child(odd) {
  display:none;
}

.comparison .compare-row {
  background:#F5F5F5;
}

.comparison .tickblue {
  color:#0078C1;
}

.comparison .tickgreen {
  color:#009E2C;
}

.comparison th {
  font-weight:normal;
  padding:0;
  border-bottom:1px solid #CCC;
}

.comparison tr td:first-child {
  text-align:left;
}
  
.comparison .qbse, .comparison .qbo, .comparison .tl {
  color:#FFF;
  padding:10px;
  font-size:13px;
  border-right:1px solid #CCC;
  border-bottom:0;
}

.comparison .tl2 {
  border-right:0;
}

.comparison .qbse {
  background:#0078C1;
  border-top-left-radius: 3px;
  border-left:0px;
}

.comparison .qbo {
  background:#009E2C;
  border-top-right-radius: 3px;
  border-right:0px;
}

.comparison .price-info {
  padding:5px 15px 15px 15px;
}

.comparison .price-was {
  color:#999;
  text-decoration: line-through;
}

.comparison .price-now, .comparison .price-now span {
  color:#ff5406;
}

.comparison .price-now span {
  font-size:32px;
}

.comparison .price-small {
    font-size: 18px !important;
    position: relative;
    top: -11px;
    left: 2px;
}

.comparison .price-buy {
  background:#ff5406;
  padding:10px 20px;
  font-size:12px;
  display:inline-block;
  color:#FFF;
  text-decoration:none;
  border-radius:3px;
  text-transform:uppercase;
  margin:5px 0 10px 0;
}

.comparison .price-try {
  font-size:12px;
}

.comparison .price-try a {
  color:#202020;
}

@media (max-width: 767px) {
  .comparison td:first-child, .comparison th:first-child {
    display: none;
  }
  .comparison tbody tr:nth-child(odd) {
    display:table-row;
    background:#F7F7F7;
  }
  .comparison .row {
    background:#FFF;
  }
  .comparison td, .comparison th {
    border:1px solid #CCC;
  }
  .price-info {
  border-top:0 !important;
  
}
  
}

@media (max-width: 639px) {
  .comparison .price-buy {
    padding:5px 10px;
  }
  .comparison td, .comparison th {
    padding:10px 5px;
  }
  .comparison .hide-mobile {
    display:none;
  }
  .comparison .price-now span {
  font-size:16px;
}

.comparison .price-small {
    font-size: 16px !important;
    top: 0;
    left: 0;
}
  .comparison .qbse, .comparison .qbo {
    font-size:12px;
    padding:10px 5px;
  }
  .comparison .price-buy {
    margin-top:10px;
  }
  .compare-heading {
  font-size:13px;
}
}
</style>
@stop
@section('content')    
    <div class="container">
@include('errors.custom-message')
<div class="clearfix"></div>
        <div class="row">
            <!-- BLog Details -->
            <div class="col-lg-12">
                <article class="pg-blog">
                    <div class="pg-blog-main">
                        <h2 class="pg-blog-title">{{'Subscriptions'}}</h2>
                        
                        <div class="pg-blog-content clearfix">
                           <div class="comparison">
    
    <table>
      <thead>
        <tr>
          <th class="tl tl2"></th>
          <th class="qbse">
            Self-Employed & Freelance
          </th>
          <th colspan="3" class="qbo">
            Small businesses that need accounting, invoicing or payroll
          </th>
        </tr>
        <tr>
          <th class="tl"></th>
          @foreach ($plans as $item)
              
          <th class="compare-heading">
            {{$item->title}}
          </th>
          @endforeach
          
        </tr>
        <tr>
          <th></th>
          @foreach ($plans as $item)
              
          <form action="{{route('paymentGate')}}" method="POST">
          @csrf

          <th class="price-info">
            <div class="price-was">Was Rs-100</div>
            <div class="price-now"><span>Rs - {{$item->total_cost}}</span> /month</div>
            <input type="hidden" value="{{$item->id}}" name = "plan_id">
            <div>  <button type="submit"  class="price-buy">Buy <span class="hide-mobile">Now</span></button></div>
            <div class="price-try"><span class="hide-mobile">or </span><a href="#">try <span class="hide-mobile">it free</span></a></div>
          </th>
          </form>
          @endforeach
          
        </tr>
      </thead>
      <tbody>
        @foreach ($features as $item)
        <tr>
          <td></td>
          <td colspan="4">{{$item->title}}</td>
        </tr>
            
        <tr class="compare-row">
          <td>{{$item->title}}</td>
          <td><span class="tickblue">✔</span></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        @endforeach

        @foreach ($click as $item)
          @if ($item->plan_id == $item->feature_id)   
          <td><span class="tickblue">✔</span></td>
          
          @endif 

        @endforeach
       
      </tbody>
    </table>
  
  </div>
                        </div>
                    </div>
                </article>
            </div><!--// BLog Details -->
        </div>
    </div>   
@stop
