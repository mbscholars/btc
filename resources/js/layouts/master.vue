<template>
<div>
    <app-header :config="config"></app-header>
<app-nav :config="config"></app-nav> 


<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{title}}</h2>
                            <!-- <div class="breadcrumb-wrapper col-12">
                                 <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="sk-layout-2-columns.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Starter Kit</a>
                                    </li>
                                    <li class="breadcrumb-item active">Floating Navbar
                                    </li>
                                </ol> 
                            </div> -->
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
        <transition leave-active-class="" enter-active-class="animated fade">
	        <router-view @emitMeta="changeInfo" :config="config"></router-view>
    </transition>
            </div>
        </div>
</div>
<!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-dark navbar-shadow">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019. All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


</div>
 
</template>
<script>
export default {
    data(){
        return {
              title: '',
            config: {
                settings: {url: window.location.origin},
                user: false,
                country: {},
              

            },
            
        }

    },
    methods:
    {
        changeInfo(event){
            this.title =  event.title;
        }

    },
    mounted(){
        var url = window.location.origin

        axios.get('api/config').then((response) => {
            this.config.settings = {url: response.data.settings.url}
            this.config.user = response.data.user;
            this.config.country = response.data.country;
        });
    //   axios.get('api/user')
    //   this.$loadScript(url+'/ui/app-assets/vendors/js/vendors.min.js').then()
    
    //   this.$loadScript(url+'/ui/app-assets/vendors/js/ui/jquery.sticky.js').then()
    //   this.$loadScript(url+'/ui/app-assets/vendors/js/charts/apexcharts.min.js').then()
    //   this.$loadScript(url+'/ui/app-assets/vendors/js/extensions/tether.min.js').then()
    //   this.$loadScript(url+'/ui/app-assets/vendors/js/extensions/shepherd.min.js').then()
   
    //   this.$loadScript(url+'/ui/app-assets/js/core/app-menu.js').then()
    //   this.$loadScript(url+'/ui/app-assets/js/core/app.js').then()
    //   this.$loadScript(url+'/ui/app-assets/js/scripts/components.js').then()
   

    //   this.$loadScript(url+'/ui/app-assets/js/scripts/pages/dashboard-analytics.js').then()


    }    
}
</script>
