@extends('layouts.app')
<meta name="_token" content="{{csrf_token()}}" /> 
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
                   All Tips
               </div>
               <div class="card-body">
                   <div class="card-text">
                   </div>
                        @include('tips.search-tips-form')
                   <div class="table-responsive tips-table">
                    <table class="table table-striped table-sm data-table">
                        
                        <thead class="thead">
                            <tr>
                                <th colspan="2">Tip Category</th>
                                <th>County</th>
                                <th>Location in County</th>
                                
                                <th colspan="2">Tip Description</th>
                                <th>Reported on</th>
                                <th class="no-search no-sort"></th>
                                <th class="no-search no-sort"></th>
                                <th class="no-search no-sort"></th>
                            </tr>
                        </thead>
                        <tbody id="users_table">
                            @foreach($tips as $tip)
                            
                                <tr class={{ $tip->status ? "text-dark" : 'text-danger' }}>
                                    <td>
                                        {{$tip->category->category_name}}
                                    </td>
                                    <td>
                                    <a href="{{ route('tips.edit',$tip->id)}}"  class="btn btn-secondary"> 
                                        <small>View<small>
                                    </a> 

                                    </td>
                                    <td>{{$tip->county->countyName}}</td>
                                    <td>{{$tip->location_name}}</td>
                                    {{-- <td>{{ \Illuminate\Support\Str::limit($tip->tipdesc,$limit= 10, $end='...')}}</td> --}}
                                    <td colspan="2">{{$tip->tipdesc}}</td>
                                    <td>{{$tip->created_at}}</td>
                                   
                                    <td>
                                        <a href="{{ route('tips.index') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('delete-form-{{$tip->id}}').submit();">Del</a>   

                                        <form id="delete-form-{{$tip->id}}" 
                                                action="{{ route('tips.destroy',$tip->id) }}" 
                                                method="POST"
                                                >
                                            
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


               </div>
            </div>
        </div>
    </div>
</div>
@endsection


