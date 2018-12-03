$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});

$('.post-audit').click(function(event) {
	target = $(event.target);
	var post_id = target.attr('post-id');
	var status = target.attr('post-action-status');

	$.ajax({
		url: '/admin/posts/' + post_id + '/status',
		method: 'post',
		data: {'status': status},
		success: function(data) {

			if (data != 'true') {
				alert(修改失败);
				return;
			}
			target.parent().parent().remove();
		}
	});
});
$('.resource-delete').click(function(event) {
	if (confirm('确定删除吗?')) {
		target = $(event.target);
		event.preventDefault();
		var url = $(target).attr('delete-url');

		$.ajax({
			url: url,
			method: 'post',
			data: {'_method': 'DELETE'},
			success: function(data) {
				if (data != 'true') {
					alert(修改失败);
					return;
				}
				window.location.reload();
			}
		});
	}
});