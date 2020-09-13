    @extends('layouts.app')
    @section('content')

    <!-- <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>事件</title> -->
    <!-- <script src="/https/cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/https/unpkg.com/bootstrap-table@1.15.2/dist/bootstrap-table.min.css">
    <script src="/https/unpkg.com/bootstrap-table@1.15.2/dist/bootstrap-table.min.js"></script>
    <script src="/https/unpkg.com/bootstrap-table@1.15.2/dist/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="/https/unpkg.com/bootstrap-table@1.15.2/dist/extensions/editable/bootstrap-table-editable.min.js"></script>

    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.css" media="screen">
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<!--    <script type="text/javascript" src="https://raw.githack.com/smalot/bootstrap-datetimepicker/master/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>-->
    <!-- <link rel="stylesheet" href="/layui/css/layui.css"> -->
    <link rel="stylesheet" href="/css/css.css"/>
        <div class="wrapper">
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="panel-body" style="padding-bottom:0px;">
                            <div id="toolbar" class="btn-group">
                                <button id="addRow" type="button" class="btn  btn-success">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
                                </button>
                                <button id="delete" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-remove"></i> 删除
                                </button>
                            </div>
                            <div class="box">
                                <div class="box-body">
                                    <table id="table" data-response-handler="responseHandler">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
