<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jeremy,Wang/Idaddy">
    <title>Message Admin v1.0</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../dist/css/index.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php include_once 'menu.html' ?>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">&nbsp;&nbsp;图文消息</h3>
                </div>

                <div class="row content">

                    <div class="col-lg-4 min-height normal-border dark-backgroud">
                        <p class="margin-top-10">图文列表</p>
                        <div class="appmsgItemLists" id="appmsgItemLists">
                            <div class="appmsgTop focus appmsgItem" id="appmsgItem-0">
                                <img class="img" src="http://pics.sc.chinaz.com/files/pic/pic9/201602/apic19071.jpg" width="100%" height="100%">
                                <div class="appmsgTop-title appmsg-title-public">标题</div>
                            </div>
                            <div class="appmsg-add border-top-none appmsgItems" id="js_add_appmsg">
                                <em>+</em>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 min-height normal-border appmsgEditorLists" id="appmsgEditorLists">
                        <div class="col-lg-12 appmsgEditor" id="appmsgEditor-0">
                            <span>标题</span>
                            <input type="text" placeholder="请输入标题" onkeyup="keyUp('title',this,this.value)"/>
                            <span class="flot-left bottom-30"><em class="title_size">0</em>/<em>64</em></span>
                            <span>摘要&nbsp;&nbsp;<small class="small">仅头条图文需要填写此项</small></span>
                            <textarea placeholder="请输入内容" onkeyup="keyUp('content',this)"></textarea>
                            <span class="flot-left bottom-70"><em class="content_size">0</em>/<em>120</em></span>
                            <span>添加封面 (选填)&nbsp;&nbsp;&nbsp;<small class="small">大图尺寸建议900*500,小图尺寸建议200*200</small></span>
                            <span class="input-file">本地上传<input type="file" value="本地上传" style="border: none;" onchange="handleFiles(this)"></span>
                            <span>添加封面 (选填)</span>
                            <input type="text" placeholder="请输入url链接" onkeyup="changeImg(this,this.value)" style="margin-bottom: 10px;"/>
                            <span>正文链接</span>
                            <input type="text" placeholder="请输入url链接"/>
                        </div>
                    </div>

                    <div class="col-lg-12 button-group normal-border">
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
    </div>

    <!--demo start-->
    <div class="hide" data-tag="demo" >
        <!-- appmsgEditor start -->
        <div class="col-lg-12 appmsgEditor" id="appmsgEditor-demo">
            <span>标题</span>
            <input type="text" placeholder="请输入标题" onkeyup="keyUp('title',this,this.value)"/>
            <span class="flot-left bottom-30"><em class="title_size">0</em>/<em>64</em></span>
            <span>摘要&nbsp;&nbsp;<small class="small">仅头条图文需要填写此项</small></span>
            <textarea placeholder="请输入内容" onkeyup="keyUp('content',this)"></textarea>
            <span class="flot-left bottom-70"><em class="content_size">0</em>/<em>120</em></span>
            <span>添加封面 (选填)&nbsp;&nbsp;&nbsp;<small class="small">大图尺寸建议900*500,小图尺寸建议200*200</small></span>
            <span class="input-file">本地上传<input type="file" value="本地上传" style="border: none;" onchange="handleFiles(this)"></span>
            <span>添加封面 (选填)</span>
            <input type="text" placeholder="请输入url链接" onkeyup="changeImg(this,this.value)" style="margin-bottom: 10px;"/>
            <span>正文链接</span>
            <input type="text" placeholder="请输入url链接"/>
        </div>
        <!-- appmsgEditor End -->

        <!-- appmsgItem start -->
        <div class="appmsgItem border-top-none position-relative" id="appmsgItem_demo">
            <div class="col-lg-9 appmsg-title appmsg-title-public">标题</div>
            <div class="col-lg-3">
                <img class="pull-right img appmsgItem-img" src="">
            </div>
            <div class="appmsg-bucket hide" id="appmsg-bucket">&nbsp;&nbsp;<i class="fa fa-bitbucket fa-fw"></i></div>
        </div>
        <!-- appmsgItem end-->
    </div>
    <!--demo end-->

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/index.js"></script>
</body>
</html>