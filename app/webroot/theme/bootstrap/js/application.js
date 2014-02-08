$(document).ready(function() {
    // debug
    $('.cake-sql-log').addClass('table table-condensed table-bordered table-striped');

    // search button and filters on index
    $('.btn-search').on('click', function() {
        $this = $(this);
        $state = $this.data('state');
        if ($state=='hide') {
            $(this).data('state','show');
            $('.data').switchClass('span12','span9',500,'easeOutBounce', function() {
                $('.filters').slideDown('slow');
            });
        } else {
            $(this).data('state','hide');
            $('.filters').slideUp('fast', function() {
                $('.data').switchClass('span9','span12',500,'easeOutBounce');
            });
        }
    });
});