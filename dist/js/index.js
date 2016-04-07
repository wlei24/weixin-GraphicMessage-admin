/**
 * Created by wlei24 on 16/4/7.
 */

var globalNum = 1;

$(document).ready(function(){
    init();

    $('#js_add_appmsg').click(function(){
        js_add_appmsg_click(this);
    });

    $('.appmsgItem').click(function () {
        js_appmsg_click(this);
    });

    $('#appmsg-bucket').click(function () {
        js_bucket_click(this);
    });

    $('.appmsgItem').hover(function () {
        $(this).children('div').eq(2).removeClass('hide');
    },function () {
        $(this).children('div').eq(2).addClass('hide');
    });
});

//初始化
function init(){
    var windowHeight = $(window).height() - 51 ;
    $('#page-wrapper').css('min-height',windowHeight+'px');
}

//点击图文选项
function js_appmsg_click(obj){
    var id =$(obj).attr('id').split('-');
    $('#appmsgItemLists .appmsgItem').removeClass('focus');
    $(obj).addClass('focus');
    $('#appmsgEditorLists .appmsgEditor').hide();
    $('#appmsgEditor-'+id[1]).show();
}

//添加图文
function js_add_appmsg_click(obj){
    //追加图文选项
    var appmsgItem = $('#appmsgItem_demo').clone(true);
    appmsgItem.attr('id','appmsgItem-'+globalNum);
    $('#js_add_appmsg').before(appmsgItem);

    //追加信息页
    var appmsgEditor = $('#appmsgEditor-demo').clone(true);
    appmsgEditor.attr('id','appmsgEditor-'+globalNum);
    $('#appmsgEditorLists').append(appmsgEditor);

    //隐藏所有选项与信息页
    $('#appmsgEditorLists .appmsgEditor').hide();
    $('#appmsgItemLists .appmsgItem').removeClass('focus');

    //展示最新选项与信息也
    appmsgItem.addClass('focus');
    appmsgEditor.show();

    //技术+1
    size++;
}

//计算字数
function keyUp(str,obj,value){
    var size = $(obj).val().length;
    var parent = $(obj).parent().attr('id');
    $( '#'+parent+' .'+str+'_size').html(size);

    if(str == 'title'){
        var id = parent.split('-');
        $('#appmsgItem-'+id[1]+' .appmsg-title-public').html($(obj).val());
    }
}

//url修改图片
function changeImg(obj,value) {
    var img = new Image();
    img.src = value;

    var id = $(obj).parent().attr('id').split('-');

    img.onload = function(obj) {
        console.log('图片正常');
        $('#appmsgItem-'+id[1]+' .img').attr('src',value);
    };
    img.onerror = function() {
        console.log('图片异常');
        $('#appmsgItem-'+id[1]+' .img').attr('src',value);
    }
}

//本地上传修改图片
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
    }else{//ie
        obj.select();
        obj.blur();
        var nfile = document.selection.createRange().text;
        document.selection.empty();
        img.src = nfile;
    }

    var id = $(obj).parent().parent().attr('id').split('-');
    $('#appmsgItem-'+id[1]+' .img').attr('src',img.src);
}

//检查文件后缀
function checkImgSuffix(name){
    var mime = name.toLowerCase().substr(name.lastIndexOf("."));
    var suffix = ['.jpg','.png','.gif'];
    if(suffix.indexOf(mime) <= -1)
        alert('文件格式错误');
    else
        alert('success');
}

//删除某条图文
function js_bucket_click(obj){
    if(confirm("确定删除") == true){
        var id = $(obj).parent().attr('id').split('-');
        $('#appmsgItem-'+id[1]).remove();
        $('#appmsgEditor-'+id[1]).remove();

        $('#appmsgItem-0').addClass('focus');
        $('#appmsgEditor-0').show();

    }
}