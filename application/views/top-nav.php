<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
	<div class="container">
      	<a class="brand" href="./index.html">首页</a>
      	<div class="nav-collapse collapse">
        	<ul class="nav">
              	<li class="">
                	<a href="">首页</a>
              	</li>
              	<li class="">
                	<a href="">Get started</a>
              	</li>
              	<li class="active">
               		<a href="">Scaffolding</a>
              	</li>
              	<li class="">
                	<a href="">Base CSS</a>
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