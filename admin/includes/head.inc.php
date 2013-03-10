<?php if (!defined('IN_AP')) exit('Access Denied'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php
if ($mode == 'dashboard') {

} elseif ($mode == 'pages') {
  echo "頁面管理．";
} elseif ($mode == 'settings') {
  echo "網站設定．";
}
    ?>UCMS 控制台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="static/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="static/css/panel.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="panel">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a class="brand" href="?">UCMS 控制台</a>
            <ul class="nav">
                <li<?php if ($mode == 'dashboard') echo ' class="active"' ?>><a href="?mode=dashboard">儀表板</a></li>
                <li<?php if ($mode == 'pages') echo ' class="active"' ?>><a href="?mode=pages">頁面管理</a></li>
                <li<?php if ($mode == 'settings') echo ' class="active"' ?>><a href="?mode=settings">網站設定</a></li>
            </ul>
            <ul class="nav pull-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">歡迎，admin！ <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-cog"></i> 帳號設定</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-off"></i> 登出</a></li>
              </ul>
            </li>
            </ul>
          </div>
        </div>
      </div>
