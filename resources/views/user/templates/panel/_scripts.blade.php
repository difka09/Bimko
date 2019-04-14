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
@stack('scripts')
