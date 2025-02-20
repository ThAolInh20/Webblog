const { defineConfig } = require('@vue/cli-service');

module.exports = defineConfig({
  transpileDependencies: true,
  devServer: {
    host: '0.0.0.0',  // Cho phép truy cập từ bên ngoài container
    port: 8081,       // Đảm bảo trùng với port bạn đã mở trong Docker
    allowedHosts: "all",
    watchFiles: ['src/**/*'],
  }
});

