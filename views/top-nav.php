<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
	<div class="container">
      	<a class="brand" href="./index.html">首页</a>
      	<div class="nav-collapse collapse">
        	<ul class="nav">

              	<li <?php if ($nav == 'home_page') echo 'class="active"';?>>
                	<a href="">首页</a>
              	</li>
              	<li <?php if ($nav == 'me_like') echo 'class="active"';?>>
                	<a href="">我喜欢</a>
              	</li>
              	<li <?php if ($nav == 'me_share') echo 'class="active"';?>>
               		<a href="/post/publish">分享</a>
              	</li>
              	<li <?php if ($nav == 'find') echo 'class="active"';?>>
                	<a href="">发现</a>
              	</li>
        	</ul>
          <div class="pull-right">
            <?php
              if (!empty($_SESSION['user'])) {
                ?>
                <li class="pull-right">
                  <a href=""><?php echo $_SESSION['user']['username'] ?></a>, 欢迎你！
                  <a href="/login/logout">退出</a>
                </li>
                <?php
              } else {
                ?>
                <a href="/login">登录</a><a href="/user/reg">注册</a>
                <?php
              }
            ?>
          </div>
      	</div>
	</div>
	</div>
</div>