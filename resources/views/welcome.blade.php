<html>

    <head>
        <title>Vivlio | Main</title>
        <link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/dist/css/custom_main.css')}}">
        <!-- <link rel="stylesheet" type="text/css" href="{{asset('public/dist/css/front.css')}}"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('images/vivlio_388.fw.png')}}">
    </head>

    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-md-offset-4 vivlio_height_spacer_40_cent"></div>
                <div class="col-md-4 col-xs-12 col-md-offset-4">
                    <img class="img img-responsive vivlio_margin_auto_intro" src="public/images/vivlio_677.fw.png" draggable="false">
                    <div class="row">
                        <div class="col-xs-4 col-md-4 col-xs-offset-4 vivlio_height_spacer_20"></div>
                        <div class="col-xs-4 col-md-4 col-xs-offset-4 ">
                                <button id="redirect_login" class="gray-flat-button" style=" border: 2px solid; border-radius: 20px;">Please Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
</html>
<script src="{{asset('public/_color/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(e){
        $(document).on('click','#redirect_login',function(e){
            e.preventDefault();
            window.location.replace('login');
        });

    });
</script>