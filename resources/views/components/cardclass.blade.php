<div>
    <div class="card mb-3" style="max-width: 850px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{$cardimg}}" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$cardtitle}}</h5>
              <p class="card-text">{{$cardtext}}</p>
              <p class="card-text d-flex justify-content-between">
                <small class="text-muted">{{$lastupdate}}</small>
                <a href="{{$classlink}}"><button type="button" class="btn btn-primary">Goto Class</button></a>
            </p>
            </div>
          </div>
        </div>
      </div>
</div>