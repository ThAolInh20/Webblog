<template>
    <nav>
        <router-link to="/users">Danh sách Users</router-link> |
        <router-link to="/users/add">Thêm User</router-link>
    </nav>
</template>
<script>
    export default {};
</script>
<style scoped>
nav {
  background: #333;
  padding: 10px;
}
nav a {
  color: white;
  margin-right: 15px;
  text-decoration: none;
}
nav a:hover {
  text-decoration: underline;
}
</style>