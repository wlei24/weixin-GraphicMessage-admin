<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jeremy,Wang/Idaddy">
    <title>Message Admin v1.0</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body{overflow-x: hidden;min-width:1200px;}
        .page-header{margin:20px 0;}
        .container{margin:0 20px;font-size:15px;overflow-y: auto;}
        .container .min-height{min-height:700px;}
        .container .hide{display: none;}
        .pictext p{margin-top: 10px;}
        .pictext .focus{border:2px solid #B0E2FF !important;}
        .pictext .lists{width: 80%;margin: 30px auto;height: 600px;overflow-y: auto;}
        .pictext .top{width:100%;height: 160px;background: #fff;border: 1px solid #d3d3d3;position: relative;padding: 15px;}
        .pictext .top-title{width:100%;background: rgba(0,0,0,0.5);bottom: 0;position: absolute;padding: 5px 10px;bottom: 15px;width: 246px;color: #fff;}
        .pictext .level-1{width:100%;height: 100px;background: #fff;border: 1px solid #d3d3d3;padding: 15px 2px;border-collapse: collapse;border-top:0;}
        .pictext .level-add{width:100%;height: 100px;border: 1px dashed #d3d3d3;font-size: 30px;text-align: center;padding-top: 25px;border-top:0;}
        .level-1-img{width: 68px;height: 68px;background: #d3d3d3;}
        .information {margin: 30px 50px;line-height:30px;}
        .information span,input,textarea{display: block;outline: none;}
        .information input:focus,textarea:focus{border:2px solid #B0E2FF;}
        .information input,textarea{width:75%;margin: 10px 0 0 0;padding: 0 8px;border: 1px solid #e3e3e3;}
        .information input{height: 45px;}
        .information textarea{height: 120px;}
        .information .flot-left{position: relative;left: 78%;color: #BFBFBF;line-height: 15px;}
        .information .bottom-30{bottom: 30px;}
        .information .bottom-70{bottom: 70px;}
        .information .small{color:#BFBFBF;}
        .button-list {border:1px solid #d3d3d3;height:60px;margin-bottom: 20px;margin-top: 15px;}
        .button-list button{position: relative;top:12px;margin-right: 40px;}
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Message Admin v1.0</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php include_once 'menu.html' ?>
                </div>
            </div>
        </nav>

        <div id="page-wrapper" class="menu-item">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">&nbsp;&nbsp;图文消息</h3>
                </div>
            </div>
            <div class="row container">
                <div class="col-lg-4 min-height" style="background: #f8f8f8;">
                    <div class="row">
                        <div class="col-lg-12 pictext">
                            <p>图文列表</p>
                            <div class="lists">
                                <div class="top focus level-all" id="level1">
                                    <img class="img" src="http://pics.sc.chinaz.com/files/pic/pic9/201602/apic19071.jpg" style="width: 100%;height: 100%;">
                                    <div class="top-title">
                                    </div>
                                </div>
                                <div class="level-add" id="addPicText">
                                    <b>+</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 min-height" style="border:1px solid #d3d3d3;">
                    <div class="row" id="informationList">
                        <div class="col-lg-12 information" id="information">
                            <span>标题</span>
                            <input type="text" placeholder="请输入标题" class="test-title" onkeyup="keyUp('title',this,this.value)"/>
                            <span class="flot-left bottom-30"><b class="title_size">0</b> / 64</span>
                            <span>摘要&nbsp;&nbsp;<small class="small">仅头条图文需要填写此项</small></span>
                            <textarea placeholder="请输入内容" onkeyup="keyUp('content',this)"></textarea>
                            <span class="flot-left bottom-70"><b class="content_size">0</b> / 120</span>
                            <span>添加封面&nbsp;&nbsp;( 选填 )&nbsp;&nbsp;&nbsp;<small class="small">大图尺寸建议900*500,小图尺寸建议200*200</small></span>
                            <input type="file" value="本地上传" style="border: none;" onchange="handleFiles(this)">
                            <span>添加封面&nbsp;&nbsp;( 选填 )</span>
                            <input type="text" placeholder="请输入url链接" onkeyup="changeImg(this,this.value)"/>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 button-list">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <button class="btn btn-primary">保&nbsp;存</button>
                        <button class="btn btn-primary">预&nbsp;览</button>
                        <button class="btn btn-primary">群&nbsp;发</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- level demo start -->
    <div class="level-1 hide level-all" id="level" style="position: relative;">
        <div class="col-lg-9 level-title">标题</div>
        <div class="col-lg-3">
            <img class="pull-right level-1-img" src="">
        </div>
        <div style="position: absolute;bottom: 0;width:100%;background: rgba(0,0,0,0.4);height: 40px;left: 0;font-size: 18px;line-height: 40px;" class="hide">&nbsp;&nbsp;<i class="fa fa-bitbucket fa-fw"></i></div>
    </div>
    <!-- level demo end -->

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#addPicText').click(function(){
                var level1 = $('#level').clone(true)
                level1.attr('id','level-'+($('.lists').children('.level-1').length+1));
                level1.removeClass('hide');
                $('#addPicText').before(level1);

                var information = $('#information').clone(true);
                var informationList = $('#informationList').children('.col-lg-12');

                informationList.each(function(){
                    $(this).hide();
                });

                information.attr('id','information-'+informationList.length);
                information.show();
                $('#informationList').append(information);
            });
        });

        $('.level-1').hover(function () {
            $(this).children('div').eq(2).removeClass('hide');
        },function () {
            $(this).children('div').eq(2).addClass('hide');
        })

        $('.level-all').click(function(){
            $('.level-all').removeClass('focus');
            $(this).addClass('focus');

            var flag = ''

            if($(this).attr('id').indexOf('-') > -1){
                var id =$(this).attr('id').split('-');
                flag = 'array'
            }

            $('.information').each(function(){
                if(flag != '' && $(this).attr('id') == 'information-'+id[1]){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }

            });

            if(flag == '')
                $('#information').show();
            else
                $('#information').hide();
        });

        $('.test-title').on('keypress',function(){});

        

        function changeImg(obj,value) {
            var img = new Image();
            img.src = value;
            img.onload = function() {
                console.log('true');
                $('#level1 .img').attr('src',value);
            };
            img.onerror = function() {
                $('#level1 .img').attr('src',value);
            }
        }

        function handleFiles(obj) {
            var files = obj.files, img = new Image();

            if(window.URL){
                var name = files[0].name;
                checkImgSuffix(name);
                img.src = window.URL.createObjectURL(files[0]);
            }else if(window.FileReader){
                var reader = new FileReader();
                reader.readAsDataURL(files[0]);
                reader.onload = function(e){
                    img.src = this.result;
                }
            }else{
                //ie
                obj.select();
                obj.blur();
                var nfile = document.selection.createRange().text;
                document.selection.empty();
                img.src = nfile;
            }

            $('#level1 .img').attr('src',img.src);
        }


        function checkImgSuffix(name){

            var mime = name.toLowerCase().substr(name.lastIndexOf("."));

            var suffix = ['.jpg','.png','.gif'];
            if(suffix.indexOf(mime) <= -1)
                alert('文件格式错误');
            else
                alert('success');
        }

    </script>

</body>

</html>
