<template>
    <div>
        <h2>Danh sách user</h2>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
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
                    <td>
                        <CustomButton type="primary" @click="editUser(user.id)">Sửa</CustomButton>
                        <CustomButton type="danger" @click="deleteUser(user.id)">Xóa</CustomButton>
                    </td>
                </tr>
            </tbody>
        </table>
        <CustomButton type="secondary" @click="addUser">Thêm User</CustomButton>
    </div>
</template>

<script>
    import axios from 'axios';
    import CustomButton from '../common/CustomButton.vue';
    
    // import route from 'ziggy-js';
    export default{
        data(){
            return{
                users: []
            }
        },
        components:{
            CustomButton
        },
        mounted(){
            this.featchUsers();
        },
        methods:{
            async featchUsers() {
                 try {
                    const response = await axios.get('http://localhost:8000/api/users');
                    this.users = response.data.data;
                    
                } catch (error) {
                    console.error("Lỗi khi lấy danh sách người dùng:", error);
                    
                }
            },
            addUser(){
                this.$router.push('/users/add');
            },
            editUser(userId){
                this.$router.push(`/users/edit/${userId}`);
            },
            async deleteUser(userId) {
                try {
                    const confirmDelete = confirm("Bạn có chắc chắn muốn xóa người dùng này?");
                    if (!confirmDelete) return;

                    const response = await axios.delete(`http://localhost:8000/api/users/delete/${userId}`);
                    
                    if (response.status === 200 && response.data.message === "User deleted successfully") {
                        this.featchUsers(); // Load lại danh sách sau khi xóa
                        console.log("Xóa thành công");
                    } else {
                        console.error("Xóa thất bại:", response.data);
                    }
                } catch (error) {
                    console.error("Lỗi khi xóa user:", error);
                }
            }
            
        }
    }
</script>

<style>

</style>