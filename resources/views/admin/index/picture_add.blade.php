<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/PIE_IE678.js"></script>
<![endif]-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="assets/css/codemirror.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/ace.min.css" />
    <link rel="stylesheet" href="Widget/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
    <link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
    <link href="Widget/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />

    <title>商品添加</title>
    <style>
        .qwer {  
            width: 200px;  
            padding:8px;  
            background-color: #428bca;  
            border-color: #357ebd;
            margin:0px 41%;  
            color: #fff;  
            -moz-border-radius: 10px;  
            -webkit-border-radius: 10px;  
            border-radius: 10px; /* future proofing */  
            -khtml-border-radius: 10px; /* for old Konqueror browsers */  
            text-align: center;  
            vertical-align: middle;  
            border: 1px solid transparent;  
            font-weight: 900;  
            font-size:125%  
      }
        .swer {  
            width: 200px;  
            margin-top: 10px !important ; 
            padding:8px;  
            background-color: #FFA488;  
            border-color: #357ebd;
            margin:0px 39%;  
            color: #fff;  
            -moz-border-radius: 10px;  
            -webkit-border-radius: 10px;  
            border-radius: 10px; /* future proofing */  
            -khtml-border-radius: 10px; /* for old Konqueror browsers */  
            text-align: center;  
            vertical-align: middle;  
            border: 1px solid transparent;  
            font-weight: 900;  
            font-size:125%  
      }

    </style>
</head>

