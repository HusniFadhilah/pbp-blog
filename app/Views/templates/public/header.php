<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link href="<?= base_url() ?>/assets/fonts/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <title>Public</title>

    <!-- CUSTOM STYLE -->
    <style>
        .comment {
            position: relative;
        }

        .comment-img {
            border-radius: 50%;
            max-width: 50px;
            margin-right: 15px;
        }

        .comment h5 {
            margin: 0;
            padding: 0;
        }

        .comment h5,
        .comment img {
            display: table-cell;
            vertical-align: top;
        }

        .comment h5 a {
            color: #000;
            font-size: 18px;
        }

        .comment h5 a:hover {
            color: #ff9800;
            transition: all 0.3s;
            text-decoration: none;
        }

        .comment .reply {
            font-size: 16px;
            margin-left: 10px;
        }

        .comment .comment-reply {
            padding-left: 40px;
        }

        .comment a i.fa {
            font-size: 12px;
        }

        .comment time {
            color: #777;
            font-size: 15px;
        }

        .clearfix::after {
            display: block;
            clear: both;
            content: "";
        }
    </style>
</head>

<body>