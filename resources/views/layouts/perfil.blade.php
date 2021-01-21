<div class="user_div">
    <h5 class="brand-name mb-4">User<a href="javascript:void(0)" class="user_btn"><i class="icon-close"></i></a></h5>
    <div class="card">

        <div class="right ">
            <div class="notification d-flex">
                <a class="btn btn-facebook" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-2 font-size-16 align-middle mr-1"></i> Salir</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        
        <div class="card-body">
            <h5 class="card-title">Cootranshuila LTDA</h5>
            
            
        </div>
    </div>
  
    {{--<div class="form-group">
        <label class="d-block">Storage <span class="float-right">77%</span></label>
        <div class="progress progress-sm">
            <div class="progress-bar" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
        </div>
        <button type="button" class="btn btn-primary btn-block mt-3">Upgrade Storage</button>
    </div>--}}
</div>