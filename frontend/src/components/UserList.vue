<template>
    <div>
        <h2>Danh sách user</h2>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Email</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.datebirth }}</td>
                    <td>{{ user.phone }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';
    export default{
        data(){
            return{
                users: []
            }
        },
        mounted(){
            this.featchUser();
        },
        methods:{
            async fetchUsers() {
                 try {
                    const response = await axios.get("http://127.0.0.1:8000/api/users");
                    this.users = response.data;
                } catch (error) {
                    console.error("Lỗi khi lấy danh sách người dùng:", error);
                }
            },
        }
    }
</script>

<style>

</style>