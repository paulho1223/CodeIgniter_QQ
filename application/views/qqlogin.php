<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>QQ Login Testing Web</title>
    </head>
    <body>
        <?php if (empty($user)) { ?>
            <a href="<?php echo site_url("welcome/qq_login") ?>" target="_self"><img src="http://qzonestyle.gtimg.cn/qzone/vas/opensns/res/img/Connect_logo_5.png" /></a>
        <?php } else { ?>
            <img src="<?php echo $user['figureurl_2']; ?>" />Hi, <?php echo $user['nickname']; ?>
        <?php } ?>
    </body>
</html>