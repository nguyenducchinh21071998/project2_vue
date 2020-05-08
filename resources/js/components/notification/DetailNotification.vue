<template>
    <div class="container-fluid">
            <router-link class="btn btn-sm btn-primary" to="/dashboard"> <span>Dashboard</span></router-link>
            <router-link class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" to="/notification"> <span>Quản lý bài viết</span>  </router-link>
        <div class="card shadow mb-4 mf-10">
            <div class="card-header py-3">
                <h6 class="text-center m-0 font-weight-bold text-primary">Xem chi tiết thông báo</h6>
            </div>
            <div class="card-header py-3">
                <h6>Tiêu đề thông báo: {{this.detailNotification.title}}</h6>
            </div>
            <div class="card-body">
                Nội dung thông báo : {{this.detailNotification.content}}
            </div>
        </div>      
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                detailNotification: {
                    title: '',
                    content: ''
                },
                notificationId: null,
                title: '',
            }
        },
         mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.notificationId = id;
            axios.get('/detail/' + id)
                .then(function (resp) {
                    app.detailNotification = resp.data.data;
                    console.log(app.detailNotification['title'])
                })
                .catch(function () {
                    alert("Could not load your company")
                });
        },
    }
</script>