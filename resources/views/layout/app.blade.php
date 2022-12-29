<html>
    <header>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- CSS only -->
        <link rel="stylesheet" href="/app.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).ready(function(){
                $("#add-btn").click(function(){
                    $("form#form").toggle();
                });
                
                $("#logout-li").click(function (){
                    $("#logout").submit();
                });
            });
            function follow(user_id) {
                $.ajax({
                    type:'POST',
                    url:'/users/'+ user_id +'/follow',
                    success:function(response) {
                        if (!response) {
                            $("#follow").text("Follow")
                        } else {
                            $("#follow").text("Unfollow")
                        }
                    }
                });
            }
        </script>
    </header>
    <body class="container">
        @yield('content')
    </body>
</html>