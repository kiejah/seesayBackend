@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tip') }}</div>

                <div class="card-body">
                    <div class="form-group"> 
                        {{-- <label>Change Category</label> 

                        <select name="tip_cat" id="tip_cat_id_{{$tip->id}}" class="form-control">
                            <option value="{{$tip->category->id}}">{{ $tip->category->category_name}}</option>  
                            @foreach ($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>   
                            @endforeach
                        </select>
                        <input type="hidden" id="tip_id" value="{{$tip->id}}"> --}}
                        
                        <b>Tip Category :</b>
                        <div class="row">
                            
                            <div class="col-md-9">
                                <div id="tip_category_name_{{$tip->id}}">{{ $tip->category->category_name }}&nbsp;
                                    <button class="btn btn-secondary" data-value="{{$tip->id}}" id="editTextId_{{$tip->id}}"
                                        onclick="
                                        event.preventDefault();
                                                    document.getElementById('tip_category_name_{{$tip->id}}_form_div').style.display='block';
                                                    document.getElementById('cancelUpdate').style.display='block';
                                                    document.getElementById('tip_category_name_{{$tip->id}}').style.display='none';
                                        "><small>Change?</small></button>
                                </div>
                                <div id="tip_category_name_{{$tip->id}}_form_div" style="display:none;">
                                    <form id="EditTipCatForm_{{$tip->id}}" action="{{ route('tips.update',$tip->id) }}" method="POST">
                                        @csrf
                                        <select name="tip_cat_id" id="tip_cat_id" class="form-control">
                                            <option value="{{ $tip->category->id }}">{{ $tip->category->category_name }}</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="route" value="web">
                                        @method('PUT')
                                    </form>
                                </div>
                            </div>
                            <div text-align="right" class="col-md-3">
                                <button id="cancelUpdate" style="display:none;" class="btn btn-danger"
                                onclick="
                                        event.preventDefault();
                                                    document.getElementById('tip_category_name_{{$tip->id}}_form_div').style.display='none';
                                                    document.getElementById('cancelUpdate').style.display='none';
                                                    document.getElementById('tip_category_name_{{$tip->id}}').style.display='block';
                                ">Cancel</button>
                            </div>
                        </div>

                        <hr>
                        <p><b>Tip :</b> {{$tip->tipdesc}}</p>
                        <p><b>Tip in County :</b> {{$tip->county_name}}</p>
                        <p><b>Where in County :</b> {{$tip->location_name}}</p>
                        <p><b>Tip Sent on :</b> {{$tip->created_at}}</p>
                        <p><b>Sent by :</b> {{$tip->user->name}}</p>
                    </div>   
                   
                

                </div>
                <div class="card-footer">
                        <div class="modal-footer"> 

                        <a href="{{route('tips.index')}}"class="btn btn-default" style="border:1px solid #000000" data-dismiss="modal">Back</a> 
                        <a class="btn btn-primary" href="{{ route('tips.show',$tip->id) }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('EditTipCatForm_{{$tip->id}}').submit();">Update</a> 
                       

                        </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection