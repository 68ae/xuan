<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>程选网，首页</title>
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
            background: #ebeced;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title">你好，欢迎你。</div>
        </div>
    </div>
</body>
<script type="text/javascript">
    window.onblur = function() {
        document.title = "发呆- ( ゜- ゜)つロ ";
    window.onfocus = function() {
        document.title = "程选网，首页";
     }
    };
</script>
</html>