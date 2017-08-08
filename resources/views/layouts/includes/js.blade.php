<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!-- jQuery -->
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->



<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/select2.js') }}"></script>

<script>
</script>
{{--<script  type="text/javascript">--}}
{{--$(document).ready(function() {--}}
{{--$("#category").select2();--}}
{{--});--}}
{{--</script>--}}

<script>

    $('.like').on('click' , function(event){
        event.preventDefault();
        var islike = event.target.previousElementSibling;
        post_id=event.target.parentNode.parentNode.dataset['postid'];
        $.ajax({
            method:'POST',
            url:urlLike,
            data:{islike: islike, post_id: post_id , _token:"{{ csrf_token() }}"},
            success: function() {

            }
        })

    });
</script>
<script>
    $('.btnLike').click(function() {
        if ($(this).hasClass('btn-default')) {
            $(this).removeClass('btn-default').addClass('btn-primary').find('span').text('you like this post');
        }
        else {
            $(this).removeClass('btn-primary').addClass('btn-default').find('span').text('Like');
        }
    });
</script>
