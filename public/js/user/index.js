$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});

$('.like-button').click(function(event) {
	var target = $(event.target);
	var current_like = target.attr('like-value');
	var user_id = target.attr('like-user');
	if (current_like == 1) {
		//取消关注
		$.ajax({
			url: "/user/"+ user_id + "/unfan",
			method: 'POST',
			success: function(data) {
				if (data != 'true') {
					alert('取消关注失败');
					return;
				}
				target.attr("like-value", 0);
				target.text("关注");
			}
		});
	} else {
		//关注
		$.ajax({
			url: "/user/"+ user_id + "/fan",
			method: 'POST',
			success: function(data) {
				if (data != 'true') {
					alert('关注失败');
					return;
				}
				target.attr("like-value", 1);
				target.text("取消关注");
			}
		});
	}
});