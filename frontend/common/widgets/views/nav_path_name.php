<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="color-green pull-left"><?= $path_info_name['action'] ?></h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.html"><?= $path_info_name['controller'] ?></a> <span class="divider">/</span></li>
            <?php if (isset($path_info_name['pages'])): ?>
                <li><a href="">Pages</a> <span class="divider">/</span></li>
            <?php endif; ?>
            <li class="active"><?= $path_info_name['action'] ?></li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->