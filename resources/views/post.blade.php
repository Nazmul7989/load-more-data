<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Load More Data</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mt-5">All Posts</h3>
        </div>
    </div>
    <div class="row" id="post-data">
       @include('data')
    </div>
</div>
<div class="ajax-load text-center mt-3" style="display: none">
    <p><img src="{{ asset('images/loading.gif') }}" style="width: 40px; height: 40px;" alt=""> &nbsp;Loading More Post...</p>
</div>



<div>

</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
-->

<script>
function loadMoreData(page){
    $.ajax({
        url: "?page=" + page,
        type: "get",
        beforeSend: function (){
            $(".ajax-load").show();
        }
    })

    .done(function (data){
        if (data.html == ''){
            $(".ajax-load").html('No more posts found');
            return ;
        }
        $(".ajax-load").hide();
        $("#post-data").append(data.html);
    })

    .fail(function (){
        alert('Server not responding...');
    })
}

var page = 1;
$(window).scroll(function (){
    if ($(window).scrollTop() + $(window).height() >= $(document).height()){
        page++;
        loadMoreData(page);
    }
})
</script>
</body>
</html>
