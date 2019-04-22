var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;
manageData();

// manage data list
function manageData(){
    $.ajax({
        dataType: 'json',
        url: Url,
        data: {page:page}
    }).done(function(data){
        total_page = data.last_page;
        current_page = data.current_page;
        $('#pagination').twbsPagination({
            totalPages: total_page,
            visiblePages:current_page,
            onPageClick: function(event, pageL){
                page = pageL;
                if(is_ajax_fire != 0){
                    getPageData();
                }
            }

        });
        manageRow(data.data);
        is_ajax_fire = 1;
    });
}

function getPageData(){
    $.ajax({
        dataType: 'json',
        url:Url,
        data: {page:page}
    }).done(function(data){
        manageRow(data.data);
    });
}
