<body>
<div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">演示</a>
        <a><cite>导航元素</cite></a>
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"
       href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <div class="layui-row">
        <dev class="layui-form layui-col-md12 x-so layui-form-pane">
            <button class="layui-btn top_cate_click" lay-submit="" lay-filter="sreach"
                    onclick="x_admin_show('编辑','<?= Yii::$app->urlManager->createUrl(['admin/editcate']) ?>')"><i
                        class="layui-icon"></i>增加
            </button>
        </dev>
    </div>

    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
    </xblock>
    <table class="layui-table layui-form">
        <thead>
        <tr>
            <th width="20">
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i
                            class="layui-icon">&#xe605;</i></div>
            </th>
            <th width="40">ID</th>
            <th width="120">地址</th>
            <th width="420">栏目名</th>
            <th width="50">排序</th>
            <th width="50">状态</th>
            <th width="220">操作</th>
        </thead>
        <tbody class="x-cate">


        <?php foreach ((array)$data as $k => $v): ?>
            <tr cate-id='<?= $v['id'] ?>' fid='<?= $v['pid'] ?>'>
                <input type="hidden" name="mune_id" value="<?= $v['id'] ?>">
                <input type="hidden" name="mune_pid" value="<?= $v['pid'] ?>">
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i
                                class="layui-icon">&#xe605;</i></div>
                </td>
                <td><?= $v['id'] ?></td>
                <td><?= $v['menu_url'] ?></td>
                <td>
                    <? if ( isset($data[$k + 1]['num']) && $data[$k + 1]['num'] > $v['num'] && $data[$k + 1]['pid'] != $v['pid'] ): ?>
                        <?php for ($i = 0; $i < $v['num'] + 1; $i++) {
                            echo "&nbsp";
                        } ?>
                        <i class="layui-icon x-show" status='true'>&#xe623;</i>
                        <?= $v['menu_name'] ?>
                    <?php else: ?>
                        <?php for ($i = 0; $i < $v['num'] * 2; $i++) {
                            echo "&nbsp";
                        } ?>
                        <?= "├" . $v['menu_name'] ?>
                    <?php endif; ?>
                </td>
                <td><?= $v['sort'] ?></td>
                <td>
                    <input type="checkbox" name="switch"
                           lay-text="开启|停用" <?= $v['status'] == 1 ? "checked=checked" : ''; ?> lay-skin="switch">
                </td>
                <td class="td-manage">
                    <button class="layui-btn layui-btn layui-btn-xs"
                            onclick="x_admin_show('编辑','<?= Yii::$app->urlManager->createUrl(['admin/editcate', 'id' => $v['id'], 'action' => 'edit']) ?>')">
                        <i class="layui-icon">&#xe642;</i>编辑
                    </button>

                    <button class="layui-btn layui-btn-warm layui-btn-xs"
                            onclick="x_admin_show('编辑','<?= Yii::$app->urlManager->createUrl(['admin/editcate', 'id' => $v['id'], 'action' => 'add']) ?>')">
                        <i class="layui-icon">&#xe642;</i>添加子栏目
                    </button>
                    <button class="layui-btn layui-btn-warm layui-btn-xs"
                            onclick="x_admin_show('编辑','<?= Yii::$app->urlManager->createUrl(['article/add', 'id' => $v['id'],'pid'=>$v['pid'] ]) ?>')">
                        <i class="layui-icon">&#xe642;</i>添加文章
                    </button>
                    <button class="layui-btn-danger layui-btn layui-btn-xs" onclick="member_del(this,<?= $v['id'] ?>)"
                            href="javascript:;"><i class="layui-icon">&#xe640;</i>删除
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
<script>
    layui.use(['form'], function () {
        form = layui.form;

    });
    /*用户-删除*/
    function member_del(obj, id) {
        layer.confirm('确认要删除吗？', function (index) {
            var url = "<?= Yii::$app->urlManager->createUrl(['admin/del'])?>";
            $.ajax({
                url: url,
                data: {
                    id: id
                },
                type: "POST",
                dataType: "json",
                success: function (msg) {
                    if (!msg.code) {
                        alert(msg.data.message);
                    } else {
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!', {icon: 1, time: 1000});
                    }
                },
                error: function (error) {

                }
            });
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

    $(function () {
//        $(".top_cate_click").click(function () {
//            var menu_name = $("input[name='cate_name']").val();
//            var url = "<?//= Yii::$app->urlManager->createUrl(['admin/addcate'])?>//";
//            $.ajax({
//                url: url,
//                data: {
//                    id: 0,
//                    menu_name: menu_name,
//                    pid: 0,
//                    sort: 0,
//                    menu_url: 0,
//                    status: 0,
//                    type: 0
//                },
//                type: "POST",
//                dataType: "json",
//                success: function (msg) {
//                    if (!msg.code) {
//                        alert(msg.data.message);
//                    } else {
//                        alert('添加成功');
//                        javascript:location.replace(location.href);
//                    }
//
//                },
//                error: function (error) {
//
//                }
//            });
//
//        })
    })
</script>
</body>

</html>