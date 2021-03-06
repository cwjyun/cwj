<?php
 use yii\helpers\Html;
?>
<!--=== Footer ===-->
<div class="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span4">
                <!-- About -->
                <div class="headline"><h3>About</h3></div>
                <p class="margin-bottom-25">Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals.</p>

                <!-- Monthly Newsletter -->
                <div class="headline"><h3>Monthly Newsletter</h3></div>
                <p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>
                <form class="form-inline" />
                <div class="input-append">
                    <input type="text" placeholder="Email Address" class="input-medium" />
                    <button class="btn-u">Subscribe</button>
                </div>
                </form>
            </div><!--/span4-->

            <div class="span4">
                <div class="posts">
                    <div class="headline"><h3>Recent Blog Entries</h3></div>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><?= Html::img('@path_root/img/sliders/elastislide/6.jpg')?></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><?= Html::img('@path_root/img/sliders/elastislide/10.jpg')?></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><?= Html::img('@path_root/img/sliders/elastislide/11.jpg')?></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a></p>
                        </dd>
                    </dl>
                </div>
            </div><!--/span4-->

            <div class="span4">
                <!-- Monthly Newsletter -->
                <div class="headline"><h3>Contact Us</h3></div>
                <address>
                    25, Lorem Lis Street, Orange <br />
                    California, US <br />
                    Phone: 800 123 3456 <br />
                    Fax: 800 123 3456 <br />
                    Email: <a href="mailto:info@anybiz.com" class="">cwjyun@163.com</a>
                </address>

                <!-- Stay Connected -->
                <div class="headline"><h3>Stay Connected</h3></div>
                <ul class="social-icons">
                    <li><a href="#" data-original-title="Feed" class="social_rss"></a></li>
                    <li><a href="#" data-original-title="Facebook" class="social_facebook"></a></li>
                    <li><a href="#" data-original-title="Twitter" class="social_twitter"></a></li>
                    <li><a href="#" data-original-title="Goole Plus" class="social_googleplus"></a></li>
                    <li><a href="#" data-original-title="Pinterest" class="social_pintrest"></a></li>
                    <li><a href="#" data-original-title="Linkedin" class="social_linkedin"></a></li>
                    <li><a href="#" data-original-title="Vimeo" class="social_vimeo"></a></li>
                </ul>
            </div><!--/span4-->
        </div><!--/row-fluid-->
    </div><!--/container-->
</div><!--/footer-->
<!--=== Copyright ===-->
<div class="copyright">
    <div class="container">
        <div class="row-fluid">
            <div class="span8">
                <p>Copyright &copy; 2014.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
            </div>
            <div class="span4">
                <a href="index.html"><?= Html::img('@path_root/img/logo2-default.png',['id'=>'logo-footer','class'=>'pull-right'])?></a>
            </div>
        </div><!--/row-fluid-->
    </div><!--/container-->
</div><!--/copyright-->
<!--=== End Copyright ===-->