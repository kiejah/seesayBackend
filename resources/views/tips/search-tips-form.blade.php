<div class="row">
    <div class="col-sm-8 offset-sm-4 col-md-6 offset-md-6 col-lg-5 offset-lg-7 col-xl-4 offset-xl-8">
    <div class="row"> 
    <div class="col-md-8">
        <form id="searchForm" action="{{ route('tips.search') }}" method="POST">
            <input type="text" name="search_term" />
            @csrf
        </form>
    </div>
    <div class="col-md-4" style="margin-top: -5px;">
        <button class="btn btn-primary" onclick="event.preventDefault();
   document.getElementById('searchForm').submit();">Search</button>
    </div>
    

   
   </div>
    </div>
</div>

