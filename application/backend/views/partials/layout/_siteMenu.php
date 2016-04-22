<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<nav role="navigation" class="navbar-default l-navbar l-navbar--static-side ">
    <div class="sidebar-collapse">
        <ul id="side-menu" class="nav">
            <li>
                <a href="<?php echo Url::to(['site/index']); ?>" id="SiteNav_Home">
                    <svg class="m-nav__icon icon--home"><use xlink:href="/dist/vendors/icons.svg#icon-home"></use> </svg>
                    Dashboard
                </a>
            </li>
            <li class="m-nav__list-item">
                <a href="<?php echo Url::to(['blog/index']); ?>" id="SiteNav_Blog">
                    <svg class="m-nav__icon icon--comment"><use xlink:href="/dist/vendors/icons.svg#icon-comment"></use> </svg>
                    Blog
                </a>
            </li>
        </ul>
    </div>
</nav>
