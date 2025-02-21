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
            this.fetchUsers();
        },
        methods:{
            async fetchUsers() {
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
                console.log("0")
                const isDelete = confirm("Bạn có chắc chắn muốn xóa user này?");
                if (isDelete) {
                    let oldUsers = this.users;
                    try {
                        await axios.delete(`http://localhost:8000/api/users/${userId}`);
                        console.log("1")
                        // Nếu server xóa thành công, fetch lại danh sách
                        this.users = this.users.filter(user => user.id !== userId);
                        console.log("2")
                        console.log("Xóa thành công");
                    } catch (error) {
                        if (error.response && error.response.status === 404) {
                            console.log("3")
                            console.warn("User đã bị xóa trước đó, chỉ cập nhật UI.");
                        
    
                        } else {
                            console.error("Lỗi khi xóa user:", error.response?.data || error.message);
                            this.users = oldUsers;
                        }
                    }
                }

                
            }
            
        }
    }
</script>

<style>

</style>