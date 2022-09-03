<!-- app/views/layout/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>1-GRID</title>

        {!! HTML::script(URL::to('/').'/js/custom.js') !!}

        {!! HTML::script(URL::to('/').'/jquery/jquery-1.12.4.js') !!}
        {!! HTML::script(URL::to('/').'/jquery/jquery-ui-1.12.1/jquery-ui.min.js') !!}
        {!! HTML::style(URL::to('/').'/jquery/jquery-ui-1.12.1/jquery-ui.min.css') !!}

        {!! HTML::script(URL::to('/').'/bootstrap/js/bootstrap.js') !!}
        {!! HTML::style(URL::to('/').'/bootstrap/css/bootstrap.min.css') !!}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>

        {!! HTML::script(URL::to('/').'/DataTables/media/js/jquery.dataTables.js') !!}
        {!! HTML::style(URL::to('/').'/DataTables/media/css/jquery.dataTables.min.css') !!}

        {!! HTML::script(URL::to('/').'/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
        {!! HTML::script(URL::to('/').'/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
        {!! HTML::style(URL::to('/').'/DataTables/extensions/Buttons/css/buttons.dataTables.min.css') !!}
        {!! HTML::script(URL::to('/').'/DataTables/extensions/Buttons/js/buttons.html5.js') !!}
        {!! HTML::script(URL::to('/').'/DataTables/extensions/Buttons/js/buttons.flash.js') !!}

        {!! HTML::script(URL::to('/').'/ckeditor/ckeditor.js') !!}

        {!! HTML::style(URL::to('/').'/bootstrap-select/css/bootstrap-select.css') !!}
        {!! HTML::script(URL::to('/').'/bootstrap-select/js/bootstrap-select.js') !!}

        {!! HTML::style(URL::to('/').'/select2/css/select2.min.css') !!}
        {!! HTML::script(URL::to('/').'/select2/js/select2.full.min.js') !!}

    </head>
    <body>
        <div class="row">
            <div class="col-sm-12">
                @if ( session()->has('success') )
                    <div class="alert alert-success alert-dismissable" role="alert">{{ session()->get('success') }} <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button></div>
                @elseif ( session()->has('warning') )
                    <div class="alert alert-warning alert-dismissable">{{ session()->get('warning') }}</div>
                @elseif ( session()->has('info') )
                    <div class="alert alert-info alert-dismissable">{{ session()->get('info') }}</div>
                @elseif ( session()->has('danger') )
                    <div class="alert alert-danger alert-dismissable">{{ session()->get('danger') }}</div>
                @endif
                @yield('content')
            </div>
        </div>
    </body>
</html>