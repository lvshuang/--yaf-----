define(function(require, exports, module) {

    require('kindeditor');

    exports.createFullEditor = function(dom, uploadType, options) {

        var settings = $.extend({
            items: ['source', '|', 'undo', 'redo', '|', 'preview', 'print', 'cut', 'copy', 'paste', 'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript', 'superscript', 'clearhtml', 'selectall', '|', 'fullscreen', '/', 'formatblock', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage', 'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'anchor', 'link', 'unlink', 'about'],
            resizeType: 1,
            pasteType: 1,
            filePostName: 'file',
            uploadJson : '/editor_upload' + (uploadType ? ('?type=' + uploadType) : ''),
            cssPath: '',
            imageTabIndex:1,
            allowFlashUpload: false,
            allowMediaUpload: false
        }, options);

        return KindEditor.create(dom, settings);
    };

    exports.createMiniEditor = function(dom, uploadType, options) {

        var settings = $.extend({
            items: ['insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'clearhtml', '|', 'fontsize',  'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough',  'removeformat', '|', 'image', 'link', 'unlink', '|', 'preview', 'about'],
            resizeType: 1,
            pasteType: 1,
            filePostName: 'file',
            uploadJson : '/editor_upload' + (uploadType ? ('?type=' + uploadType) : ''),
            cssPath: '',
            imageTabIndex:1,
            allowFlashUpload: false,
            allowMediaUpload: false
        }, options);

        return KindEditor.create(dom, settings);
    };

});