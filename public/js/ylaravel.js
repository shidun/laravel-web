// var editor = new wangEditor('content');

// editor.config.uploadImgUrl = '/posts/image/upload';

// // 设置 headers（举例）
// editor.config.uploadHeaders = {
//     'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
// };

// editor.create();

var E = window.wangEditor
var editor = new E('#div1')
var $text1 = $('#content')
$text1.val($('#js-content').html())
editor.customConfig.onchange = function (html) {
    // 监控变化，同步更新到 textarea
    $text1.val(html)
}
editor.customConfig.uploadImgHeaders = {
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
}
editor.customConfig.uploadFileName = 'yourFileName'
editor.customConfig.showLinkImg = false
editor.customConfig.uploadImgServer = '/posts/image/upload'
editor.create()
// 初始化 textarea 的值
editor.txt.html($text1.val())
