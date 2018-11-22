<?php
use yii\helpers\Html;
?>
    <script language="javascript" type="text/javascript">
        function clearText(field)
        {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }
    </script>

</head>
<body id="home">
<!-- | | |   w w w . t e m p l a t e m o . c o m   | | | -->
<div id="templatemo_wrapper">
    <?php include 'nav.php';?>
    
    <div id="templatemo_middle">
        <div id="mid_slider"><span></span>
            <div id="slider1" class="sliderwrapper">

                <div class="contentdiv">
                    <?= Html::img('@web/dome/images/slider/image_00.jpg',[ 'alt'=>'Image 00'])?>
                </div>

                <div class="contentdiv">
                    <?= Html::img('@web/dome/images/slider/image_01.jpg',[ 'alt'=>'Image 01'])?>
                </div>

                <div class="contentdiv">
                    <?= Html::img('@web/dome/images/slider/image_02.jpg',[ 'alt'=>'Image 02'])?>
                </div>

                <div class="contentdiv">
                    <?= Html::img('@web/dome/images/slider/image_03.jpg',[ 'alt'=>'Image 03'])?>
                </div>

            </div>

            <div id="paginate-slider1" class="pagination">

            </div>

            <script type="text/javascript">

                featuredcontentslider.init({
                    id: "slider1",  //id of main slider DIV
                    contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
                    toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
                    nextprev: ["", ""],  //labels for "prev" and "next" links. Set to "" to hide.
                    revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
                    enablefade: [true, 0.4],  //[true/false, fadedegree]
                    autorotate: [true, 2000],  //[true/false, pausetime]
                    onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
                        //previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
                        //curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
                    }
                })

            </script>
        </div>
        <div id="mid_left">
            <div id="mid_title">Web Design Company</div>
            <p>Aliquam in odio ut ipsum mollis facilisis. Integer est sem, dignissim quis auctor vel, dapibus vel massa. Curabitur vulputate ligula vel mi semper tempus. Vivamus volutpat, elit non tempor vehicula.</p>
            <div id="learn_more"><a href="#">Learn More</a></div>
        </div>
        <div class="cleaner"></div>
    </div> <!-- end of middle -->

    <div id="templatemo_main">
        <div id="templatemo_content">

            <div class="col_allw300">
                <h2>Products</h2>
                <p><em>Curabitur interdum, nulla sed posuere gravida, urna est lobortis odio, eu mauris lorem eu nisl.</em></p>
                <p>Aliquam in odio ut ipsum mollis facilisis. Integer est sem, dapibus vel massa. Curabitur vulputate ligula vel mi semper tempus. Vivamus volutpat, elit non tempor vehicula. Integer est sem, dignissim quis auctor vel, dapibus vel.</p>

                <ul class="templatemo_list">
                    <li>Sed nec eros egestas nisl </li>
                    <li>Morbi sed nulla ac est cursus </li>
                    <li>Curabitur ullamcorper nibh </li>
                    <li>Pellentesque adipiscing </li>
                    <li>Aliquam eget nibh nulla</li>
                    <li>Mauris imperdiet mollis nibh </li>
                    <li>Sed vel diam eget enim</li>
                    <li>Vestibulum at tellus mauris</li
                    ></ul>
                <div class="cleaner"></div>
                <a href="#" class="more">Read more</a>
            </div>

            <div class="col_allw300">
                <h2>Updates</h2>
                <div class="sb_news_box">
                    <?= Html::img('@web/dome/images/templatemo_image_05.jpg',[ 'alt'=>1])?>
                    <div class="news_date">OCT 28, 2048</div>
                    <h6><a href="#">Fusce sem nulla, rutrum ac suscipit eget, commodo vitae est.</a></h6>

                    <div class="cleaner"></div>
                </div>
                <div class="sb_news_box">
                    <?= Html::img('@web/dome/images/templatemo_image_03.jpg',[ 'alt'=>1])?>
                    <div class="news_date">OCT 24, 2048</div>
                    <h6><a href="#">Donec et purus velit, eget euismod risus consectetur dolo.</a></h6>

                    <div class="cleaner"></div>
                </div>
                <div class="sb_news_box">
                    <?= Html::img('@web/dome/images/templatemo_image_04.jpg',[ 'alt'=>1])?>
                    <div class="news_date">OCT 16, 2048</div>
                    <h6><a href="#">Curabitur scelerisque, in lacinia massa consectetur sit amet.</a></h6>
                    <div class="cleaner"></div>
                </div>
                <div class="sb_news_box">
                    <?= Html::img('@web/dome/images/templatemo_image_06.jpg',[ 'alt'=>1])?>
                    <div class="news_date">OCT 12, 2048</div>
                    <h6><a href="#">Praesent eu dolor nibh. In hac habitasse platea dictumst. </a></h6>
                    <div class="cleaner"></div>
                </div>

                <a href="#" class="more">Read All</a>
            </div>

            <div class="col_allw300 col_last">
                <h2>Featured Sites</h2>
                <div class="fp_lw_box">
                    <div class="image_frame"><span></span><?= Html::img('@web/dome/images/templatemo_image_01.jp',[ 'alt'=>1])?></div
                    ><p><em>Morbi sed nulla ac est cursus suscipit ac lectus.</em></p>
                </div>
                <div class="fp_lw_box">
                    <div class="image_frame"><span></span><?= Html::img('@web/dome/images/templatemo_image_02.jpg',[ 'alt'=>1])?></div
                    ><p><em>Proin iaculis dui vel lorem vulputate venenatis.</em></p>
                </div>
                <div class="cleaner"></div>
                <a href="#" class="more">Read more</a>
            </div>
            <div class="cleaner"></div>
        </div> <!-- end of templatemo_content -->
    </div> <!-- end of templatemo_main -->
</div> <!-- end of wrapper -->

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">

        <div class="col_allw300">
            <h4>Our Pages</h4>
            <ul class="footer_list">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="col_allw300">
            <h4>Our Partners</h4>
            <ul class="footer_list">
                <li><a href="http://www.koflash.com/" target="_parent">Flash Gallery</a></li>
                <li><a href="#" target="_parent">Free Flash Templates</a></li>
                <li><a href="#" target="_parent">Free CSS Templates</a></li>
                <li><a href="#store" target="_parent">Premiun Templates</a></li>
                <li><a href="http://www.webdesignmo.com/" target="_parent">Web Design Blog</a></li>
            </ul>
        </div>
        <div class="col_allw300 col_last">
            <h4>About Us</h4>
            <p>Blue Smoothie is a <a href="#" target="_blank">free CSS template</a> brought to you by <a href="#" target="_blank">templatemo.com</a>. Feel free to download, modify and apply this template for your websites. Credit goes to <a href="#" target="_blank">Free Photos</a>. Lorem ipsum dolor sit amet. Nullam faucibus ipsum ac sapien tincidunt auctor. Nunc risus tortor. Validate <a href="#" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="#" rel="nofollow"><strong>CSS</strong></a>.</p>
        </div>

        <div class="cleaner"></div>

    </div> <!-- end of templatemo_footer -->
    <div class="cleaner"></div>
</div>



</body>
</html>