<template>
 <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-dark navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <!-- <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template-dark/index.html">
                            <div class="brand-logo"></div>
                            <h2 class="brand-text mb-0">Vuexy</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div> -->
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item" data-menu=""><router-link class="nav-link" :to="{name: 'home'}"><i class="feather icon-home"></i><span>Home</span></router-link> </li>
                    <li class=" nav-item" data-menu=""><router-link class="nav-link" :to="{name: 'buy'}"><i class="feather icon-shopping-cart"></i><span>Buy</span></router-link> </li>
                    <li class=" nav-item" data-menu=""><router-link class="nav-link" :to="{name: 'sell'}"><i class="feather icon-shield"></i><span>Spend</span></router-link> </li>
                    <li class=" nav-item" data-menu=""><router-link class="nav-link" :to="{name: 'market'}"><i class="feather icon-server"></i><span>Trades</span></router-link> </li>
                    <li class=" nav-item" data-menu=""><router-link class="nav-link" :to="{name: 'help'}"><i class="feather icon-help-circle"></i><span>Help</span></router-link> </li>
                   </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->
</template>