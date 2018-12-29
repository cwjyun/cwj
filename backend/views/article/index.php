<style type="text/css">
    .downpanel .layui-select-title span {
        line-height: 38px;
    }

    /*继承父类颜色*/
    .downpanel dl dd:hover {
        background-color: inherit;
    }
</style>
<style type="text/css">
    body {
        height: 100%;
        width: 100%;
        background-size: cover;
        margin: 0 auto;
    }

    td {
        font-size: 12px !important;
    }

    .layui-form-checkbox span {
        height: 30px;
    }

    .layui-field-title {
        border-top: 1px solid white;
    }

    table {
        width: 100% !important;
    }

</style>
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
       href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
            <div class="layui-form-item">
                <label class="layui-form-label">文章栏目</label>
                <div class="layui-input-inline">
                    <div class="layui-unselect layui-form-select downpanel">
                        <div class="layui-select-title">
                            <span class="layui-input layui-unselect" id="treeclass">选择栏目</span>
                            <input type="hidden" name="selectID" value="0">
                            <i class="layui-edge"></i>
                        </div>
                        <dl class="layui-anim layui-anim-upbit">
                            <dd>
                                <ul id="classtree"></ul>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加用户','./order-add.html')"><i class="layui-icon"></i>添加
        </button>
        <span class="x-right" style="line-height:40px">共有数据：<?= $data['aritcle_count'] ?> 条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i
                            class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>文章标题</th>
            <th>文章内容</th>
            <th>文章类型</th>
            <th>文章所属</th>
            <th>是否删除</th>
            <th>发布状态</th>
            <th>是否允许评论</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['aritcle_list'] as $k => $v): ?>
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i
                                class="layui-icon">&#xe605;</i>
                    </div>
                </td>
                <td><?= $v['id'] ?></td>
                <td><?= $v['aritcle_name'] ?></td>
                <td><?= $v['aritcle_con'] ?></td>
                <td><?= $v['type'] ?></td>
                <td><?= $v['m_id'] ?></td>
                <td><?= $v['is_hidden'] == 1 ? "否" : "是" ?></td>
                <td><?= $v['status'] == 1 ? "否" : "是" ?></td>
                <td><?= $v['is_discuss'] == 1 ? "否" : "是" ?></td>
                <td><?= $v['create_time'] ?></td>
                <td><?= $v['update_time'] ?></td>
                <td class="td-manage">
                    <a title="查看" onclick="x_admin_show('编辑','order-view.html')" href="javascript:;">
                        <i class="layui-icon">&#xe63c;</i>
                    </a>
                    <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="page">
        <div>
            <a class="prev" href="">&lt;&lt;</a>
            <a class="num" href="">1</a>
            <span class="current">2</span>
            <a class="num" href="">3</a>
            <a class="num" href="">489</a>
            <a class="next" href="">&gt;&gt;</a>
        </div>
    </div>

</div>
<script>
    layui.use('laydate', function () {
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });
    });

    /*用户-停用*/
    function member_stop(obj, id) {
        layer.confirm('确认要停用吗？', function (index) {

            if ($(obj).attr('title') == '启用') {

                //发异步把用户状态进行更改
                $(obj).attr('title', '停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!', {icon: 5, time: 1000});

            } else {
                $(obj).attr('title', '启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!', {icon: 5, time: 1000});
            }

        });
    }

    /*用户-删除*/
    function member_del(obj, id) {
        layer.confirm('确认要删除吗？', function (index) {
            //发异步删除数据
            $(obj).parents("tr").remove();
            layer.msg('已删除!', {icon: 1, time: 1000});
        });
    }


    function delAll(argument) {

        var data = tableCheck.getData();

        layer.confirm('确认要删除吗？' + data, function (index) {
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
    }
</script>
<script type="text/javascript">
    layui.use(['element', 'tree', 'layer', 'form', 'upload'], function () {
        var $ = layui.jquery, tree = layui.tree;
        tree({
            elem: "#classtree",
            nodes: <?= $data['nav']?>,
            click: function (node) {
                var id = node.id;
                window.location.href = "<?= Yii::$app->urlManager->createUrl(['article/index'])?>?id=" + id;
                var $select = $($(this)[0].elem).parents(".layui-form-select");
                $select.removeClass("layui-form-selected").find(".layui-select-title span").html(node.name).end().find("input:hidden[name='selectID']").val(node.id);
            }
        });
        $(".downpanel").on("click", ".layui-select-title", function (e) {
            $(".layui-form-select").not($(this).parents(".layui-form-select")).removeClass("layui-form-selected");
            $(this).parents(".downpanel").toggleClass("layui-form-selected");
            layui.stope(e);
        }).on("click", "dl i", function (e) {
            layui.stope(e);
        });
        $(document).on("click", function (e) {
            $(".layui-form-select").removeClass("layui-form-selected");
        });

    });
</script>
</script>
</body>

</html>