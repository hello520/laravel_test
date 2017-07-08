$(function () {
    var json = '';
    $.ajax({
        headers: {
            'X-XSRF-TOKEN': document.cookie.match('XSRF-TOKEN')
        },
        async:false,
        method:'get',
        url:'/menu/ajax-menu',
        success:function (data1) {
            console.log(data1);
            json = data1;
        }
    });
    function tree(data) {
        for (var i = 0; i < data.length; i++) {
            var data2 = data[i];
            if (data[i].icon == "icon-th") {
                $("#rootUL").append("<li data-name='" + data[i].code + "'><span><i class='" + data[i].icon + "'></i> " + data[i].name + "</span>" +
                    "<div class = 'tree_right'><label class='switch switch-success'><input type='checkbox' checked=''><span></span></label>" +
                    "<a href='/menu/edit/"+data[i].id+"' data-toggle='tooltip' title='编辑' class='btn btn-effect-ripple btn-sm btn-success'>编辑</a>" +
                    "<a href='/menu/delete/"+data[i].id+"' data-toggle='tooltip' title='删除' class='btn btn-effect-ripple btn-sm btn-danger'>删除</a>" +
                    "</div></li>");
            } else {
                var children = $("li[data-name='" + data[i].parentCode + "']").children("ul");
                if (children.length == 0) {
                    $("li[data-name='" + data[i].parentCode + "']").append("<ul></ul>")
                }
                $("li[data-name='" + data[i].parentCode + "'] > ul").append(
                    "<li data-name='" + data[i].code + "'>" +
                    "<span>" +
                    "<i class='" + data[i].icon + "'></i> " +
                    data[i].name +
                    "</span>" +
                    "<div class = 'tree_right'><label class='switch switch-success'><input type='checkbox' checked=''><span></span></label>" +
                    "<a href='/menu/edit/"+data[i].id+"' data-toggle='tooltip' title='编辑' class='btn btn-effect-ripple btn-sm btn-success'>编辑</a>" +
                    "<a href='/menu/delete/"+data[i].id+"' data-toggle='tooltip' title='删除' class='btn btn-effect-ripple btn-sm btn-danger'>删除</a>" +
                    "</div></li>")
            }
            for (var j = 0; j < data[i].child.length; j++) {
                var child = data[i].child[j];
                var children = $("li[data-name='" + child.parentCode + "']").children("ul");
                if (children.length == 0) {
                    $("li[data-name='" + child.parentCode + "']").append("<ul></ul>")
                }
                $("li[data-name='" + child.parentCode + "'] > ul").append(
                    "<li data-name='" + child.code + "'>" +
                    "<span>" +
                    "<i class='" + child.icon + "'></i> " +
                    child.name +
                    "</span>" +
                    "<div class = 'tree_right'><label class='switch switch-success'><input type='checkbox' checked=''><span></span></label>" +
                    "<a href='/menu/edit/"+data[i].id+"' data-toggle='tooltip' title='编辑' class='btn btn-effect-ripple btn-sm btn-success'>编辑</a>" +
                    "<a href='/menu/delete/"+data[i].id+"' data-toggle='tooltip' title='删除' class='btn btn-effect-ripple btn-sm btn-danger'>删除</a>" +
                    "</div></li>")
                var child2 = data[i].child[j].child;
                tree(child2)
            }
            tree(data[i]);
        }

    }
    tree(json)

});