# Bước 1: Lấy image Node.js làm base image
FROM node:16

# Bước 2: Thiết lập thư mục làm việc trong container
WORKDIR /app

# Bước 3: Copy package.json và package-lock.json vào container
COPY package*.json ./

# Bước 4: Cài đặt các dependencies của project
RUN npm install

# Bước 5: Copy tất cả các tệp vào container
COPY . .

# Bước 6: Build ứng dụng Vue.js
RUN npm run build

# Bước 7: Cấu hình container để chạy ứng dụng
EXPOSE 8081



