<template>
    <div class="container-fluid">
        <router-link class="btn btn-sm btn-primary" to="/dashboard"> <span>Dashboard</span></router-link>
        <router-link class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" to="/notification"> <span>Quản lý bài viết</span>  </router-link>
        <h1 class="h3 mb-2 text-gray-800">Quản lý thông báo</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-primary btn-sm" @click="showModal">Thêm mới thông báo</button>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên thông báo</th>
                        <th>Nội dung thông báo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(listNotification, index) in listNotifications" :key="listNotification.id">
                        <td>{{index + 1}}</td>
                        <td>{{listNotification.title}}</td>
                        <td>{{listNotification.content}}</td>
                        <td>
                            <router-link :to="{name: 'detail-notification', params: {id: listNotification.id}}" class="btn btn-xs btn-primary">Xem chi tiết</router-link>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        
        <b-modal ref="mymodal" hide-footer title="Thêm mới thông báo">
            <div class="d-block">
                <form v-on:submit.prevent="createNotification">
                    <div class="form-group">
                        <label for="title">Tên thông báo</label>
                        <input type="text" v-model="notification.title" class="form-control" placeholder="Tên thông báo" id="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung thông báo</label>
                        <b-form-textarea id="textarea" v-model="notification.content" placeholder="Nội dung thông báo" rows="3" max-rows="6"></b-form-textarea>
                    </div>
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-info btn-sm" @click="hideModal">Thoát</button>
                        <button class="btn btn-danger btn-sm">Tạo thông báo</button>
                    </div>
                </form>
            </div>
        </b-modal>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                notification: {
                    title: '',
                    content: ''
                },
                listNotifications: [],
            }
        },
        created() {
           this.list()
        },
        methods: {
            showModal() {
                this.$refs.mymodal.show();
            },
            hideModal() {
                this.$refs.mymodal.hide()
            },
            list() {
                axios.get('/notification')
                .then(response => {
                    this.listNotifications = response.data
                })
            },
            createNotification() {
                axios.post('/notification/store', {
                    title: this.notification.title,
                    content: this.notification.content
                })
                .then(response => {
                    if (response.data.errors == false) {
                        this.flashMessage.success({
                            message: 'Tạo thông báo thành công',
                            time: 3000
                        });
                        this.listNotifications.unshift(response.data.data)
                        this.$router.push({
                            params: {
                                title: response.data.data.title,
                                content: response.data.data.content
                            }
                        })
                        this.$refs.mymodal.hide()
                        this.notification = {
                            title: '',
                            content: ''
                        }
                    }
                })
                .catch(error => {
                    this.flashMessage.error({
                        message: 'Errors 500 sever',
                        time: 2000
                    });
                })
            },
            detailNotification(obj){
                console.log(obj);
            }
        }
    }
</script>