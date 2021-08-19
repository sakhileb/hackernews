<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HNC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class="collapse bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">About</h4>
                            <p class="text-muted">Hacker News Clone Built For Wunderman Thompson Assessment</p>
                        </div>
                        <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Found On</h4>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white">GitHub</a></li>
                                <li><a href="https://hnc.blupininc.co.za/" class="text-white">Live Demo</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container d-flex justify-content-between">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                        <strong>HNC</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>
        <main role="main">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">Hacker News Clone</h1>
                    <p class="lead text-muted">
                        A Neat Hacker News Clone Site With Data Available In Near Real Time. 
                    </p>
                    <p>
                        @foreach($types as $type)
                            <a href="/{{ $type }}" class="btn btn-secondary my-2">{{ ucwords($type) }}</a>
                        @endforeach
                    </p>
                </div>
            </section>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                    @foreach($items as $item)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img src="https://picsum.photos/id/237/200/200" class="img-responsive">
                                <div class="card-body">
                                    <p class="card-text">
                                        <a href="{{ URLHelper::getUrl($item->id, $item->url) }}">
                                            <span class="item-title hint--bottom" data-hint="{{ \Illuminate\Support\Str::limit(strip_tags($item->description), 150, $end='...') }}">{{ \Illuminate\Support\Str::limit(strip_tags($item->title), 20, $end='...') }}</span>
                                            
                                        </a>
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                {{ $item->score }}
                                            </button>
                                            <a href="/read/{{$item->id}}" type="button" class="btn btn-sm btn-outline-secondary">
                                                Read
                                            </a>
                                        </div>
                                        <small class="text-muted pl-2"><span class="item-info">posted {{ \Carbon\Carbon::createFromTimestamp($item->time_stamp)->diffForHumans() }} by {{ $item->username }}</span></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-8 offset-md-3">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </main>
</body>

    <footer class="text-muted">
        <div class="container">
            <p class="text-center">
                <a href="#">Back to top</a>
            </p>
        </div>
    </footer>
</body>
</html>
