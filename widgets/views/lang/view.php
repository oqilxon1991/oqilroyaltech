<?php
use yii\helpers\Html;
?>
<style>
        .dropbtn {
            background-color: #336699;
            color: white;
            padding: 6px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 125px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            margin-left: 10px;
        }
        .dropdown-content li {
            list-style-type: none;
        }

        .dropdown-content a:hover {color: blue}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
        #flags {
            background-repeat: no-repeat;
            background-position: left;
            float: left;
            margin-left: 10px;
            background-margin-left: -10px;
        } 
    </style>

<div class="col-md-6">
    <div class="top-header-left">
        <ul>
            <li>
                <div class="dropdown" id="lang">
                    <button class="dropbtn" id="current-lang"><i class="fa fa-language" aria-hidden="true"></i> <?= $current->name;?> <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                    <ul class="dropdown-content" id="langs">
                        <?php foreach ($langs as $lang):?>
                            <li class="item-lang">
                                <i id="flags" style="background-image:url(/images/<?= $lang->icon;?>);"><?= Html::a($lang->name, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?></i>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        USD  <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">СУМ </a></li>
                    </ul>
                </div>
            </li>
            <li>

            </li>
        </ul>
    </div>
</div>