<template>
    <div>
        <h3>Thông báo mới</h3>
        <span>Tên thông báo: {{title}}</span>
        <p>Nội dung thông báo: {{content}}</p>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                title: this.$route.params.title,
                content: this.$route.params.content
            }
        }
    }
</script>