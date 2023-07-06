@include('header')

<body>
<div class="container">
    <div style="height: 25vh"></div>
    <div class="row">
        <div class="col-3"></div>
        <form class="col-6" action="/me/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="col-3"></div>
    </div>
</div>

</body>