<script>
    var add  = false;
    selections = [];
    $(function () {
        //1.初始化Table
        var oTable = new TableInit();
        oTable.Init();

        //2.初始化Button的点击事件
        var oButtonInit = new ButtonInit();
        oButtonInit.Init();

    });

    var TableInit = function () {
        var oTableInit = new Object();
        //初始化Table
        oTableInit.Init = function () {

            var columns = [{
                checkbox: true
            }, {
                title: '序号',
                align: 'center',
                valign: 'middle',
                // sortable: 'true',
                formatter: function (value, row, index) {//序号
                    var index = index + 1;
                    return ' <span class = "weight" >' + index  + '</span>'
                },
            }, {
                title: '操作',
                field: 'operate',
                class: 'operate',
                align: 'center',
                valign: 'middle',
                events: window.operateEvents,
                formatter: operateFormatter//如需操作行数据,直接添加formatter对应函数名参数分别为value, row, index
                // }, {
                //     title: '子标签',
                //     field: 'subtag',
                //     align: 'center',
                //     valign: 'middle',
                //     class: 'editable'
            }, {
                title: 'id',
                field: 'id',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
            }, {
                title: '发生时间',
                field: 'onwhen',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',//TODO
                formatter: emptyFormatter
            }, {
                title: '记录时间',
                field: 'now',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                formatter: emptyFormatter
            }, {
                title: '标签',
                field: 'tag',
                align: 'center',  //text-
                valign: 'middle',    //vertical-
                sortable: 'true',
                class: 'editable', // 给需要编辑的字段加上class
                formatter: emptyFormatter
            }, {
                title: '描述',
                field: 'description',
                align: 'center',
                valign: 'middle',
                // sortable: 'true',
                // class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '谁',
                field: 'who',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '连接',
                field: 'action',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '谁',
                field: 'withwho',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '在哪里',
                field: 'inwhere',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '做',
                field: 'doing',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '什么',
                field: 'what',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '原因',
                field: 'forwhy',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '子事件',
                field: 'subwhat',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '来源',
                field: 'source',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '公开',
                field: 'opened',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '结束',
                field: 'remind',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '重复',
                field: 'repet',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '备注',
                field: 'comment',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }, {
                title: '链接',
                field: 'url',
                align: 'center',
                valign: 'middle',
                sortable: 'true',
                class: 'editable',
                formatter: emptyFormatter
            }];
            $('#table').bootstrapTable({
                cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
                // cardView: false,                    //是否显示详细视图
                // checkboxHeader: true,
                clickToSelect: true,                //是否启用点击选中行
                columns: columns,
                // dataField: 'rows',
                // detailView: false,                   //是否显示父子表onEditableSave
                height: 800,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
                // method: 'get',                      //请求方式（*）
                minimumCountColumns: 2,             //最少允许的列数

                // queryParams: oTableInit.queryParams,//传递参数（*）
                // pageNumber:1,                       //初始化加载第一页，默认第一页
                // pageSize: 10,                       //每页的记录行数（*）
                pageList: [10,25,50,100,1000],      //可供选择的每页的行数（*）
                pagination: true,                   //是否显示分页（*）
                // paginationLoop:false,
                // paginationPreText:'上一页',
                // paginationNextText:'下一页',
                // showFooter:true,//显示列脚
                // showPaginationSwitch:true,//是否显示数据条数选择框
                sidePagination: "server",           //分页方式：client客户端分页，server服务端分页（*）
                responseHandler: responseHandler,
                search: true,                       //是否显示表格搜索 <, >, <=, =<, >=, =>
                searchOnEnterKey: true,//回车搜索
                strictSearch: true,                 //精确搜索

                // showColumns: true,                  //是否显示所有的列
                showRefresh: true,                  //是否显示刷新按钮
                showToggle:true,                    //是否显示详细视图和列表视图的切换按钮
                // singleSelect: false,
                // sortable: true,                     //是否启用排序
                sortName : 'onwhen',
                // sortOrder: "asc",                   //排序方式
                striped: true,                      //是否显示行间隔色
                toolbar: '#toolbar',                //工具按钮用哪个容器
                // totalField: 'total',
                undefinedText: "",
                uniqueId: "id",                     //每一行的唯一标识，一般为主键列
                url: '/thing/whats'         //请求后台的URL（*）
                // ,
                // onClickRow: function(row, $element) {
                //     //$element是当前tr的jquery对象
                //     $element.css("background-color", "green");
                // },//单击row事件
                // locale: "zh-CN", //中文支持
                // detailView: false, //是否显示详情折叠
                // detailFormatter: function(index, row, element) {
                //     var html = '';
                //     $.each(row, function(key, val){
                //         html += "<p>" + key + ":" + val +  "</p>"
                //     });
                //     return html;
                // }

                // , onEditableSave: function (field, row, oldValue, $el) {
                //     $.ajax({
                //         type: "post",
                //         url: "/edit",
                //         data: { strJson: JSON.stringify(row) },
                //         success: function (data, status) {
                //             if (status == "success") {
                //                 alert("编辑成功");
                //             }
                //         },
                //         error: function () {
                //             alert("Error");
                //         },
                //         complete: function () {
                //
                //         }
                //
                //     });
                // }
                , onLoadSuccess: function (data) {//{total: 1, rows: Array(1)}
                    // $(".form_datetime").datetimepicker({format: 'yyyy-MM-dd HH:mm:ss'});
                    //dd MM yyyy - HH:ii p
                    // addRowtemp();
                    // laydate.render({
                    //     elem: '#onwhen0' //指定元素
                    //     ,type: 'datetime'
                    // });
                    $('#table').find('thead input[type=checkbox]').on("click",//TODO
                        function () {
                            if($(this).is(":checked")) {
                                $('#Table').bootstrapTable('togglePagination').bootstrapTable('checkAll')
                                    .bootstrapTable('togglePagination');
                            }else {
                                $('#Table').bootstrapTable('togglePagination').bootstrapTable('uncheckAll')
                                    .bootstrapTable('togglePagination');
                            }
                        }
                    );
                }
                // , onSort: function (name,order) {
                //     $('#table').bootstrapTable('refreshOptions', {
                //         sortName:name,
                //         sortOrder:order
                //     });
                // }
            });
        };

        //得到查询的参数
        oTableInit.queryParams = function (params) {
            var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
                limit: params.limit,   //页面大小
                offset: params.offset,  //页码
                search:params.search,//搜索 keyword
                sortOrder: params.order,//排序
                sort:params.sort,//排序字段
                // page: (params.offset / params.limit) + 1,//页码
            };
            return temp;
        };
        return oTableInit;
    };
    // $('#memberTable').bootstrapTable('hideColumn', 'member_id');


    var ButtonInit = function () {
        var oInit = new Object();
        var postdata = {};

        oInit.Init = function () {
            //初始化页面上面的按钮事件
        };

        return oInit;
    };
    function emptyFormatter(value, row, index , dataField) {
        // return value;
        var val;
        if(dataField == "onwhen" || dataField == "now" || dataField == "remind") value = getTimeStrByDate(value);
        // if($.isEmptyObject(value)) {
        // if(typeof(value)=="undefined" || value === null ){
        if(!value) val = "";
        else val = value;

        // if(val == 0) val = "否";
        if(val == 1) val = "√";
        if(dataField == "description") val = toString(row);

        // if(dataField == "onwhen") {
        //     // return '<input size="16" type="text" value="'+val+'" class="form_datetime"> <span class="add-on"><i class="icon-th"></i></span>';
        //     return '<div class="input-group date form_datetime col-md-5">\n' +
        //         '<input class="form-control" style="width:165px;" size="16" type="text" value="'+val+'" readonly>\n' +
        //         '<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>\n' +
        //         '<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>\n' +
        //         '</div>';
        // }
        //
        // // return "<input placeholder='"+dataField+"' onkeyup='inputonkeyup(this)' disabled='true' value='" + val + "'/>";
        // if(this.class && this.class.toString().indexOf("editable") != -1) {
        //     if(val == '')
        //         return "<input onkeyup='inputonkeyup(this)' disabled='true' value='" + val + "'/>";
        //     else {
        //         // var text_length = val.replace(/[^/u0000-/u00ff]/g,"aa").length;//获取当前文本框的长度
        //         var current_width = parseInt(val.length) *13+10;//13是每个字符的长度
        //         return "<input style='width:"+current_width+"px;' onkeyup='inputonkeyup(this)' disabled='true' value='" + val + "'/>";
        //     }
        // }else
        return '<text name="'+dataField+'">'+val+'</text>';
    }
    function toString(row){
        var des = "";
        if(row.who){
            des += row.who;
        }
        if(row.inwhere){
            des += row.inwhere;
        }
        if(row.forwhy){
            des += "因为"+row.forwhy;
        }
        if(row.action){
            des += row.action;
        }
        if(row.withwho){
            des += row.withwho;
        }
        if(row.doing){
            des += row.doing;
        }
        if(row.what){
            des += row.what;
        }
        return des;
    }
    function getTimeStrByDate(value) {
        if(value) {// && value > 0
            date = new Date(value);
            var y = date.getFullYear();
            var M = date.getMonth() + 1;
            var d = date.getDate();
            var H = date.getHours();
            var m = date.getMinutes();
            var s = date.getSeconds();
            timeStr = y + '-' + (M < 10 ? ('0' + M) : M) + '-' + (d < 10 ? ('0' + d) : d) + " " + (H < 10 ? ('0' + H) : H) + ":" + (m < 10 ? ('0' + m) : m) + ":" + (s < 10 ? ('0' + s) : s);
            if(timeStr) return timeStr;
        }
        return value;
    }
    function getDateByTimeStr(timeStr) {
        var timeArr = timeStr.split(" ");
        var d = timeArr[0].split("-");
        var t = timeArr[1].split(":");
        date = new Date(d[0], (d[1] - 1), d[2], t[0], t[1], t[2]);
        if(date) return date;
        return  timeStr;
    }

    //create
    $('#addRow').click(function (){
        addRowtemp();
    })
    function addRowtemp() {
        var data = {
            id : "temp"
        };
        $("#table").bootstrapTable('prepend', data);

        columns = $("#table").bootstrapTable('getVisibleColumns').map(function (it) {
            return it.field
        });//JSON.stringify(
        console.log(columns);
        // (22) [0, 1, "id", "operate", "onwhen", "now", "tag", "description", "who", "action", "withwho", "inwhere", "doing", "what", "forwhy", "subwhat", "url", "source", "opened", "comment", "repet", "remind"]
        // var count = 0;
        $("#table tr:first-child td").each(function (count) {
            if(this.className == "editable") {
                if(count == columns.indexOf("onwhen") || count == columns.indexOf("remind"))// || count == columns.indexOf("remind"))
                    $(this).html('<div class="input-group date form_datetime col-md-5">\n' +
                        '<input class="form-control" style="width:165px;" size="16" type="text"  value="" readonly>\n' +
                        '<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>\n' +
                        '<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>\n' +
                        '</div>');
                else if(count == columns.indexOf("opened")) $(this).html('<input type="checkbox"/>');
                else if(count == columns.indexOf("url")) $(this).html('<input pattern="https://.*" />');
                else $(this).html('<input/>');
            }
            refreshDatatime();
        });
        var operate = $("#table tr:first-child td.operate")[0].firstChild;
        operate.innerHTML = operate.innerHTML.replace("glyphicon glyphicon-edit","glyphicon glyphicon-ok");
    }

    //update
    function operateFormatter(value, row, index) {
        return [
            '<a class="edit" href="javascript:void(0)" title="Edit">',
            '<i class="glyphicon glyphicon-edit"></i>',
            '</a>  ',
            '<a class="remove" href="javascript:void(0)" title="Remove">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }

    function editFormatter(value, row, index){
        return [
            '<a class="edit" href="javascript:void(0)" title="edit">',
            '<i class="glyphicon glyphicon-ok"></i>',
            '</a>  ',
            '<a class="remove" href="javascript:void(0)" title="remove">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }
    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            var operate = $("#table tr:nth-child(" + (index + 1) + ") td.operate")[0].firstChild;
            if(operate.innerHTML.indexOf("glyphicon-ok") != -1){
                saveRow(row, index);
            }else {
                $("#table tr:nth-child(" + (index + 1)).attr('data-edit', true) //编辑标志
                $("#table tr:nth-child(" + (index + 1) + ") td.editable").each(function () {
                    var text = this.getElementsByTagName("text");
                    // this.lastChild.disabled = false;
                    var val = $(this).text();
                    var name = $(text[0]).attr("name");
                    if(name == "opened") {
                        if(val == "√") $(this).html('<input type="checkbox" checked="checked"/>');
                        else $(this).html('<input type="checkbox"/>');
                    }else if(name == "onwhen" || name == "remind") {
                        $(this).html('<div class="input-group date form_datetime col-md-5">\n' +
                            '<input class="form-control" style="width:165px;" size="16" type="text" value="' + val + '" readonly>\n' +
                            '<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>\n' +
                            '<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>\n' +
                            '</div>');
                        refreshDatatime();
                    }
                    else $(this).html('<input value="' + val + '"/>');
                    // if(value != "" && value != "-" & value != 0)
                });
                // $("#table tr:nth-child(" + (index + 1) + ") td.operate").html(editFormatter())
                operate.innerHTML = operate.innerHTML.replace("glyphicon glyphicon-edit","glyphicon glyphicon-ok");
            }
        },
        'click .remove': function (e, value, row, index) {
            var edit = $("#table tr:nth-child(" + (index + 1)).attr('data-edit')?true:false;
            if (edit) { //编辑状态回归
            } else if(row.id != "temp"){
                deleteids([row.id]);
            }
            refreshTable(row, index);
        }
    };
    //保存数据
    function saveRow(row, index) {
        var key = [];
        $("#table tr").first().children("th").each(function (index,object) {
            key.push($(this).attr("data-field"))
        })
        // console.log(key)
        var map = {};
        $("#table tr:nth-child(" + (index + 1) + ") td").each(function (index) {

            if(this.className == "editable") {
                var input = this.getElementsByTagName("input");
                var val = input[0].value;//this.lastChild.value;
                if (val && val != "") {
                    if(val.match("[0-9]{2}:[0-9]{2}:[0-9]{2}")) val = getDateByTimeStr(val);
                    if(key[index] == "opened") val = input[0].checked;
                    map[key[index]] = val;
                }
            }
        })
        if(row.id != "temp"){
            map["id"] = row.id;
            save(map,"put")
        }else{
            save(map,"post")
        }
        console.log(map)
        refreshTable(row, index);
    }

    function save(map,type){
        $.ajax({
            type: type,
            contentType:"application/json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/thing/whats",//+"?_token={{csrf_token()}}",
            data: JSON.stringify(map), //$('#dataFrom').serialize(),
            success: function (data, status) {
                if (status == "success") {
                    $('#table').bootstrapTable('refresh');
                }
            },
            error: function () {
                alert("Error");
            },
            complete: function () {

            }
        });
    }

    //delete
    $('#delete').click(function () {
        var ids = getIdSelections();
        deleteids(ids);
    });
    function getIdSelections() {
        return $.map($('#table').bootstrapTable('getSelections'), function (row) {
            if(row.id != "temp")
                return row.id
        });
    }
    function deleteids(ids){
        // $('#table').bootstrapTable('remove', {
        //     field: 'id',
        //     values: ["temp"]
        // });
        if(ids.length > 0) {
            $('#table').bootstrapTable('remove', {
                field: 'id',
                values: ids
            });
            $.ajax({
                type: "delete",
                // dataType: "json", //不需要返回值
                contentType: "application/json",
                url: "/thing/whats"+"?_token={{csrf_token()}}"+"&ids="+ids.toString(),
<!--                data: JSON.stringify(ids),-->
                success: function (data, status) {
                    if (status == "success") {
                        alert("删除成功");
                    }
                },
                error: function () {
                    alert("Error");
                },
                complete: function () {

                }
            });
        }
        // $('#table').bootstrapTable('refresh');
        refreshTable({id : "temp"},0)
    }

    //refresh
    function refreshTable(row, index) { //静默刷新
        var edit = $("#table tr:nth-child(" + (index + 1)).attr('data-edit')?true:false;
        if (edit) {
            var operate = $("#table tr:nth-child(" + (index + 1) + ") td.operate")[0].firstChild;
            operate.innerHTML = operate.innerHTML.replace("glyphicon glyphicon-ok", "glyphicon glyphicon-edit");
            $("#table tr:nth-child(" + (index + 1)).attr('data-edit', false);
            $("#table tr:nth-child(" + (index + 1) + ") td.editable").each(function () {
                var input = this.getElementsByTagName("input");
                var val = input[0].value;//this.lastChild.value;
                if (val)
                    $(this).html(val);

                // this.lastChild.disabled = true;
            });
        }
        $('#table').bootstrapTable('remove', {
            field: 'id',
            values: ["temp"]
        });
        $('#table').bootstrapTable('refresh');
        // $('#table').bootstrapTable('refresh', {
        // silent: true,
        // pageNumber:1,
        // pageSize:15
        // url: '',
        // query: ''
        // })
    }
    function refreshDatatime() {
        $('.form_datetime').datetimepicker({
            format: 'yyyy-MM-dd HH:ii:ss',
            // startDate: "2013-02-14 10:00",
            // language:  'zh-CN',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
    }

    //response
    function responseHandler(res) {
        // var btSelectAll = document.getElementsByName("btSelectAll")[0];
        // btSelectAll.onclick = fbtSelectAll;//"btSelectAll(this)";

        $.each(res.rows, function (i, row) {
            row.state = $.inArray(row.id, selections) !== -1;
        });
        return res;
    }

    // $(document).bind("input propertychange",function(event){
    var inputs = document.getElementsByTagName("input");
    inputs.forEach(function (currentValue, key, array) {
        console.log(currentValue)
    });
    // });

    function inputonkeyup(input){
        var text_length = input.value.length;//获取当前文本框的长度
        var current_width = parseInt(text_length) *13;//13是每个字符的长度
        console.log(current_width)
        // input.css("width",current_width+"px");
        input.style.width = current_width+"px";
    }
    // var $thr = $('table tr');
    // var $checkAll = $thr[0].find('input');
    function fbtSelectAll(){
        $("#table").bootstrapTable("checkAll");
        // btSelectAll.checkboxEnabled = true;
        // btSelectAll.onclick = function(){
        //     if(this.checked) {
        //         $("#table").bootstrapTable("checkAll");
        //     }else{
        //         $("#table").bootstrapTable("uncheckAll");
        //     }
        // };
    }
</script>
@endsection