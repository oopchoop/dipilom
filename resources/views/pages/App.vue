<template>
  <HeaderComponent></HeaderComponent>
  <router-view></router-view>
  <FooterComponent></FooterComponent>
</template>

<script lang="ts">
import HeaderComponent from "./Main/HeaderComponent.vue";
import FooterComponent from "./Main/FooterComponent.vue";

export default {
    setup() {},
    components:
    {
      HeaderComponent,
      FooterComponent
    }
}
</script>

<style scoped>

</style>
