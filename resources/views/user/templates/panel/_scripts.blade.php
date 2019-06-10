<script>
    tinymce.init({
        selector: 'textarea#addPost',
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor'
        ],
        height : '350'
    });
</script>
<script src="{{asset('guru/js/moment-with-locales.js')}}"></script>
<script>
    $(document).ready(function() {
        $('time').each(function(i, e) {
            moment.locale('id');
            var time = moment($(e).attr('datetime'));
                $(e).html('<span>' + time.fromNow() + '</span>');
        });
    });
</script>
@stack('scripts')
