jQuery(document).ready(function($) {
    console.log("loaded script");
    $('.like-button').click(function(e) {
        e.preventDefault();
        var post_id = $(this).data('post-id');
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'increase_like_count',
                post_id: post_id
            },
            success: function(response) {
                console.log(response);
                $('.like-count[data-post-id="'+post_id+'"]').text(response);
                $('.like-button[data-post-id="'+post_id+'"]').hide();
            }
        });
    });
});

  