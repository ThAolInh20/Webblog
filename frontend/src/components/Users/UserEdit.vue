<template>
        <div>
            <h2>Chỉnh sửa User</h2>
            <form @submit.prevent="updateUser">
                <div>
                    <label>Email:</label>
                    <input v-model="user.email" type="email" required />
                </div>
                <div>
                    <label>Họ tên:</label>
                    <input v-model="user.name" type="text" required />
                </div>
                <div>
                    <label>Ngày sinh:</label>
                    <input v-model="user.datebirth" type="date" required />
                </div>
                <div>
                    <label>Số điện thoại:</label>
                    <input v-model="user.phone" type="text" required />
                </div>
                <CustomButton type="primary" @click="updateUser">Lưu</CustomButton>
            </form>
        </div>
    </template>
    
    <script>
    import axios from 'axios';
    import CustomButton from '../common/CustomButton.vue';
    
    export default {
        name: 'UserEdit',
        props: ['id'], // Nhận ID từ route
        data() {
            return {
                user: {
                    email: '',
                    name: '',
                    datebirth: '',
                    phone: ''
                }
            };
        },
        components: {
            CustomButton
        },
        mounted() {
            this.fetchUser();
        },
        methods: {
            async fetchUser() {
                try {
                    const response = await axios.get(`http://localhost:8000/api/users/show/${this.id}`);
                    this.user = response.data; // Gán dữ liệu từ API
                } catch (error) {
                    console.error("Lỗi khi lấy thông tin người dùng:", error);
                }
            },
            async updateUser() {
                try {
                    await axios.put(`http://localhost:8000/api/users/update/${this.id}`, this.user);
                    alert("Cập nhật thành công!");
                    this.$router.push('/users'); // Quay lại danh sách
                } catch (error) {
                    console.error("Lỗi khi cập nhật user:", error);
                }
            }
        }
    };
    </script>
    