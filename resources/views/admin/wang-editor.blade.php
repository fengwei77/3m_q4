<div class="{{$viewClass['form-group']}}">

    <label class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div {!! $attributes !!} style="width: 100%; height: 100%;">
            <p>{!! $value !!}</p>
        </div>

        <input type="hidden" name="{{$name}}" value="{{ old($column, $value) }}" />

        @include('admin::form.help-block')

    </div>
</div>

<script require="@wang-editor" init="{!! $selector !!}">
    var E = window.wangEditor
    var editor = new E('#' + id)
    editor.config.zIndex = 0
    //上传视频
    editor.config.uploadVideoServer = '/admin/uploadvideo'
    editor.config.uploadVideoAccept = ['mp4']
    editor.config.uploadVideoName = 'video'
    editor.config.uploadVideoHeaders = {
        'X-CSRF-TOKEN': Dcat.token
    }

    //editor.config.uploadImgShowBase64 = true
    //图片上传端口
    editor.config.showLinkImg = false
    editor.config.uploadImgServer = '/admin/uploadimg'
    editor.config.uploadImgHeaders = {
        'X-CSRF-TOKEN': Dcat.token
    }
    // 一次最多上传 10 个图片
    editor.config.uploadImgMaxLength = 10
    editor.config.uploadFileName = 'photo'
    editor.highlight = hljs
    editor.config.uploadImgAccept = ['jpg', 'jpeg', 'png', 'bmp']
    editor.config.languageType = ['PHP','Python','Bash','CSS','JavaScript','JSON','Html','SQL']
    editor.config.onchange = function (html) {
        $this.parents('.form-field').find('input[name={{ $name }}]').val(html)
    }

    // // 插入网络图片的回调
    // editor.config.linkImgCallback = function (src,alt,href) {
    //     console.log('图片 src ', src)
    //     console.log('图片文字说明',alt)
    //     console.log('跳转链接',href)
    // }

    editor.config.menus = [
        'head',
        'bold',
        'fontSize',
        'fontName',
        'italic',
        'underline',
        'strikeThrough',
        'indent',
        'lineHeight',
        'foreColor',
        'backColor',
        'link',
        'list',
        'todo',
        'justify',
        'quote',
        'emoticon',
        'image',
        // 'video',
        'table',
        // 'code',
        'splitLine',
        'undo',
        'redo',
    ]
    editor.create();
</script>
