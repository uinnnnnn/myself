<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
</head>
<body>
    <div class="container-fluid bg-muted shadow-sm">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <a href="<?php echo site_url('article/index') ?>" class="navbar-brand h1 text-muted">CodeIgniter 3 簡易留言板</a>
				<!-- site_url(‘xxx’) = base_url . index_page . xxx  -->
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="nav-item"><span class="nav-link h6">你好, xxx</span></li>
                <li class="nav-item">
                    <a class="nav-link h6" href="#">登出</a>
                </li>
            </ul>
        </nav>
    </div>


