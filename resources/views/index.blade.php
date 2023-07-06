@include('header')
<body>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Create Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $dat)
            <tr>
                <th scope="row">{{$dat->id}}</th>
                <td><a href="/post/{{$dat->title}}" target="_blank">{{$dat->title}}</a></td>
                <td>{{$dat->created_at}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>

{{ $data->links() }}

</body>
