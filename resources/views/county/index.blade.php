@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        
            <div class="card">
                @if (!empty($mssg))
                <div class="alert alert-success">
                    {{$mssg}}
                </div>   
                @endif
                
               <div class="card-header">
                   Counties
               </div>
               <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row ml-1" style="margin-bottom: 10px" >
                                <h6 class="card-text">County Tip Category Relations</h6>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="row">
                            <div class="col-md-8">
                                <form id="SearchCountyForm" action="{{ route('tip-categories.store') }}" method="POST">
                                    <input type="text" id="category_name" name="category_name" required style="width:100%;padding: 0.375rem 0.75rem;"/>
                                    @csrf
                                </form>
                            </div>
                            <div class="col-md-4" style="">
                                <button class="btn btn-primary" onclick="
                                
                                event.preventDefault();
                                document.getElementById('SearchCountyForm').submit();
                                ">Search County</button>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>County</th>
                                        <th>&#8470; Tips</th>
                                        @foreach ($categories as $cat)
                                        <th>{{ $cat->category_name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($counties as $county)
                                    <tr>
                                    <td>{{$county->countyName}}</td>
                                    <td>{{$county->tips->count()}}</td>
                                        @foreach ($categories as $cat)
                                        <td>{{ getCatCount($county->id,$cat->id) }}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            
                        </div>
                        
                    </div>

                   
               </div>
            </div>
    </div>
</div>
@endsection