<template>
  <div>
    <NavigateCustom />
      <router-view />
  </div>
</template>

<script>
import NavigateCustom from './components/common/NavigateCustom.vue';

export default {
  components: {
    NavigateCustom
  }
};
</script>


