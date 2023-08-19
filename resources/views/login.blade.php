{{--<h1>{{$user['name']}} 登录成功，正在重定向首页</h1>--}}
<script>
    sessionStorage.setItem("token", "{{$token}}")
    {{--location.href = "/?token={{$token}}"--}}
</script>
