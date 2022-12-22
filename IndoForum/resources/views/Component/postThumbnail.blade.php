<div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{('/storage/').$post->image}}" class="img-fluid rounded-start img-thumbnail" style="height: 200px; width:100%; object-fit: cover;" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body d-flex flex-column justify-content-center h-100">
          <h5 class="card-title">{{$post->title}}</h5>
            <span class="d-flex">
                <p class="card-text text-truncate" style="max-height: 50px; max-width:80%; margin-right:5px">{{$post->content}}</p>
                <a href="" style="margin-left: 5px">Selengkapnya</a>
            </span>
          <p class="card-text"><small class="text-muted">Dibuat oleh {{$post->username}} pada {{$post->created_at}}</small></p>
        </div>
      </div>
    </div>
    @if ($post->user_id == Auth::user()->id)
        <div class="position-absolute top-0 end-0" style="margin: 1rem">
            <a href="https://google.com" class="btn btn-outline-success rounded-circle" style="margin-right: 10px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                </svg>
            </a>

            <a href="https://youtube.com" class="btn btn-outline-danger rounded-circle">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                </svg>
            </a>
        </div>
    @endif
  </div>
