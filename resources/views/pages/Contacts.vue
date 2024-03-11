<template>
<section class="contacts">
  <h1>Контакты</h1>
  <div class="info">
    <p class="adress">Челябинск, ул. Васенко 25</p>
    <p class="phone">+7(351) 255-25-25</p>
  </div>
  <img src="/public/images/map.png" alt="">
</section>
</template>

<script lang="ts">

</script>

<style scoped>
.contacts{
  width: 1440px;
  margin: 72px auto 0 auto;
}
.contacts h1{
  font-size: 28px;
  color: #0F2B56;
}
.contacts .info{
  display: flex;
  flex-direction: column;
  gap: 15px;
  color: #0F2B56;
  margin-bottom: 40px;
}
.contacts .info p{
  margin: 0;
}
</style>