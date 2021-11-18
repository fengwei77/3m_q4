<?php

use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Form;
use Dcat\Admin\Grid\Filter;
use Dcat\Admin\Show;
use App\Admin\Extensions\Form\WangEditor;

use Dcat\Admin\Form\Field\Editor;

/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
app('view')->prependNamespace('admin', resource_path('views/layouts'));
app('view')->prependNamespace('admin', resource_path('views/admin'));


//Admin::asset()->alias('@wang-editor', [
//    'js' => ['/vendor/wangEditor/wangEditor.min.js',
//        '/vendor/wangEditor/highlight.min.js'
//    ],
//    'css' => ['/vendor/wangEditor/styles/default.min.css'
//    ]
//]);
//Form::extend('editor', WangEditor::class);

Editor::resolving(function (Editor $editor) {
    // 设置默认配置
    $editor->options([
//        'plugins' => [ # 自定义插件
//            'print', 'preview', 'searchreplace', 'autolink', 'directionality', 'visualblocks', 'visualchars', 'fullscreen', 'image', 'link', 'media', 'template', 'code', 'codesample',
//            'table', 'charmap', 'hr', 'pagebreak', 'nonbreaking', 'anchor', 'insertdatetime', 'advlist', 'lists', 'wordcount', 'imagetools', 'textpattern', 'help', 'emoticons',
//            'autosave', 'indent2em', 'autoresize', 'formatpainter', 'importword',
//        ],
//        'toolbar' => [ # 自定义工具栏
//            'code undo redo restoredraft | cut copy paste pastetext | forecolor backcolor bold italic underline strikethrough link anchor | alignleft aligncenter alignright
//             alignjustify outdent indent | styleselect formatselect fontselect fontsizeselect | bullist numlist | blockquote subscript superscript removeformat | \
//             table image media charmap emoticons hr pagebreak insertdatetime print preview | fullscreen |   indent2em lineheight formatpainter   importword',
//        ],
        'plugins' => [ # 自定义插件
            'print', 'preview', 'searchreplace', 'autolink', 'directionality', 'visualblocks', 'visualchars', 'fullscreen', 'image', 'link', 'template', 'code', 'codesample',
            'table', 'charmap', 'hr', 'pagebreak', 'nonbreaking', 'anchor', 'insertdatetime', 'advlist', 'lists', 'wordcount', 'imagetools', 'textpattern', 'help'
        ],
        'toolbar' => [ # 自定义工具栏
            'code undo redo restoredraft | cut copy paste pastetext | forecolor backcolor bold italic underline   link  |
               fontselect fontsizeselect  |  alignleft aligncenter alignright | table image |   ',
        ],
        'min_height' => 600,
        'save_enablewhendirty' => true,
        'convert_fonts_to_spans' => false,
        'convert_urls' => false,
        'verify_html' => false,
        'apply_source_formatting' => false,
        'relative_urls' => false,
//        'images_upload_base_path' => '/uploads/',
    ]);

    // 设置编辑器图片默认上传到七牛云
//    $editor->disk('qiniu');
});

