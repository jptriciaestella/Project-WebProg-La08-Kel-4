<div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{('/storage/').$post->image}}" class="img-fluid rounded-start img-thumbnail" style="height: 150px; width:100%; object-fit: cover;" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
            <span class="d-flex">
                <p class="card-text text-truncate" style="max-height: 50px; max-width:80%; margin-right:5px">{{$post->content}}</p>
                <a href="">Selengkapnya</a>
            </span>
          <p class="card-text"><small class="text-muted">Dibuat oleh {{$post->username}} pada {{$post->created_at}}</small></p>
        </div>
      </div>
    </div>
  </div>
