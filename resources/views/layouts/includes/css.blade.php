<!-- Bootstrap Core CSS -->
<link href="{{URL::asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="{{URL::asset("assets/css/blog-post.css")}}" rel="stylesheet" type="text/css">
<style>
    .black{
        background-color: black;
        color:white;
    }
    img{
        width: 100%;

    }
    #post_photo {
        height: 100px;
        width: 100px;
    }
    .modal {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 )
        url('{{URL::asset("/assets/uploads/images/bg.gif") }}')
        50% 50%
        no-repeat;
    }


    body.loading {
        overflow: hidden;
    }


    body.loading .modal {
        display: block;
    }
</style>