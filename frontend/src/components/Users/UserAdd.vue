<template>
    <div>
        <h2>Thêm User</h2>
        <form @submit.prevent="submitUser">
            <label>Email:</label>
            <input type="email" v-model="user.email" required />
            
            <label>Họ tên:</label>
            <input type="text" v-model="user.name" required />
            
            <label>Ngày sinh:</label>
            <input type="date" v-model="user.datebirth" required />
            
            <label>Số điện thoại:</label>
            <input type="text" v-model="user.phone" required />

            <CustomButton type="primary">Thêm User</CustomButton>
            
        </form>

        <p v-if="message">{{ message }}</p>
    </div>
</template>

<script>    
import axios from 'axios';
import CustomButton from '../common/CustomButton.vue';
export default {
    components: {
        CustomButton
    },
    data() {
        return {
            user: {
                email: '',
                name: '',
                datebirth: '',
                phone: ''
            },
            message: ''
        };
    },
    methods: {
        async submitUser() {
            console.log("0")
            try {
                console.log("1")
                await axios.post('http://localhost:8000/api/users', this.user);
                console.log("2")
                this.message = "Thêm user thành công!";
                this.resetForm();
            } catch (error) {
                console.log("3")
                console.error("Lỗi khi thêm user:", error);
                this.message = "Thêm user thất bại!";
            }  
        },
        resetForm() {
            this.user = { email: '', name: '', datebirth: '', phone: '' };
        }
    }
};
</script>

<style scoped>
form {
    display: flex;
    flex-direction: column;
    width: 300px;
}
label {
    margin-top: 10px;
}
input {
    padding: 5px;
    margin-top: 5px;
}
button {
    margin-top: 15px;
    padding: 8px;
    background: blue;
    color: white;
    border: none;
    cursor: pointer;
}
</style>
