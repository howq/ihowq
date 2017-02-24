/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.height = 500;
    //config.width = 600;
    config.language = 'zh-cn';
    config.toolbar = 'Basic';
    //config.toolbar = 'Full';
    config.toolbar_Full = [
        ['Source', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates'],
        ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Print', ],
        //['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
        ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
        '/',
        ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'],
        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Link', 'Unlink', 'Anchor'],
        ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'],
        '/',
        ['Styles', 'Format', 'Font', 'FontSize'],
        ['TextColor', 'BGColor']
    ];

    config.filebrowserBrowseUrl = 'libs/ckfinder/ckfinder.html';//上传文件时浏览服务文件夹
    config.filebrowserImageBrowseUrl = 'libs/ckfinder/ckfinder.html';//上传图片时浏览服务文件夹
    config.filebrowserFlashBrowseUrl = 'libs/ckfinder/ckfinder.html';//上传Flash时浏览服务文件夹
    config.filebrowserUploadUrl = 'libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';//上传文件按钮(标签)
    config.filebrowserImageUploadUrl = 'libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=images';//上传图片按钮(标签)
    config.filebrowserFlashUploadUrl = 'libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=flash';//上传Flash按钮(标签)


    config.disableNativeSpellChecker = false ;
    config.scayt_autoStartup = false;
    config.font_names = '宋体/SimSun;新宋体/NSimSun;仿宋/FangSong;楷体/KaiTi;仿宋_GB2312/FangSong_GB2312;'+
        '楷体_GB2312/KaiTi_GB2312;黑体/SimHei;华文细黑/STXihei;华文楷体/STKaiti;华文宋体/STSong;华文中宋/STZhongsong;'+
        '华文仿宋/STFangsong;华文彩云/STCaiyun;华文琥珀/STHupo;华文隶书/STLiti;华文行楷/STXingkai;华文新魏/STXinwei;'+
        '方正舒体/FZShuTi;方正姚体/FZYaoti;细明体/MingLiU;新细明体/PMingLiU;微软雅黑/Microsoft YaHei;微软正黑/Microsoft JhengHei;'+
        'Arial Black/Arial Black;'+ config.font_names;
};
