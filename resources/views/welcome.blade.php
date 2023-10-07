@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <input class="form-control" id="search" placeholder="search">
            </div>
        </div>
        <div class="my-5"></div>
        <div class="row">
            <div id="posts-result">
                @include('partials.posts', ['posts' => $posts])
            </div>
        </div>
    </div>

    <script>
        let Search = document.querySelector('#search');

        Search.addEventListener("keyup", searchResult)

        function searchResult(event) {
            let search = event.target.value;
            axios.get(`/posts?search=${search}`,
            ).then((response) => {
                console.log(response);
                document.getElementById("posts-result").innerHTML = response.data

            })
            .catch((error) => {
                console.log(error);
            });
        }
    </script>
@endsection
