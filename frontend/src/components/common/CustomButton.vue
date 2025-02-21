<template>
    <button :class="btnClass" >
      <slot></slot> <!-- Hiển thị nội dung bên trong nút -->
    </button>
  </template>
  
  <script>
  export default {
    name: "CustomButton",
    props: {
      type: {
        type: String,
        default: 'primary', // Mặc định là nút primary
      },
    },
    computed: {
      btnClass() {
        return {
          'btn': true, // CSS chung cho tất cả nút
          'btn-primary': this.type === 'primary',
          'btn-secondary': this.type === 'secondary',
          'btn-danger': this.type === 'danger',
        };
      },
    },
  };
  </script>
  
  <style scoped>
  .btn {
    padding: 10px 16px;
    font-size: 14px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: 0.3s;
  }
  .btn-primary {
    background-color: #007bff;
    color: white;
  }
  .btn-secondary {
    background-color: #6c757d;
    color: white;
  }
  .btn-danger {
    background-color: #dc3545;
    color: white;
  }
  .btn:hover {
    opacity: 0.8;
  }
  </style>
  