<body>
    <div class="clearfix" id="add_picture">
        <div>
            <form action="{{route('dopicture_add')}}" method="post" enctype="multipart/form-data" class="form form-horizontal" id="form-article-add">
                @csrf


                <div class=" clearfix cl">
                    <div class="Add_p_s">
                        <label class="form-label col-2">分&nbsp;&nbsp;&nbsp;&nbsp;类：</label>
                        <div class="formControls col-2" style="width:400px;">
                            <select name="ify_id1" id="select1">
                                <option value="">请选择...</option>
                                @foreach ($data as $v)
                                    <option value="{{$v->id}}">{{$v->ify_name}}</option>
                                    @endforeach
                            </select>
                            <select name="ify_id2" id="select2"></select>
                            <select name="ify_id3" id="select3"></select>
                        </div>
                    </div> 
                </div>
                <div class=" clearfix cl">
                    <div class="Add_p_s">
                        <label class="form-label col-2">品&nbsp;&nbsp;&nbsp;&nbsp;牌：</label>
                        <div class="formControls col-2" style="width:400px;">
                            <select name="brand_id" id="brselect1">
                                <option value="">不选择..</option>
                            </select>
                        </div>
                    </div> 

                </div>
                {{-- <div class="clearfix cl">
                    <label class="form-label col-2">内容摘要：</label>
                    <div class="formControls col-10">
                        <textarea name="pro_content" cols="" rows="" class="textarea" placeholder="说点什么...最少输入10个字符" datatype="*10-100"
                            dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
                    </div>
                </div> --}}


                <input type="button" class="qwer" value="添加一组sku">

                <div style="border:1px dashed #ccc; padding: 20px;margin:33px;width:96%;" id="model" class="clearfix cl">
                    <div  style="height:50px;">
                        <label class="form-label col-2"><span class="c-red">*</span>商品标题：</label>
                        <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="pro_title-0"></div>
                    </div>
                    <div  style="height:50px;">
                        <label class="form-label col-2"><span class="c-red">*</span>商品名称：</label>
                        <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="pro_name-0"></div>
                    </div>
                    <div style="height:50px;">
                        <label class="form-label col-2"><span class="c-red">*</span>商品库存：</label>
                        <div class="formControls col-10"><input type="text" class="input-text" name="sku_stock-0"></div>
                    </div>
                    <div style="height:50px;">
                        <label class="form-label col-2"><span class="c-red">*</span>商品价格：</label>
                        <div class="formControls col-10"><input type="text" class="input-text" name="sku_price-0"></div>
                    </div>
                    <input type="button" id="lala" class="swer"  onclick="imgs(event,0)" value="添加图片">
                    <input type="button" class="swer sku"  onclick="add_sku(event,0)" value="添加一条sku">
                    <div style="width:100%;" id="lms">
                        <div style="height:50px;width:100px;display:inline-block;margin-right:50px;">
                            <label class="form-label col-2"><span class="c-red">*</span>sku名称：</label>
                            <div class="formControls col-10"><input type="text" class="input-text" name="attr_attr-0[]"></div>
                        </div>
                        <div  style="height:50px;width:120px;display:inline-block;margin-right:50px;">
                            <label class="form-label col-2"><span class="c-red">*</span>sku值：</label>
                            <div class="formControls col-10"><input type="text" class="input-text" name="attr_val-0[]"></div>
                        </div>
                    </div>
                    
                </div>
                <div class="clearfix cl" id="tj">
                    <div class="Button_operation">
                        <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
                        <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/typeahead-bs2.min.js"></script>
    <script src="assets/layer/layer.js" type="text/javascript"></script>
    <script src="assets/laydate/laydate.js" type="text/javascript"></script>
    <script type="text/javascript" src="Widget/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="Widget/icheck/jquery.icheck.min.js"></script>
    <script type="text/javascript" src="Widget/zTree/js/jquery.ztree.all-3.5.min.js"></script>
    <script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script>
    <script type="text/javascript" src="Widget/webuploader/0.1.5/webuploader.min.js"></script>
    <script type="text/javascript" src="Widget/ueditor/1.4.3/ueditor.config.js"></script>
    <script type="text/javascript" src="Widget/ueditor/1.4.3/ueditor.all.min.js"> </script>
    <script type="text/javascript" src="Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
    <script src="js/lrtk.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/H-ui.js"></script>
    <script type="text/javascript" src="js/H-ui.admin.js"></script>
    <script>
    let a = 0;
    $('.qwer').click(function(){
        a++
       var str = 
        `<div style="border:1px dashed #ccc; padding: 20px;margin:33px;width:96%;" id="model" class="clearfix cl">
            <div style="height:50px;">
                <label class="form-label col-2"><span class="c-red">*</span>商品标题：</label>
                <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="pro_title-`+a+`"></div>
            </div>
            <div style="height:50px;">
                <label class="form-label col-2"><span class="c-red">*</span>商品名称：</label>
                <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="pro_name-`+a+`"></div>
            </div>
            <div style="height:50px;">
                <label class="form-label col-2"><span class="c-red">*</span>商品库存：</label>
                <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="sku_stock-`+a+`"></div>
            </div>
            <div style="height:50px;">
                <label class="form-label col-2"><span class="c-red">*</span>商品价格：</label>
                <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="sku_price-`+a+`"></div>
            </div>
            <input type="button" id="lala" class="swer"  onclick="imgs(event,`+a+`)" value="添加图片">
            <input type="button" class="swer sku" onclick="add_sku(event,`+a+`)" value="添加一条sku">
            <div style="width:100%;" id="lms">
                <div style="height:50px;width:100px;display:inline-block;margin-right:50px;">
                    <label class="form-label col-2"><span class="c-red">*</span>sku名称：</label>
                    <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="attr_attr-`+a+`[]"></div>
                </div>
                <div  style="height:50px;width:120px;display:inline-block;margin-right:50px;">
                    <label class="form-label col-2"><span class="c-red">*</span>sku值：</label>
                    <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="attr_val-`+a+`[]"></div>
                </div>
            </div>
        </div>`;
        // $(this).append(str);
        var model = document.querySelector('#tj')
       
        model.insertAdjacentHTML('beforeBegin',str);
    })


    function add_sku(event,id){
        var html =`
        <div style="width:100%;">
            <div style="height:50px;width:100px;display:inline-block;margin-right:50px;">
                <label class="form-label col-2"><span class="c-red">*</span>sku名称：</label>
                <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="attr_attr-`+id+`[]"></div>
            </div>
            <div  style="height:50px;width:120px;display:inline-block;margin-right:50px;">
                <label class="form-label col-2"><span class="c-red">*</span>sku值：</label>
                <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="attr_val-`+id+`[]"></div>
            </div>
        </div>
        `;
        var lms = event.path[1];
        
        lms.insertAdjacentHTML('beforeEnd',"<hr>"+html)
    }
    
    function imgs(event,id){
        var html = 
        `<div style="height:50px;width:120px;display:inline-block;margin-right:50px;">
            <label class="form-label col-2"><span class="c-red">*</span>图片上传</label>
            <input type="file" class="image" name="image-`+id+`[]" value="上传图片">
        </div>`;
        var lala = event.path[0];
        console.log(lala)
        lala.insertAdjacentHTML('afterEnd',html)
        $(".image").change(function(){
        // 获取选择的图片
        var file = this.files[0];
        // 转成字符串
        var str = getObjectUrl(file);
        // 先删除上一个
        $(this).prev('.img_preview').remove();
        // 在框的前面放一个图片
        $(this).before("<div class='img_preview'><img src='"+str+"' width='120' height='auto'></div>");
        });        
    }


    $('#select1').change(function(){
        // console.log(123456)
        var id = $(this).val();
        if(id!=''){
            $.ajax({
                type:'post',
                url:"{{route('ajaxpicture_add')}}",
                datdtype:"json",
                data:{id:id,_token:"{{csrf_token()}}"},
                success:function(a)
                {
                    console.log(a);
                    var str = '';
                    for(var i=0;i<a.length;i++)
                    {
                      str += "<option selected='selected' value="+a[i].id+">"+a[i].ify_name+"</option>" ;
                    }
                    $("#select2").html(str);
                    $("#select2").trigger("change");
                }
            })
        }
    })
    $('#select2').change(function(){
        var id = $(this).val();
        if(id!=''){
            $.ajax({
                type:'post',
                url:"{{route('ajaxpicture_add')}}",
                datdtype:"json",
                data:{id:id,_token:"{{csrf_token()}}"},
                success:function(a)
                {
                    var str = '';
                    for(var i=0;i<a.length;i++)
                    {
                      str += "<option selected='selected' value="+a[i].id+">"+a[i].ify_name+"</option>" ;
                    }
                    $("#select3").html(str);
                    $("#select3").trigger("change");
                }
            })
        }
    })
    $('#select3').change(function(){
        var id = $(this).val();
        if(id!=''){
            $.ajax({
                type:'post',
                url:"{{route('ajaxbrpicture_add')}}",
                datdtype:"json",
                data:{id:id,_token:"{{csrf_token()}}"},
                success:function(a)
                {
                    var str = '';
                    for(var i=0;i<a.length;i++)
                    {
                      str += "<option selected='selected' value="+a[i].id+">"+a[i].brand_name+"</option>" ;
                    }
                    $("#brselect1").html(str);
                    $("#brselect1").trigger("change");
                }
            })
        }
    })



    function getObjectUrl(file) {
    var url = null;
    if (window.createObjectURL != undefined) {
        url = window.createObjectURL(file)
    } else if (window.URL != undefined) {
        url = window.URL.createObjectURL(file)
    } else if (window.webkitURL != undefined) {
        url = window.webkitURL.createObjectURL(file)
    }
    return url
    }
    // 当选择图片时触发
    $(".image").change(function(){
        // 获取选择的图片
        var file = this.files[0];
        // 转成字符串
        var str = getObjectUrl(file);
        // 先删除上一个
        $(this).prev('.img_preview').remove();
        // 在框的前面放一个图片
        $(this).before("<div class='img_preview'><img src='"+str+"' width='120' height='auto'></div>");
    });


        $(function () {
            $("#add_picture").fix({
                float: 'left',
                skin: 'green',
                durationTime: false,
                stylewidth: '220',
                spacingw: 0,
                spacingh: 260,
            });
        });
        $(document).ready(function () {
            //初始化宽度、高度

            $(".widget-box").height($(window).height());
            $(".page_right_style").height($(window).height());
            $(".page_right_style").width($(window).width() - 220);
            //当文档窗口发生改变时 触发  
            $(window).resize(function () {

                $(".widget-box").height($(window).height());
                $(".page_right_style").height($(window).height());
                $(".page_right_style").width($(window).width() - 220);
            });
        });
        $(function () {
            var ue = UE.getEditor('editor');
        });
        /******树状图********/
        var setting = {
            view: {
                dblClickExpand: false,
                showLine: false,
                selectedMulti: false
            },
            data: {
                simpleData: {
                    enable: true,
                    idKey: "id",
                    pIdKey: "pId",
                    rootPId: ""
                }
            },
            callback: {
                beforeClick: function (treeId, treeNode) {
                    var zTree = $.fn.zTree.getZTreeObj("tree");
                    if (treeNode.isParent) {
                        zTree.expandNode(treeNode);
                        return false;
                    } else {
                        demoIframe.attr("src", treeNode.file + ".html");
                        return true;
                    }
                }
            }
        };

        var zNodes = [
            { id: 1, pId: 0, name: "商城分类列表", open: true },
            { id: 11, pId: 1, name: "蔬菜水果" },
            { id: 111, pId: 11, name: "蔬菜" },
            { id: 112, pId: 11, name: "苹果" },
            { id: 113, pId: 11, name: "大蒜" },
            { id: 114, pId: 11, name: "白菜" },
            { id: 115, pId: 11, name: "青菜" },
            { id: 12, pId: 1, name: "手机数码" },
            { id: 121, pId: 12, name: "手机 " },
            { id: 122, pId: 12, name: "照相机 " },
            { id: 13, pId: 1, name: "电脑配件" },
            { id: 131, pId: 13, name: "手机 " },
            { id: 122, pId: 13, name: "照相机 " },
            { id: 14, pId: 1, name: "服装鞋帽" },
            { id: 141, pId: 14, name: "手机 " },
            { id: 42, pId: 14, name: "照相机 " },
        ];

        var code;

        function showCode(str) {
            if (!code) code = $("#code");
            code.empty();
            code.append("<li>" + str + "</li>");
        }
        $(document).ready(function () {
            var t = $("#treeDemo");
            t = $.fn.zTree.init(t, setting, zNodes);
            demoIframe = $("#testIframe");
            //demoIframe.bind("load", loadReady);
            var zTree = $.fn.zTree.getZTreeObj("tree");
            //zTree.selectNode(zTree.getNodeByParam("id",'11'));
        });			
    </script>
    <script type="text/javascript">
        $(function () {
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });

            $list = $("#fileList"),
                $btn = $("#btn-star"),
                state = "pending",
                uploader;

            var uploader = WebUploader.create({
                auto: true,
                swf: 'lib/webuploader/0.1.5/Uploader.swf',

                // 文件接收服务端。
                server: 'http://lib.h-ui.net/webuploader/0.1.5/server/fileupload.php',

                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#filePicker',

                // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                resize: false,
                // 只允许选择图片文件。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/*'
                }
            });
            uploader.on('fileQueued', function (file) {
                var $li = $(
                    '<div id="' + file.id + '" class="item">' +
                    '<div class="pic-box"><img></div>' +
                    '<div class="info">' + file.name + '</div>' +
                    '<p class="state">等待上传...</p>' +
                    '</div>'
                ),
                    $img = $li.find('img');
                $list.append($li);

                // 创建缩略图
                // 如果为非图片文件，可以不用调用此方法。
                // thumbnailWidth x thumbnailHeight 为 100 x 100
                uploader.makeThumb(file, function (error, src) {
                    if (error) {
                        $img.replaceWith('<span>不能预览</span>');
                        return;
                    }

                    $img.attr('src', src);
                }, thumbnailWidth, thumbnailHeight);
            });
            // 文件上传过程中创建进度条实时显示。
            uploader.on('uploadProgress', function (file, percentage) {
                var $li = $('#' + file.id),
                    $percent = $li.find('.progress-box .sr-only');

                // 避免重复创建
                if (!$percent.length) {
                    $percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo($li).find('.sr-only');
                }
                $li.find(".state").text("上传中");
                $percent.css('width', percentage * 100 + '%');
            });

            // 文件上传成功，给item添加成功class, 用样式标记上传成功。
            uploader.on('uploadSuccess', function (file) {
                $('#' + file.id).addClass('upload-state-success').find(".state").text("已上传");
            });

            // 文件上传失败，显示上传出错。
            uploader.on('uploadError', function (file) {
                $('#' + file.id).addClass('upload-state-error').find(".state").text("上传出错");
            });

            // 完成上传完了，成功或者失败，先删除进度条。
            uploader.on('uploadComplete', function (file) {
                $('#' + file.id).find('.progress-box').fadeOut();
            });
            uploader.on('all', function (type) {
                if (type === 'startUpload') {
                    state = 'uploading';
                } else if (type === 'stopUpload') {
                    state = 'paused';
                } else if (type === 'uploadFinished') {
                    state = 'done';
                }

                if (state === 'uploading') {
                    $btn.text('暂停上传');
                } else {
                    $btn.text('开始上传');
                }
            });

            $btn.on('click', function () {
                if (state === 'uploading') {
                    uploader.stop();
                } else {
                    uploader.upload();
                }
            });

        });

        (function ($) {
            // 当domReady的时候开始初始化
            $(function () {
                var $wrap = $('.uploader-list-container'),

                    // 图片容器
                    $queue = $('<ul class="filelist"></ul>')
                        .appendTo($wrap.find('.queueList')),

                    // 状态栏，包括进度和控制按钮
                    $statusBar = $wrap.find('.statusBar'),

                    // 文件总体选择信息。
                    $info = $statusBar.find('.info'),

                    // 上传按钮
                    $upload = $wrap.find('.uploadBtn'),

                    // 没选择文件之前的内容。
                    $placeHolder = $wrap.find('.placeholder'),

                    $progress = $statusBar.find('.progress').hide(),

                    // 添加的文件数量
                    fileCount = 0,

                    // 添加的文件总大小
                    fileSize = 0,

                    // 优化retina, 在retina下这个值是2
                    ratio = window.devicePixelRatio || 1,

                    // 缩略图大小
                    thumbnailWidth = 110 * ratio,
                    thumbnailHeight = 110 * ratio,

                    // 可能有pedding, ready, uploading, confirm, done.
                    state = 'pedding',

                    // 所有文件的进度信息，key为file id
                    percentages = {},
                    // 判断浏览器是否支持图片的base64
                    isSupportBase64 = (function () {
                        var data = new Image();
                        var support = true;
                        data.onload = data.onerror = function () {
                            if (this.width != 1 || this.height != 1) {
                                support = false;
                            }
                        }
                        data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                        return support;
                    })(),

                    // 检测是否已经安装flash，检测flash的版本
                    flashVersion = (function () {
                        var version;

                        try {
                            version = navigator.plugins['Shockwave Flash'];
                            version = version.description;
                        } catch (ex) {
                            try {
                                version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                                    .GetVariable('$version');
                            } catch (ex2) {
                                version = '0.0';
                            }
                        }
                        version = version.match(/\d+/g);
                        return parseFloat(version[0] + '.' + version[1], 10);
                    })(),

                    supportTransition = (function () {
                        var s = document.createElement('p').style,
                            r = 'transition' in s ||
                                'WebkitTransition' in s ||
                                'MozTransition' in s ||
                                'msTransition' in s ||
                                'OTransition' in s;
                        s = null;
                        return r;
                    })(),

                    // WebUploader实例
                    uploader;

                if (!WebUploader.Uploader.support('flash') && WebUploader.browser.ie) {

                    // flash 安装了但是版本过低。
                    if (flashVersion) {
                        (function (container) {
                            window['expressinstallcallback'] = function (state) {
                                switch (state) {
                                    case 'Download.Cancelled':
                                        alert('您取消了更新！')
                                        break;

                                    case 'Download.Failed':
                                        alert('安装失败')
                                        break;

                                    default:
                                        alert('安装已成功，请刷新！');
                                        break;
                                }
                                delete window['expressinstallcallback'];
                            };

                            var swf = 'expressInstall.swf';
                            // insert flash object
                            var html = '<object type="application/' +
                                'x-shockwave-flash" data="' + swf + '" ';

                            if (WebUploader.browser.ie) {
                                html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
                            }

                            html += 'width="100%" height="100%" style="outline:0">' +
                                '<param name="movie" value="' + swf + '" />' +
                                '<param name="wmode" value="transparent" />' +
                                '<param name="allowscriptaccess" value="always" />' +
                                '</object>';

                            container.html(html);

                        })($wrap);

                        // 压根就没有安转。
                    } else {
                        $wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
                    }

                    return;
                } else if (!WebUploader.Uploader.support()) {
                    alert('Web Uploader 不支持您的浏览器！');
                    return;
                }

                // 实例化
                uploader = WebUploader.create({
                    pick: {
                        id: '#filePicker-2',
                        label: '点击选择图片'
                    },
                    formData: {
                        uid: 123
                    },
                    dnd: '#dndArea',
                    paste: '#uploader',
                    swf: 'lib/webuploader/0.1.5/Uploader.swf',
                    chunked: false,
                    chunkSize: 512 * 1024,
                    server: 'http://lib.h-ui.net/webuploader/0.1.5/server/fileupload.php',
                    // runtimeOrder: 'flash',

                    // accept: {
                    //     title: 'Images',
                    //     extensions: 'gif,jpg,jpeg,bmp,png',
                    //     mimeTypes: 'image/*'
                    // },

                    // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
                    disableGlobalDnd: true,
                    fileNumLimit: 300,
                    fileSizeLimit: 200 * 1024 * 1024,    // 200 M
                    fileSingleSizeLimit: 50 * 1024 * 1024    // 50 M
                });

                // 拖拽时不接受 js, txt 文件。
                uploader.on('dndAccept', function (items) {
                    var denied = false,
                        len = items.length,
                        i = 0,
                        // 修改js类型
                        unAllowed = 'text/plain;application/javascript ';

                    for (; i < len; i++) {
                        // 如果在列表里面
                        if (~unAllowed.indexOf(items[i].type)) {
                            denied = true;
                            break;
                        }
                    }

                    return !denied;
                });

                uploader.on('dialogOpen', function () {
                    console.log('here');
                });

                // uploader.on('filesQueued', function() {
                //     uploader.sort(function( a, b ) {
                //         if ( a.name < b.name )
                //           return -1;
                //         if ( a.name > b.name )
                //           return 1;
                //         return 0;
                //     });
                // });

                // 添加“添加文件”的按钮，
                uploader.addButton({
                    id: '#filePicker2',
                    label: '继续添加'
                });

                uploader.on('ready', function () {
                    window.uploader = uploader;
                });

                // 当有文件添加进来时执行，负责view的创建
                function addFile(file) {
                    var $li = $('<li id="' + file.id + '">' +
                        '<p class="title">' + file.name + '</p>' +
                        '<p class="imgWrap"></p>' +
                        '<p class="progress"><span></span></p>' +
                        '</li>'),

                        $btns = $('<div class="file-panel">' +
                            '<span class="cancel">删除</span>' +
                            '<span class="rotateRight">向右旋转</span>' +
                            '<span class="rotateLeft">向左旋转</span></div>').appendTo($li),
                        $prgress = $li.find('p.progress span'),
                        $wrap = $li.find('p.imgWrap'),
                        $info = $('<p class="error"></p>'),

                        showError = function (code) {
                            switch (code) {
                                case 'exceed_size':
                                    text = '文件大小超出';
                                    break;

                                case 'interrupt':
                                    text = '上传暂停';
                                    break;

                                default:
                                    text = '上传失败，请重试';
                                    break;
                            }

                            $info.text(text).appendTo($li);
                        };

                    if (file.getStatus() === 'invalid') {
                        showError(file.statusText);
                    } else {
                        // @todo lazyload
                        $wrap.text('预览中');
                        uploader.makeThumb(file, function (error, src) {
                            var img;

                            if (error) {
                                $wrap.text('不能预览');
                                return;
                            }

                            if (isSupportBase64) {
                                img = $('<img src="' + src + '">');
                                $wrap.empty().append(img);
                            } else {
                                $.ajax('lib/webuploader/0.1.5/server/preview.php', {
                                    method: 'POST',
                                    data: src,
                                    dataType: 'json'
                                }).done(function (response) {
                                    if (response.result) {
                                        img = $('<img src="' + response.result + '">');
                                        $wrap.empty().append(img);
                                    } else {
                                        $wrap.text("预览出错");
                                    }
                                });
                            }
                        }, thumbnailWidth, thumbnailHeight);

                        percentages[file.id] = [file.size, 0];
                        file.rotation = 0;
                    }

                    file.on('statuschange', function (cur, prev) {
                        if (prev === 'progress') {
                            $prgress.hide().width(0);
                        } else if (prev === 'queued') {
                            $li.off('mouseenter mouseleave');
                            $btns.remove();
                        }

                        // 成功
                        if (cur === 'error' || cur === 'invalid') {
                            console.log(file.statusText);
                            showError(file.statusText);
                            percentages[file.id][1] = 1;
                        } else if (cur === 'interrupt') {
                            showError('interrupt');
                        } else if (cur === 'queued') {
                            percentages[file.id][1] = 0;
                        } else if (cur === 'progress') {
                            $info.remove();
                            $prgress.css('display', 'block');
                        } else if (cur === 'complete') {
                            $li.append('<span class="success"></span>');
                        }

                        $li.removeClass('state-' + prev).addClass('state-' + cur);
                    });

                    $li.on('mouseenter', function () {
                        $btns.stop().animate({ height: 30 });
                    });

                    $li.on('mouseleave', function () {
                        $btns.stop().animate({ height: 0 });
                    });

                    $btns.on('click', 'span', function () {
                        var index = $(this).index(),
                            deg;

                        switch (index) {
                            case 0:
                                uploader.removeFile(file);
                                return;

                            case 1:
                                file.rotation += 90;
                                break;

                            case 2:
                                file.rotation -= 90;
                                break;
                        }

                        if (supportTransition) {
                            deg = 'rotate(' + file.rotation + 'deg)';
                            $wrap.css({
                                '-webkit-transform': deg,
                                '-mos-transform': deg,
                                '-o-transform': deg,
                                'transform': deg
                            });
                        } else {
                            $wrap.css('filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (~~((file.rotation / 90) % 4 + 4) % 4) + ')');
                            // use jquery animate to rotation
                            // $({
                            //     rotation: rotation
                            // }).animate({
                            //     rotation: file.rotation
                            // }, {
                            //     easing: 'linear',
                            //     step: function( now ) {
                            //         now = now * Math.PI / 180;

                            //         var cos = Math.cos( now ),
                            //             sin = Math.sin( now );

                            //         $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
                            //     }
                            // });
                        }


                    });

                    $li.appendTo($queue);
                }

                // 负责view的销毁
                function removeFile(file) {
                    var $li = $('#' + file.id);

                    delete percentages[file.id];
                    updateTotalProgress();
                    $li.off().find('.file-panel').off().end().remove();
                }

                function updateTotalProgress() {
                    var loaded = 0,
                        total = 0,
                        spans = $progress.children(),
                        percent;

                    $.each(percentages, function (k, v) {
                        total += v[0];
                        loaded += v[0] * v[1];
                    });

                    percent = total ? loaded / total : 0;


                    spans.eq(0).text(Math.round(percent * 100) + '%');
                    spans.eq(1).css('width', Math.round(percent * 100) + '%');
                    updateStatus();
                }

                function updateStatus() {
                    var text = '', stats;

                    if (state === 'ready') {
                        text = '选中' + fileCount + '张图片，共' +
                            WebUploader.formatSize(fileSize) + '。';
                    } else if (state === 'confirm') {
                        stats = uploader.getStats();
                        if (stats.uploadFailNum) {
                            text = '已成功上传' + stats.successNum + '张照片至XX相册，' +
                                stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
                        }

                    } else {
                        stats = uploader.getStats();
                        text = '共' + fileCount + '张（' +
                            WebUploader.formatSize(fileSize) +
                            '），已上传' + stats.successNum + '张';

                        if (stats.uploadFailNum) {
                            text += '，失败' + stats.uploadFailNum + '张';
                        }
                    }

                    $info.html(text);
                }

                function setState(val) {
                    var file, stats;

                    if (val === state) {
                        return;
                    }

                    $upload.removeClass('state-' + state);
                    $upload.addClass('state-' + val);
                    state = val;

                    switch (state) {
                        case 'pedding':
                            $placeHolder.removeClass('element-invisible');
                            $queue.hide();
                            $statusBar.addClass('element-invisible');
                            uploader.refresh();
                            break;

                        case 'ready':
                            $placeHolder.addClass('element-invisible');
                            $('#filePicker2').removeClass('element-invisible');
                            $queue.show();
                            $statusBar.removeClass('element-invisible');
                            uploader.refresh();
                            break;

                        case 'uploading':
                            $('#filePicker2').addClass('element-invisible');
                            $progress.show();
                            $upload.text('暂停上传');
                            break;

                        case 'paused':
                            $progress.show();
                            $upload.text('继续上传');
                            break;

                        case 'confirm':
                            $progress.hide();
                            $('#filePicker2').removeClass('element-invisible');
                            $upload.text('开始上传');

                            stats = uploader.getStats();
                            if (stats.successNum && !stats.uploadFailNum) {
                                setState('finish');
                                return;
                            }
                            break;
                        case 'finish':
                            stats = uploader.getStats();
                            if (stats.successNum) {
                                alert('上传成功');
                            } else {
                                // 没有成功的图片，重设
                                state = 'done';
                                location.reload();
                            }
                            break;
                    }

                    updateStatus();
                }

                uploader.onUploadProgress = function (file, percentage) {
                    var $li = $('#' + file.id),
                        $percent = $li.find('.progress span');

                    $percent.css('width', percentage * 100 + '%');
                    percentages[file.id][1] = percentage;
                    updateTotalProgress();
                };

                uploader.onFileQueued = function (file) {
                    fileCount++;
                    fileSize += file.size;

                    if (fileCount === 1) {
                        $placeHolder.addClass('element-invisible');
                        $statusBar.show();
                    }

                    addFile(file);
                    setState('ready');
                    updateTotalProgress();
                };

                uploader.onFileDequeued = function (file) {
                    fileCount--;
                    fileSize -= file.size;

                    if (!fileCount) {
                        setState('pedding');
                    }

                    removeFile(file);
                    updateTotalProgress();

                };

                uploader.on('all', function (type) {
                    var stats;
                    switch (type) {
                        case 'uploadFinished':
                            setState('confirm');
                            break;

                        case 'startUpload':
                            setState('uploading');
                            break;

                        case 'stopUpload':
                            setState('paused');
                            break;

                    }
                });

                uploader.onError = function (code) {
                    alert('Eroor: ' + code);
                };

                $upload.on('click', function () {
                    if ($(this).hasClass('disabled')) {
                        return false;
                    }

                    if (state === 'ready') {
                        uploader.upload();
                    } else if (state === 'paused') {
                        uploader.upload();
                    } else if (state === 'uploading') {
                        uploader.stop();
                    }
                });

                $info.on('click', '.retry', function () {
                    uploader.retry();
                });

                $info.on('click', '.ignore', function () {
                    alert('todo');
                });

                $upload.addClass('state-' + state);
                updateTotalProgress();
            });

        })(jQuery);
    </script>
</body>

</html>