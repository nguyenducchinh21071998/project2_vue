<template>
    <main>
        <div>
            <div id="wrapper">
                <!-- <Silebar /> -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <!-- <Header /> -->
                        <router-view></router-view>
                    </div>
                    <!-- <Footer /> -->
                </div>

            </div>
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

        </div>
    </main>
</template>
<script>
    import Header from './components/layout/Header.vue';
    import Footer from './components/layout/Footer.vue';
    import Silebar from './components/layout/Silebar.vue';
    export default {
        components: {
            Header,
            Footer,
            Silebar,
        }
    }
</script>